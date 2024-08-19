
CREATE DATABASE IF NOT EXISTS devedores;
use devedores;

CREATE TABLE IF NOT EXISTS devedores(
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(255) NOT NULL,
  email VARCHAR(200),
  telefone VARCHAR(40),
  apelido VARCHAR(50) DEFAULT('Sem Conhecimento'),
  data_registro DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS dividas(
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  devedor_id INT,
  descricao TEXT,
  valor DECIMAL(10, 2) NOT NULL,
  data_emprestimo DATETIME DEFAULT CURRENT_TIMESTAMP,
  data_vencimento DATETIME,
  status ENUM('pendente', 'pago', 'atrasado') DEFAULT 'pendente',
  data_pagamento DATETIME,
  FOREIGN KEY(devedor_id) REFERENCES devedores(id)
);

CREATE TABLE IF NOT EXISTS pagamentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    divida_id INT,
    valor_pagamento DECIMAL(10, 2) NOT NULL,
    data_pagamento DATETIME DEFAULT CURRENT_TIMESTAMP,
    metodo_pagamento VARCHAR(50),
    FOREIGN KEY (divida_id) REFERENCES dividas(id)
);
