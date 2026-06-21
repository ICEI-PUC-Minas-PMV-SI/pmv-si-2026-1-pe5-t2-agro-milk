# ETAPA 2 - Preparação do Ambiente em Nuvem e Virtualização Local

## Seção I: Servidores hospedados em Nuvem (AWS)
Nesta seção, listamos as instâncias configuradas na nuvem AWS, essenciais para a infraestrutura da AgroMilk.
### 1. Instância Windows Server (Controlador de Domínio / Active Directory)
-	Nome da Instância: Windows Server 2016
-	IP Público: 34.228.228.11
-	Usuário de Acesso (RDP): Administrator
### 2. Instância Linux Ubuntu (Servidor Web Nuvem)
-	Nome da Instância: Ubuntu Server
-	IP Público: 3.91.228.154
-	Usuário de Acesso (SSH): ubuntu

### 3. Infraestrutura de Rede (VPC)
<img width="3072" height="1920" alt="VPC" src="https://github.com/user-attachments/assets/f5abb544-aca9-4727-9afe-ac9061d3fdd4" />
Mapa de recursos (Resource map) da VPC na AWS, exibindo a rede virtual, a sub-rede pública e a tabela de rotas criadas.

### Link do Vídeo Demonstrativo: https://sgapucminasbr.sharepoint.com/sites/team_sga_2414_2026_1_7378102/_layouts/15/guestaccess.aspx?share=IQD_LXZb6PIAQ5f5uk0PA5A7AawtuXtvZlbo3rM6P5CjoCY&e=snfbVb
(Nota: O vídeo apresenta uma visão rápida do projeto e o funcionamento do Active Directory, GPOs e da página Web hospedados na nuvem).

## Seção II: Prints dos Servidores e Serviços Configurados
Abaixo estão as evidências das configurações realizadas tanto no ambiente local quanto na nuvem.
### 1. Servidor Instalado Localmente (VirtualBox - CentOS) Este servidor Linux local atua como servidor Web secundário/interno.
<img width="1920" height="1040" alt="Configurando Servidor" src="https://github.com/user-attachments/assets/521afb0b-80a0-4b52-899c-f1eca05b7abb" />
Tela do terminal mostrando a configuração de rede local (arquivos /etc/sysconfig/network ou IP local).

<img width="1920" height="1040" alt="Configurando NGINX" src="https://github.com/user-attachments/assets/dfff6d9a-9e8d-4b58-bd1b-224f3f9a51f7" />
Tela mostrando a instalação ou o status ativo do servidor web (Nginx) no CentOS.

<img width="1920" height="1040" alt="Servidor Local CentOS" src="https://github.com/user-attachments/assets/626716bb-5f8b-4bd0-b977-844d698f999f" />
Navegador de internet abrindo a página HTML local de teste através do IP do VirtualBox.

### 2. Serviço de Diretórios - Active Directory e GPO (AWS Windows Server)
<img width="1920" height="1080" alt="Estrutura da AgroMilk" src="https://github.com/user-attachments/assets/72a672a0-fb26-4ce1-bc3e-ccfa1ec3e8ac" />
Tela da ferramenta "Usuários e Computadores do Active Directory" mostrando a estrutura de pastas criadas para a AgroMilk (Sede em Belo Horizonte, Filiais em Uberlândia e Patos de Minas).

<img width="1920" height="1080" alt="Usuario" src="https://github.com/user-attachments/assets/423c8a15-58de-4c70-92d0-4404db83f631" />
Tela mostrando a criação de usuários de teste dentro de seus respectivos departamentos.

<img width="1920" height="1080" alt="Relatorio das politicas aplicadas" src="https://github.com/user-attachments/assets/0cff24bb-c3b2-48c8-a8ca-e9b23125858f" />
Tela do "Gerenciamento de Política de Grupo" mostrando a GPO criada e vinculada bloqueando permissões específicas.
