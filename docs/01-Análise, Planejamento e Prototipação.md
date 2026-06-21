# ETAPA 1 - Definição de Escopo e Infraestrutura de Rede
## 1. Estrutura Organizacional e Localidades
A AgroMilk é uma empresa do setor agropecuário especializada na produção leiteira, atuando em larga escala no estado de Minas Gerais. A organização adota práticas de pecuária de precisão (Smart Farming), utilizando tecnologias de conectividade, sensores e sistemas de monitoramento para otimizar a produção, o bem-estar animal e a tomada de decisão gerencial.

Para garantir eficiência operacional e gestão integrada das informações, a empresa possui uma estrutura organizacional distribuída, com uma sede administrativa e unidades produtivas conectadas por infraestrutura de rede corporativa.

A empresa opera sob um modelo de gestão centralizada e produção descentralizada, com as seguintes localidades:
-	Sede (Matriz): Belo Horizonte – MG, responsável pela governança corporativa, análise de dados (Business Intelligence), gestão financeira e recursos humanos.

-	Unidade Produtiva I (Filial): Uberlândia – MG, focada na produção leiteira automatizada e em programas de melhoramento genético do rebanho.

-	Unidade Produtiva II (Filial): Patos de Minas – MG, dedicada à produção em larga escala e à logística regional de distribuição.

## 2. Mapeamento de Setores e Departamentos

A estrutura foi desenhada para garantir que o fluxo de dados das fazendas chegue com integridade à sede para tomada de decisão.
-	Matriz (BH): Financeiro, Controladoria, RH, Compras, TI Central (BI) e Comercial.
-	Filiais (Fazendas): Produção Animal (Ordenha/Nutrição), Saúde Animal (Vet), Manutenção/Automação e Logística.

## 3. Levantamento de Dispositivos e Tecnologias IoT

Diferente de um escritório tradicional, a infraestrutura da AgroMilk prioriza a mobilidade e a coleta de dados via sensores.
### 3.1. Dispositivos de Infraestrutura (Network Backbone)
-	Roteadores SD-WAN: 03 unidades (Conexão segura Matriz-Filiais via VPN).
-	Access Points Wi-Fi 6 Outdoor: 20 unidades (Cobertura total de currais e áreas de manejo).
-	Gateways LoRaWAN: 04 unidades (Recepção de sinais de longa distância dos sensores animais).
### 3.2. Dispositivos de Interface e IoT (Endpoints)
Abaixo, detalhamos a alocação dos dispositivos finais para garantir a operabilidade de cada departamento:
#### Matriz (Belo Horizonte - Foco em Rede Cabeada)
A infraestrutura da sede administrativa prioriza o uso de rede cabeada para garantir estabilidade e segurança. Os dispositivos estão distribuídos da seguinte forma:
-	Servidores Corporativos: 02 unidades localizadas na TI Central para hospedagem do banco de dados de BI e sistemas de gestão.
-	Desktops/Laptops (17 unidades): Financeiro e Controladoria (04), Recursos Humanos (03), Compras e Suprimentos (02), TI Central/BI (04), Filiais (02) e Comercial/Marketing (02).
-	Segurança e Controle de Acesso: 03 dispositivos de biometria nas portas principais e 05 câmeras de segurança IP corporativas, todos operando via rede cabeada.
#### Filiais (Uberlândia e Patos de Minas)
Os 12 Tablets Ruggedized (06 por unidade) estão distribuídos entre as equipes de campo da seguinte forma:
-	Saúde Animal (Veterinários): 08 unidades (04 por filial) para monitoramento clínico e acesso aos dados dos colares.
-	Manutenção e Automação: 04 unidades (02 por filial) para diagnóstico técnico e suporte aos robôs.
-	Monitoramento Físico e Comportamental: Câmeras de segurança IP distribuídas estrategicamente para monitorar o comportamento do gado, saúde dos cascos e prevenir acidentes operacionais
### 3.3. Totalização Explícita de Dispositivos
Para fins de planejamento de rede, cálculo de portas (Switches de 24 portas) e dimensionamento de links, a infraestrutura da AgroMilk contará com o seguinte montante:
-	Total de Endpoints de Computação (Desktops + Laptops + Tablets + Servidores): 31 dispositivos.
-	Total de Dispositivos de Produção, Segurança e Controle (Sensores + Robôs + Câmeras + Biometria): 542 dispositivos.
-	Total de Infraestrutura Ativa (Roteadores + APs + Gateways): 27 dispositivos
## 4. Justificativa Técnica

A escolha pela arquitetura baseada em LoRaWAN e Wi-Fi 6 justifica-se pela necessidade de baixa latência na transmissão de dados dos robôs e alta penetração de sinal em ambiente rural, minimizando pontos cegos na coleta de dados que alimentam o ecossistema de BI da matriz.

Além disso, devido às grandes extensões territoriais das unidades produtivas (filiais), o projeto contemplará o uso de fibra óptica como backbone principal de interligação. Essa fibra óptica será responsável por conectar os Access Points (APs) Wi-Fi outdoor, espalhados pelos pastos e currais, até os equipamentos centrais da rede, garantindo que o alto volume de dados gerados pelos dispositivos IoT transite sem gargalos de performance. A infraestrutura de rede cabeada, especialmente na matriz, utilizará cabeamento estruturado com certificação corporativa de alta confiabilidade (padrão Gigalan Premium ou superior), que possui revestimento retardante a chamas e não emite gases tóxicos.

