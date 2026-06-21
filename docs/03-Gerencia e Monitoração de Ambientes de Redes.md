# ETAPA 3 – Gerência e Monitoração de Ambientes de Redes

## Seção I: Descrição da Implementação
Nesta etapa, o grupo realizou a configuração de gerência e monitoramento da infraestrutura de rede da AgroMilk utilizando a ferramenta Zabbix. O monitoramento foi estabelecido através do protocolo SNMP (Simple Network Management Protocol) em dois ambientes distintos: um servidor local e um servidor em nuvem.
-	Servidor Nuvem (AWS): Foi provisionada uma instância Windows Server na AWS. Configuramos o serviço SNMP nativo e realizamos a liberação das portas UDP 161 no Security Group da nuvem (VPC) para permitir a comunicação com o Zabbix Server.
-	Instância Linux Ubuntu (Servidor Web Nuvem): Foi configurada uma máquina virtual local rodando Linux CentOS. Além da instalação do serviço snmpd, enfrentamos e solucionamos um bloqueio de segurança nativo do Linux. Para que o Zabbix conseguisse coletar os dados de CPU e Memória corretamente, editamos o arquivo /etc/snmp/snmpd.conf para liberar a leitura completa da árvore de OIDs, configurando a comunidade public com as permissões necessárias e ajustando o firewall local (firewalld).

Com essas configurações, o Zabbix Appliance (configurado em modo Bridge na rede local) conseguiu estabelecer a comunicação e coletar as métricas de ambos os servidores com sucesso.

## Seção II: Área de Evidências
Abaixo estão as evidências das monitorações realizadas tanto no ambiente local quanto na nuvem.
### 1. Mapa de Rede

<img width="1920" height="1040" alt="mapa rede" src="https://github.com/user-attachments/assets/b26ba0ca-4b42-4d4c-98bd-8793fd86f60d" />
 
### 2. Evidências do Servidor Nuvem (AWS):

<img width="1920" height="1040" alt="Filesystems aws" src="https://github.com/user-attachments/assets/70beaa03-41a7-4630-a650-179897714a4f" /> 
Dashboard englobando gráficos de File System do Windows AWS

<img width="1920" height="1040" alt="network interface aws" src="https://github.com/user-attachments/assets/b2bdcbb2-535a-4806-a69c-61a6f2bb1b02" />
 
Gráfico de Network Interfaces do Windows AWS

<img width="1920" height="1040" alt="system performance aws" src="https://github.com/user-attachments/assets/faa34dc7-a3ab-481a-9318-601688708ebb" />
 
Dashboard englobando gráficos de System Performance do Windows AWS

### 3. Evidências do Servidor Local (CentOS):

<img width="1920" height="1040" alt="Filesystems linux" src="https://github.com/user-attachments/assets/1112e556-00d6-428d-b53b-a28859a72f90" />
 
Dashboard englobando gráficos de File System do Linux Local

<img width="1920" height="1040" alt="network interface linux" src="https://github.com/user-attachments/assets/30010825-cd65-4a4e-885e-826e46fa6ce6" />
 
Gráfico de Network Interfaces do Linux Local

<img width="1920" height="1040" alt="system performance linux" src="https://github.com/user-attachments/assets/da0b017a-b44e-4962-afcd-ecc775597e75" />
 
Dashboard englobando gráficos de System Performance do Linux Local
