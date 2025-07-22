## Apresentação Geral

**Nome do Projeto:** Gerenciador de Tarefas

**Descrição:**

O Gerenciador de Tarefas (Tarefeiro) é uma aplicação intuitiva e eficiente, projetada para facilitar o registro e a organização das suas atividades diárias. 
Com uma interface simples e prática, você pode facilmente criar, editar e navegar por suas tarefas importantes. Mantenha-se produtivo e 
organizado com o Tarefeiro, onde você pode gerenciar suas responsabilidades de forma eficaz.

![demo](./public/images/demo/task_manager.gif)

**Objetivo:**

Implementar um gerenciador de tarefas em PHP.

**Tecnologias Utilizadas:**

![DOCKER](https://img.shields.io/badge/Docker-2496ED?style=for-the-badge&logo=docker&logoColor=fff)
![COMPOSER](https://img.shields.io/badge/Composer-885630?style=for-the-badge&logo=composer&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MYSQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)
![HTML](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![BOOTSTRAP](https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)
![JAVASCRIPT](https://img.shields.io/badge/JavaScript-323330?style=for-the-badge&logo=javascript&logoColor=F7DF1E)
![JQUERY](https://img.shields.io/badge/jQuery-0769AD?style=for-the-badge&logo=jquery&logoColor=white)

## Para Desenvolvedores

Se você é um desenvolvedor interessado em contribuir ou entender melhor o funcionamento do projeto, aqui estão algumas informações adicionais:

**Ambiente:**

![PHP](https://img.shields.io/badge/PHP-8.4-777BB4?style=for-the-badge&logo=php)
![MYSQL](https://img.shields.io/badge/MySQL-8.0-005C84?style=for-the-badge&logo=mysql)

```sql
CREATE DATABASE IF NOT EXISTS `task_manager`;

USE `task_manager`;

CREATE TABLE IF NOT EXISTS `task` (
    `id` int NOT NULL AUTO_INCREMENT,
    `status` ENUM('0', '1') NOT NULL DEFAULT '0',
    `task_name` VARCHAR(100) NOT NULL,
    `task_description` VARCHAR(1000),
    `date_added` DATETIME NOT NULL DEFAULT NOW(),
    PRIMARY KEY (`id`)
);
```

**Instruções de Instalação e Configuração:**

> Atenção: Obrigatório o uso de Docker em sua máquina.

1. Clone o repositório do projeto:
```
git clone https://github.com/edssaac/gerenciador-de-tarefas
```

2. Navegue até o diretório do projeto:
```
cd gerenciador-de-tarefas
```

3. Inicie a aplicação atráves do script que configura o Docker:
```
.ci_cd/init.sh  
```
Com isso a aplicação estará acessivel: [http://localhost:8080](http://localhost:8080)

---

4. Quando desejar encerrar a aplicação, use:
```
.ci_cd/stop.sh
```
Caso deseje encerrar e remover os volumes criados, use:
```
.ci_cd/stop.sh -v
```

## Contato

[![GitHub](https://img.shields.io/badge/GitHub-100000?style=for-the-badge&logo=github&logoColor=white)](https://github.com/edssaac)
[![Gmail](https://img.shields.io/badge/Gmail-D14836?style=for-the-badge&logo=gmail&logoColor=white)](mailto:edssaac@gmail.com)
[![Outlook](https://img.shields.io/badge/Outlook-0078D4?style=for-the-badge&logo=microsoft-outlook&logoColor=white)](mailto:edssaac@outlook.com)
[![Linkedin](https://img.shields.io/badge/LinkedIn-black.svg?style=for-the-badge&logo=linkedin&color=informational)](https://www.linkedin.com/in/edssaac)
