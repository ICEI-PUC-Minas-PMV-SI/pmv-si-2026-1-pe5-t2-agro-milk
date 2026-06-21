# Considerações Finais
O presente projeto de infraestrutura da AgroMilk alcançou com êxito os objetivos propostos para a modernização, conectividade e segurança da rede corporativa da empresa. A implementação de uma arquitetura híbrida, aliando a infraestrutura em nuvem na AWS com a virtualização local, permitiu centralizar o gerenciamento de identidades e acessos através do Active Directory, além de garantir a alta disponibilidade dos serviços essenciais.

O monitoramento contínuo estabelecido por meio do Zabbix demonstrou a eficácia do uso do protocolo SNMP na coleta de métricas críticas de desempenho (CPU, memória e armazenamento), tanto no servidor Windows na nuvem quanto no ambiente Linux local, assegurando a estabilidade necessária para as operações ininterruptas das filiais de Smart Farming.

Ademais, o desenvolvimento e implantação do Módulo de Saúde Animal (aplicação web CRUD baseada em Node.js) atendeu perfeitamente aos requisitos de gestão agropecuária, integrando os dados gerados pelos dispositivos de campo (tablets e sensores IoT) diretamente ao banco de dados na nuvem. Por fim, a segurança de todo esse ecossistema foi solidificada por meio da elaboração da Política de Segurança da Informação (PSI), da conscientização dos colaboradores e da mitigação proativa de vulnerabilidades críticas listadas no OWASP Top 10 (2021) — como falhas de Controle de Acesso e Injeção de código —, consolidando uma infraestrutura resiliente, escalável e segura para o agronegócio.

# REFERÊNCIAS

ASSOCIAÇÃO BRASILEIRA DE NORMAS TÉCNICAS. NBR 10719: informação e documentação - relatório técnico e/ou científico - apresentação. 4. ed. Rio de Janeiro: ABNT, 2015.

AMAZON WEB SERVICES. Documentação da AWS. Seattle: AWS, 2026. Disponível em: https://docs.aws.amazon.com/pt_br/. Acesso em: 20 jun. 2026.

NODE.JS FOUNDATION. Node.js Documentation. [S. l.]: Node.js Foundation, 2026. Disponível em: https://nodejs.org/pt-br/docs/. Acesso em: 20 jun. 2026.

OWASP FOUNDATION. OWASP Top 10: 2021. The OWASP Foundation, 2021. Disponível em: https://owasp.org/www-project-top-ten/. Acesso em: 20 jun. 2026.

ZABBIX LLC. Zabbix Documentation 6.0. Riga: Zabbix, 2026. Disponível em: https://www.zabbix.com/documentation/current/pt/manual. Acesso em: 20 jun. 2026.
