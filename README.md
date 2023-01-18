<div align="center">
  <h1>Tarefeiro</h1>
</div>

<div>
  <p>Este projeto foi desenvolvido com o objetivo de estudar PHP e sua conexão com o banco de dados através da estrutura do PDO. <br>
  Tarefeiro permite o gerenciamento de tarefas de forma simples e ágil, além de possuir um desgin responsivo e intuitivo ao usuário.</p>
</div>

<div align="center">

  ![Tarefeiro](https://raw.githubusercontent.com/Edssaac/tarefeiro/main/img/tarefeiro_desktop.png)
  
</div>

<div align="center">

  ![Tarefeiro](https://raw.githubusercontent.com/Edssaac/tarefeiro/main/img/tarefeiro_mobile.png)
  
</div>

<br>

> Estrutura do Banco de Dados da aplicação:

```sql
--
-- Banco de dados: `tarefeiro_bd`
--
CREATE DATABASE IF NOT EXISTS `tarefeiro_bd` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `tarefeiro_bd`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_status`
--

DROP TABLE IF EXISTS `tb_status`;
CREATE TABLE IF NOT EXISTS `tb_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_status`
--

INSERT IGNORE INTO `tb_status` (`id`, `status`) VALUES
(1, 'pendente'),
(2, 'concluído');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tarefas`
--

DROP TABLE IF EXISTS `tb_tarefas`;
CREATE TABLE IF NOT EXISTS `tb_tarefas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_status` int(11) NOT NULL DEFAULT 1,
  `tarefa` text COLLATE utf8_unicode_ci NOT NULL,
  `data_cadastrado` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `id_status` (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Limitadores para a tabela `tb_tarefas`
--
ALTER TABLE `tb_tarefas`
  ADD CONSTRAINT `tb_tarefas_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `tb_status` (`id`);
COMMIT;
```
