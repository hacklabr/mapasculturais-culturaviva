### Configurar mapasculturais

Para facilitar a explicação vamos criar uma pasta em
 /home/PastaPessoal
 ```
mkdir “mapas”

cd mapas

```

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
