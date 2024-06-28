// Função para destacar o menu ativo
const highlightMenu = () => {
    let page = location.pathname.replace('/tarefeiro/', '');

    page = (page == '/') ? '/task/new' : page;

    let anchor = document.querySelector(`a[href^='${page}']`);

    if (anchor) {
        anchor.querySelector('li').classList.add('active');
    }
};

// Função para destacar a paginação ativa
const highlightPagination = () => {
    let container = document.querySelector('.pagination');
    let element = document.querySelector('.page-item.active');

    if (container && element) {
        container.scrollLeft = element.offsetLeft - 200;
    }
};

// Inicialização do TinyMCE
tinymce.init({
    selector: 'textarea#task_description',
    language: 'pt_BR',
    plugins: [
        'autolink',
        'link',
        'searchreplace',
        'wordcount',
        'code',
        'fullscreen',
        'table',
        'emoticons'
    ]
});

// Função para exibir alertas na tela
const showAlert = (text, style) => {
    let alert = document.querySelector('.alert');
    alert.innerHTML = text;
    alert.className = `alert ${style}`;
    alert.classList.remove('d-none');
};

// Função para remover alertas da tela
const hideAlert = () => {
    let alert = document.querySelector('.alert');
    alert.innerHTML = '';
    alert.classList.add('d-none');
};

// Evento de submissão do formulário
document.addEventListener('submit', (e) => {
    e.preventDefault();

    let data = {
        task_name: document.getElementById('task_name').value,
        task_description: document.getElementById('task_description').value
    };

    fetch('/task/append', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
    })
        .then(response => {
            if (!response.ok) {
                throw new Error();
            }
            return response.json();
        })
        .then((response) => {
            if (response.success) {
                showAlert('Tarefa adicionada.', 'alert-success');
            } else if (response.message) {
                showAlert(response.message, 'alert-danger');
            } else {
                modalWarningManager.show();
            }
        })
        .catch(() => {
            showAlert('Não foi possível completar a ação no momento', 'alert-danger');
        })
        .finally(() => {
            document.querySelector('form').reset();
        });
});

const taskName = document.querySelector('#task_name.clearable');

if (taskName) {
    taskName.addEventListener('focus', () => {
        hideAlert();
    });
}

document.querySelectorAll('.taskActions i').forEach((element) => {
    element.addEventListener('click', () => {
        let taskId = element.parentElement.dataset.id;
        let taskAction = element.dataset.action;

        switch (taskAction) {
            case 'remove':
                openModalTaskRemove(taskId);
                break;
            case 'edit':
                openModalTaskViewer(taskId);
                break;
            case 'check':
                updateStatus(taskId, 1);
                break;
            case 'uncheck':
                updateStatus(taskId, 0);
                break;
        }
    });
});

// Gerenciamento de modais
const modalWarningManager = new bootstrap.Modal('#modalWarning');
const modalTaskRemoveManager = new bootstrap.Modal('#modalTaskRemove');
const modalTaskViewerManager = new bootstrap.Modal('#modalTaskViewer');

// Modal de remoção de tarefa
const modalTaskRemove = document.getElementById('modalTaskRemove');

modalTaskRemove.addEventListener('hidden.bs.modal', event => {
    event.target.removeAttribute('data-id');
});

const openModalTaskRemove = (taskId) => {
    modalTaskRemove.dataset.id = taskId;
    modalTaskRemoveManager.show();
};

document.getElementById('buttonRemove').addEventListener('click', () => {
    let taskId = modalTaskRemove.dataset.id;

    modalTaskRemoveManager.hide();

    fetch('/task/remove', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ task_id: taskId }),
    })
        .then(response => {
            if (!response.ok) {
                throw new Error();
            }

            return response.json();
        })
        .then((response) => {
            if (response.success) {
                let task = document.querySelector(`.taskActions[data-id="${taskId}"]`);
                task.parentElement.remove();
            } else {
                throw new Error();
            }
        })
        .catch(() => {
            modalWarningManager.show();
        });
});

// Modal de visualização de tarefa
const modalTaskViewer = document.getElementById('modalTaskViewer');

modalTaskViewer.addEventListener('hidden.bs.modal', event => {
    event.target.removeAttribute('data-id');
});

const openModalTaskViewer = (taskId) => {
    fetch('/task/getTask', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ task_id: taskId }),
    })
        .then(response => {
            if (!response.ok) {
                throw new Error();
            }

            return response.json();
        })
        .then((response) => {
            let task = response.success;

            if (Object.keys(task).length) {
                document.getElementById('task_name').value = task.task_name;
                tinymce.get('task_description').setContent(task.task_description);
                modalTaskViewer.dataset.id = taskId;
                modalTaskViewerManager.show();
            } else {
                throw new Error();
            }
        })
        .catch(() => {
            modalWarningManager.show();
        });
};

// Atualização de status da tarefa
const updateStatus = (taskId, status) => {
    fetch('/task/updateStatus', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ task_id: taskId, status: status }),
    })
        .then(response => {
            if (!response.ok) {
                throw new Error();
            }

            return response.json();
        })
        .then((response) => {
            if (response.success) {
                let checkbox = document.querySelector(`.taskActions[data-id="${taskId}"] i:last-child`);
                if (status === 0) {
                    checkbox.dataset.action = 'check';
                    checkbox.title = 'Marcar';
                    checkbox.classList.remove('fas', 'fa-check-square');
                    checkbox.classList.add('far', 'fa-square');
                } else {
                    checkbox.dataset.action = 'uncheck';
                    checkbox.title = 'Desmarcar';
                    checkbox.classList.remove('far', 'fa-square');
                    checkbox.classList.add('fas', 'fa-check-square');
                }
            } else {
                throw new Error();
            }
        })
        .catch(() => {
            modalWarningManager.show();
        });
};

// Atualização de tarefa
document.getElementById('buttonUpdate').addEventListener('click', () => {
    let id = modalTaskViewer.dataset.id;
    let name = document.getElementById('task_name').value.trim();
    let description = tinymce.get('task_description').getContent();

    if (name.length === 0) {
        document.getElementById('task_name').focus();

        return;
    }

    modalTaskViewerManager.hide();

    fetch('/task/update', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            task_id: id,
            task_name: name,
            task_description: description
        }),
    })
        .then(response => {
            if (!response.ok) {
                throw new Error();
            }

            return response.json();
        })
        .then((response) => {
            if (response.success) {
                document.querySelector(`.task-name[data-id="${id}"]`).innerHTML = name;
            } else {
                throw new Error();
            }
        })
        .catch(() => {
            modalWarningManager.show();
        });
});

// Destacar os itens necessários:
highlightMenu();
highlightPagination();