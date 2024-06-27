## Apresentação Geral

**Nome do Projeto:** Gerenciador de Tarefas

**Descrição:**

O Gerenciador de Tarefas (Tarefeiro) é uma aplicação intuitiva e eficiente, projetada para facilitar o registro e a organização das suas atividades diárias. 
Com uma interface simples e prática, você pode facilmente criar, editar e navegar por suas tarefas importantes. Mantenha-se produtivo e 
organizado com o Tarefeiro, onde você pode gerenciar suas responsabilidades de forma eficaz.

![demo](https://raw.githubusercontent.com/Edssaac/tarefeiro/main/public/images/demo/taskmanager.gif)

**Objetivo:**

Implementar um gerenciador de tarefas em PHP.

**Tecnologias Utilizadas:**

![COMPOSER](https://img.shields.io/badge/Composer-885630?style=for-the-badge&logo=Composer&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MYSQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)
![HTML](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![BOOTSTRAP](https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)
![JAVASCRIPT](https://img.shields.io/badge/JavaScript-323330?style=for-the-badge&logo=javascript&logoColor=F7DF1E)
![JQUERY](https://img.shields.io/badge/jQuery-0769AD?style=for-the-badge&logo=jquery&logoColor=white)

## Para Desenvolvedores

Se você é um desenvolvedor interessado em contribuir ou entender melhor o funcionamento do projeto, aqui estão algumas informações adicionais:

<br>

**Requisitos de Instalação:**
- Composer - `2.5.5`
- PHP - `7.4.33`

<br>

**Instruções de Instalação:**
1. Clone o repositório do projeto:
```
git clone https://github.com/edssaac/tarefeiro
```

2. Navegue até o diretório do projeto:
```
cd tarefeiro
```

3. Configure o Composer:
```
composer install
```

4. Configure o banco de dados:

```sql
CREATE DATABASE IF NOT EXISTS `taskmanager`;

USE `taskmanager`;

CREATE TABLE IF NOT EXISTS `status` (
    `id` int NOT NULL AUTO_INCREMENT,
    `status` varchar(25) NOT NULL,
    PRIMARY KEY (`id`)
);

INSERT IGNORE INTO `status` (`id`, `status`) VALUES (1, 'pending'), (2, 'done');

CREATE TABLE IF NOT EXISTS `task` (
    `id` int NOT NULL AUTO_INCREMENT,
    `id_status` int NOT NULL DEFAULT 1,
    `task_name` VARCHAR(100) NOT NULL,
    `task_description` VARCHAR(1000),
    `date_added` datetime NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`),
    KEY `id_status` (`id_status`),
    CONSTRAINT `task_fk_status` FOREIGN KEY (`id_status`) REFERENCES `status` (`id`)
);
```

5. Configure o .env com os dados necessários.

<br>

**Como Executar:**

Após concluir as etapas de instalação e configuração mencionadas acima, você está pronto para iniciar a aplicação. Siga os passos abaixo:

1. Como esta é uma aplicação simples, você pode usar o servidor embutido do PHP para servir a aplicação. <br>
Abra o terminal e execute o seguinte comando na raiz do projeto:
   ```
   php -S localhost:8080
   ```
   Isso iniciará um servidor local na porta 8080.

2. Uma vez que o servidor esteja em execução, abra seu navegador e acesse a seguinte URL na barra de endereço:
   ```
   http://localhost:8080/
   ```
   Isso irá carregar a página inicial da aplicação.

Certifique-se de que o servidor PHP embutido esteja sempre em execução enquanto você estiver trabalhando na aplicação localmente. <br>
Se desejar encerrar o servidor, basta pressionar `ctrl + C` no terminal onde o servidor está sendo executado.

<br>

**Contato:**

[![GitHub](https://img.shields.io/badge/GitHub-100000?style=for-the-badge&logo=github&logoColor=white)](https://github.com/edssaac)
[![Gmail](https://img.shields.io/badge/Gmail-D14836?style=for-the-badge&logo=gmail&logoColor=white)](mailto:edssaac@gmail.com)
[![Outlook](https://img.shields.io/badge/Outlook-0078D4?style=for-the-badge&logo=microsoft-outlook&logoColor=white)](mailto:edssaac@outlook.com)
