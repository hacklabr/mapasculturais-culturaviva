# mapasculturais-culturaviva

[![Stories in Ready](https://badge.waffle.io/culturagovbr/mapasculturais-culturaviva.svg?label=ready&title=Ready)](http://waffle.io/culturagovbr/mapasculturais-culturaviva)

## Tema de Mapas Culturais para a Rede Cultura Viva

Para facilitar explicação vamos criar uma pasta em
 /home/PastaPessoal
'''
  mkdir “mapas”
  cd mapas
'''
Atualizar o sistema
 → sudo apt-get update

Baixar virtualBox
 → sudo apt-get install virtualBox

Baixar Vagrant
 → sudo apt-get install -y vagrant

Baixar git
 → sudo apt-get install -y git

Clonar repositório mapasculturais
 → git clone https://github.com/hacklabr/mapasculturais.git
 → Entrar na pasta clonada cd mapasculturais

Iniciar instalação do mapasculturais
 → vagrant up
  (Isso pode levar um tempo)

voltar um diretório e clonar repositório do culturaviva
 → cd ..
 → git clone https://github.com/culturagovbr/mapasculturais-culturaviva.git

Mover a pasta do cultura viva para a pasta themes dentro do mapasculturais
 → mv mapasculturais-culturaviva mapasculturais/src/protected/application/themes

Configurar o config.php para setar o thema cultura viva no mapas
  → vim mapasculturais/src/protected/application/conf/config.php
  → Deve ficar desta forma abaixo:







Entrar na pasta mapasculturais e reiniciar o vagrant
  → cd mapasculturais
  → vagrant reload

Acessar a maquina virtual
  → vagrant ssh

acessar pasta script e compilar o tema
  → /vagrant/scripts
  → ./compile-sass.sh
Em seu navegador acesse o cultura viva
