# ETAPA 4 – Mecanismos de Segurança

## 5. Política de Segurança da Informação
A AgroMilk estabeleceu sua Política de Segurança da Informação (PSI) com o objetivo de proteger seus ativos físicos e lógicos, que vão desde os servidores provisionados na AWS e o monitoramento Zabbix local, até os dispositivos móveis e sensores IoT espalhados pelas filiais rurais. A PSI foi estruturada com base na tríade de Confidencialidade, Integridade e Disponibilidade, definindo diretrizes estratégicas para a alta administração e normas táticas operacionais. O foco principal é garantir que as informações estratégicas do agronegócio estejam protegidas contra acessos não autorizados e ameaças cibernéticas.
## 6. Cartilha de Segurança da Informação 

<img width="498" height="280" alt="Imagem2" src="https://github.com/user-attachments/assets/c676a7c6-e96a-4446-ba5c-2e0c5c7b4364" />
<img width="499" height="281" alt="Imagem3" src="https://github.com/user-attachments/assets/c37f729e-75c4-4b0e-9e92-fad25dadb50a" />
<img width="502" height="282" alt="Imagem4" src="https://github.com/user-attachments/assets/91456336-3986-4df8-8a71-a600d0172b34" />
<img width="500" height="282" alt="Imagem5" src="https://github.com/user-attachments/assets/e99f2114-d388-49cd-9f4c-105f893bcaa8" />
<img width="501" height="282" alt="Imagem6" src="https://github.com/user-attachments/assets/41d6d229-f6d3-4b37-8b4f-ecc47b9746c6" />
<img width="497" height="281" alt="Imagem7" src="https://github.com/user-attachments/assets/e2128ebd-089a-4a88-a61a-6d7ac0589b17" />

## 7. Análise de Vulnerabilidade
Neste cenário foram escolhidas 3 vulnerabilidades do OWASP Top 10 que possam afetar a aplicação Web (CRUD) que estamos desenvolvendo, explicando o impacto na empresa e como mitigá-las.
### 7.1. A01:2021 - Quebra de Controle de Acesso (Broken Access Control)
-	Como afeta a AgroMilk: Um funcionário da filial de logística poderia manipular a URL da aplicação web (CRUD) para tentar acessar ou alterar o banco de dados financeiro ou o controle de medicamentos da matriz, devido a uma falha na separação de perfis de usuário.
-	Mitigação: Implementar controle de acesso baseado em funções (RBAC), aplicando o princípio do menor privilégio. A aplicação deve validar rigorosamente no backend (e não apenas ocultar botões no frontend) se o usuário logado tem permissão real para acessar aquela página ou função.
### 7.2. A03:2021 - Injeção (Injection / SQL Injection)
-	Como afeta a AgroMilk: Um atacante poderia usar os campos de busca do sistema CRUD (ex: busca por lote de gado ou produto) para inserir comandos SQL maliciosos, permitindo que ele extraia, apague ou roube todo o banco de dados hospedado no servidor da AWS.
-	Mitigação: Nunca confiar em dados de entrada do usuário (input). É obrigatório utilizar Prepared Statements (consultas parametrizadas) no código de conexão com o banco de dados e aplicar rotinas estritas de validação e sanitização de dados nos campos de digitação.
### 7.3. A05:2021 - Configuração Incorreta de Segurança (Security Misconfiguration)
-	Como afeta a AgroMilk: Como a aplicação web será hospedada nos servidores (AWS/CentOS) que o grupo configurou, manter portas desnecessárias abertas ou utilizar senhas padrão nos painéis administrativos e bancos de dados expõe toda a infraestrutura a ataques externos automatizados.
-	Mitigação: Aplicar um processo de Hardening (reforço de segurança) nos servidores. Isso inclui alterar todas as senhas padrão da aplicação, desabilitar serviços desnecessários, garantir que o Firewall (Security Group da AWS e Firewalld do CentOS) permita acesso apenas às portas estritamente utilizadas pela aplicação e atualizar os pacotes do sistema regularmente.

## 8. Evidências do Backend
O sistema foi desenvolvido em Laravel, um framework PHP amplamente utilizado para o desenvolvimento de aplicações web, com o apoio do Docker para a virtualização do ambiente e do MySQL como banco de dados relacional. A aplicação tem como objetivo simular o uso cotidiano da AgroMilk, permitindo o cadastro e a gestão de unidades, pessoas, departamentos e equipamentos. Além disso, o vínculo entre usuários e unidades possibilita a implementação de diferentes níveis de acesso, garantindo camadas distintas de autorização conforme o perfil e a área de atuação de cada usuário.

<img width="1600" height="893" alt="Login na aplicação como administrador ger" src="https://github.com/user-attachments/assets/28aeaed6-33f2-4f99-826f-1ce7ac1704e0" />

Login na aplicação como administrador geral.

<img width="1600" height="892" alt="Dashboard informativo de todas as unidades" src="https://github.com/user-attachments/assets/bec57d88-8d13-4c22-977e-cacf976e633d" />

Dashboard informativo de todas as unidades.

<img width="1600" height="892" alt="Lista das unidades cadastradas" src="https://github.com/user-attachments/assets/485fd054-541b-4b0f-a87f-d5f29688ec4d" />

Lista das unidades cadastradas.

<img width="1600" height="894" alt="Tela de cadastro de um novo departamento" src="https://github.com/user-attachments/assets/61096213-8cb3-41e0-9e78-64742b57baad" />

Tela de cadastro de um novo departamento.

<img width="1600" height="894" alt="Detalhes de um único equipamento" src="https://github.com/user-attachments/assets/eee1c3a7-f4b0-46e1-8068-a2ad0fab8e06" />

Detalhes de um único equipamento.

<img width="1600" height="893" alt="Edição de um equipamento" src="https://github.com/user-attachments/assets/321d8216-3ac8-41ad-b57a-67ee9e8a9d93" />

Edição de um equipamento.

<img width="1600" height="892" alt="Login na aplicação como administrador de uma única unidade" src="https://github.com/user-attachments/assets/16a94ebf-04b0-4676-9cb9-0ce96bfb437f" />

Login na aplicação como administrador de uma única unidade.

<img width="1600" height="892" alt="Dashboard informativo de somente uma unidade" src="https://github.com/user-attachments/assets/62071071-e60d-45c8-abfa-ca199fa7b58d" />

Dashboard informativo de somente uma unidade.

<img width="1600" height="894" alt="Lista de unidades somente com a unidade em que o usuário tem autorização" src="https://github.com/user-attachments/assets/0740885d-ba78-4ef2-a9c3-ed0d5b01bfd1" />

Lista de unidades somente com a unidade em que o usuário tem autorização.
