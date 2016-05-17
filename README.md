# mapasculturais-culturaviva

[![Stories in Ready](https://badge.waffle.io/culturagovbr/mapasculturais-culturaviva.svg?label=ready&title=Ready)](http://waffle.io/culturagovbr/mapasculturais-culturaviva)

## Tema de Mapas Culturais para a Rede Cultura Viva
Para facilitar explicação vamos criar uma pasta em
 /home/PastaPessoal
 ```
mkdir “mapas”

cd mapas

```
Vamos começar atualizando o sistema para garantir que tudo corra bem

` sudo apt-get update `

Agora, baixar a VirtualBox:
 ` sudo apt-get install virtualBox`

 O Vagrant:
 `sudo apt-get install -y vagrant`

O GitHub:
 ` sudo apt-get install -y git`

Ok, vamos então _Clonar_ o repositório do **Mapas Culturais**
e entrar na pasta clonada:

 ```
    git clone https://github.com/hacklabr/mapasculturais.git
cd mapasculturais
```

Inicie a instalação do **Mapas Culturais** no Vagrant

  `vagrant up`

*(Isso pode levar um tempo)*

Volte ao diretório principal e clone o repositório do CulturaViva
```
  cd ..
git clone https://github.com/culturagovbr/mapasculturais-culturaviva.git
 ```

Moveremos a pasta do Cultura Viva para a pasta ~~Temas~~ *themes* dentro do MapasCulturais

```
mv mapasculturais-culturaviva mapasculturais/src/protected/application/themes
```

E configurar o `config.php` para setar o tema Cultura Viva no Mapas

 *(Para fazer essa alteração é possível o uso de qualquer IDE)*
```
   vim mapasculturais/src/protected/application/conf/config.php
```
*(use `:h` dentro do vim para ver as opções de comando)*

Deve ficar desta forma:

![imagem de teste](/Exemplo.jpg)

Entre na pasta `/mapasculturais` e reinicie o Vagrant
```
cd mapasculturais

vagrant reload
```
Acesse a maquina virtual:

  ` vagrant ssh `

E acesse a pasta script e para compilar o tema:
```
/vagrant/scripts
./compile-sass.sh
```
### **Pronto!**
Agora, em seu navegador, acesse o Cultura Viva usando este endereço:

` 127.0.0.1:8000 `

*(Se aparecer essa tela abaixo está tudo certo)*

![Imagem de exemplo](/Exemplo2.jpg)

A próxima tela será a de autenticação

**→ A parte de cima é para super usuários, precisa só clicar em ok.**

→ A parte de baixo é para criar usuários normais.

**Se ocorrer algum erro na instalação fale conosco.**
