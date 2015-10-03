<?php
    $this->bodyProperties['ng-app'] = "culturaviva";
    $this->layout = 'cadastro';
    $this->cadastroTitle = 'Fale mais sobre seu ponto';
    $this->cadastroText = 'Queremos entender melhor quais são as atividades realizadas pelo seu Ponto e quem é o público que as frequenta';
    $this->cadastroIcon = 'icon-vcard';
    $this->cadastroPageClass = 'ponto-mais page-base-form';
    $this->cadastroLinkContinuar = 'responsavel';

?>

<form ng-controller="PointCtrl">
    <?php $this->part('messages'); ?>
    <div class="form">
        <h4>Informações Obrigatórias</h4>
        <div class="row">
            <div class="colunm-full">
                <span class="destaque">Em qual edital do Ministério da Cultura a entidade/coletivo já foi contemplado? <i>?</i><br>(Pode escolher mais de uma opção)</span>
            </div>
            <taxonomy-checkboxes taxonomy="contemplado_edital" entity="agent" terms="termos.contemplado_edital"></taxonomy-checkboxes>
        </div>
        <div class="row">
            <div class="colunm-full">
                <span class="destaque">Quais são as ações estruturantes do Ponto/Pontão de Cultura? <i>?</i><br>(Pode escolher mais de uma opção)</span>
            </div>
            <taxonomy-checkboxes taxonomy="acao_estruturante" entity="agent" terms="termos.acao_estruturante"></taxonomy-checkboxes>
        </div>
        <div class="row">
            <div class="colunm-full">
                <span class="destaque">Quais são as áreas do Ponto/Pontão de Cultura? <i>?</i><br>(Pode escolher mais de uma opção)</span>
            </div>
            <taxonomy-checkboxes taxonomy="area" entity="agent" terms="termos.area" restricted-terms="true"></taxonomy-checkboxes>
        </div>
        <div class="row">
            <div class="colunm-full">
                <span class="destaque">Quais os públicos que participam das ações do Ponto/Pontão de Cultura? <i>?</i><br>(Pode escolher mais de uma opção)</span>
            </div>
            <taxonomy-checkboxes taxonomy="publico_participante" entity="agent" terms="termos.publico_participante"></taxonomy-checkboxes>
        </div>
        <div class="row">
            <h4>Rede Colaborativa</h4>
            <p>O Ponto/Pontão de Cultura só se realiza plenamente quando se articula em rede. Agir em rede é interagir em um universo de troca e colaboração mútua. Espaços, serviços, equipamentos, atividades, conexão, aquilo que o Ponto/Pontão tem, somado ao que o outro pode oferecer, multiplicam as possibilidades da rede e gera uma outra economia viva,  colaborativa e transformadora. </p>
            <span class="destaque title">O que o Ponto/Pontão de Cultura pode oferecer para a rede?*</span>
            <div class="colunm-full">
                <span class="destaque">Infra-Estrutura*</span>
            </div>
            <label class="colunm1">
                <input type="checkbox" name="" >  Acesso à internet
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Sala de aula
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Auditório
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" > Teatro
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Estúdio
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Palco
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" > Galpão
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Hackerspace
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Casa
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" > Apartamento
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Cozinha
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Garagem
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" > Jardim
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Bar
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Laboratório
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" > Gráfica
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Loja
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Outros Espaços.
            </label>
            <div class="colunm-full">
                <span class="destaque">Equipamentos*</span>
            </div>
            <label class="colunm1">
                <input type="checkbox" name="" > Câmera fotográfica
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Câmera filmadora
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Microfone
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" > Fone de Ouvido
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Boom
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Spot de luz
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" > Refletor
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Mesa de Som
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Caixa de Som
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" > Instrumento Musical
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Computador
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Mesa de Edição
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" > Impressora
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Scanner
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Outros
            </label>
            <div class="colunm-full">
             <span class="destaque">Recursos Humanos</span>
            </div>
            <label class="colunm1">
                <input type="checkbox" name="" > Ator / Atriz
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Dançarino / Dançarina
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Músico / Musicista
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" > Pesquisador
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Oficineiro
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Produtor
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" > Elaborador de Projeto Cultural
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Captador de Recursos
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Realizador audiovisual (Videomaker)
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" > Designer
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Fotógrafo
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Hacker
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" > Hacker
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Iluminador
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Sonorizador
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" > Maquiador
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Cenógrafo
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Eletricista
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" > Bombeiro Hidráulico
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Consultor
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Palestrante
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" > Rede Médica Solidária
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Outros
            </label>
            <div class="colunm-full">
                <span class="destaque">Hospedagem</span>
            </div>
            <label class="colunm1">
                <input type="checkbox" name="" > Convênio com Rede Hoteleira
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Hospedagem Solidária
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Camping
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" > Outros
            </label>
            <div class="colunm-full">
                <span class="destaque">Deslocamento/Transportes</span>
            </div>
            <label class="colunm1">
                <input type="checkbox" name="" > Passagem Aérea
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Carona, Veículo
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Passagem Terrestre
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" > Outros
            </label>
            <div class="colunm-full">
                <span class="destaque">Serviços de Comunicação</span>
            </div>
            <label class="colunm1">
                <input type="checkbox" name="" > Assessoria de Imprensa
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Produção de Conteúdo e Mobilização nas Redes Sociais
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Produção de Conteúdo e Informação
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" > Jornalismo
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Audiovisual
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Fotografia
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" > Desenvolvimento Web
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Mídia Comunitária
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Design
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" > Outros. Quais?
            </label>
            <label class="colunm-full">
                <span class="destaque">Outros recursos (descreva outros itens que o Ponto/Pontão de Cultura tem disponível e não estavam especificados acima):</span>
                <textarea></textarea >
            </label>
        </div>
        <div class="row">
            <h4>Conhecimento em Rede!</h4>
            <p>Pontos e Pontões de cultura também são formadores e multiplicadores de cultura. Esta parte do cadastro visa conectar conhecimentos e metodologias educativas,  de formação e aprendizagem desenvolvidas pelos Pontos e Pontões de Cultura, gerando uma grande Rede de Formação Livre Cultura Viva.</p>
            <p>O objetivo é mapear e sistematizar iniciativas de formação - formais e não formais, empíricas e teóricas, ancestrais e contemporâneas, urbanas e rurais - a fim de facilitar e ampliar as trocas de conhecimento na rede.</p>
            <p>As informações registradas neste cadastro farão parte de um banco de dados acessível a todos os Pontos e Pontões de Cultura, com o objetivo de estimular o intercâmbio de saberes.</p>
            <p class="destaque subtitle">Este  mapeamento prioriza as experiências produtivas no campo cultural e está dividido em 03 categorias:</p>
            <span class="destaque subtitle">1) Formadores: </span>
            <p>Formadores, professores, pesquisadores, mestres e mestras das culturas populare e tradicionais, arte-educadores e  investigadores que atuem no campo da cultura. </p>
            <span class="destaque subtitle">2) Espaços de Aprendizagem: </span>
            <p>Espaços culturais, sedes, eventos de formação e plataformas que possam ser consideradas espaços de aprendizagem.</p>
            <span class="destaque subtitle">3) Metodologias:</span>
            <p>Experiências de formação e aprendizagem, vivências, oficinas, cursos, palestras, dinâmicas de troca de conhecimento, entre outras metodologias.</p>
            <!-- span class="destaque subtitle">Categoria da inscrição:</span>
            <span class="destaque title"> Formadores</span>
            <span class="destaque subtitle">Formador 1</span>
            <label class="colunm-full">
                <span>Nome</span>
                <input type="text">
            </label>
            <label class="colunm-full">
                <span>Email: </span>
                <input type="text">
            </label>
            <label class="colunm-full">
                <span>Telefone: </span>
                <input type="text">
            </label>
            <label class="colunm-full">
                <span>Áreas de atuação (oficinas/atividades ministradas):</span>
                <input type="text">
            </label>
            <label class="colunm-full">
                <span>Descrição/Mini-bio:  </span>
                <input type="text">
            </label>
            <div class="colunm-full">
                <span class="destaque redessociais">Seu perfil nas redes sociais: <i>?</i></span>
            </div>
            <label class="colunm-redes facebook">
                <span><i class="icon icon-facebook-squared"></i> Seu perfil no Facebook</span>
                <input type="text" ng-blur="save_field('facebook')" ng-model="agent.facebook" placeholder="http://"/>
            </label>

            <label class="colunm-redes twitter">
                <span><i class="icon icon-twitter"></i> Seu perfil no Twitter</span>
                <input type="text" ng-blur="save_field('twitter')" ng-model="agent.twitter" placeholder="http://"/>
            </label>

            <label class="colunm-redes googleplus">
                <span><i class="icon icon-gplus"></i> Seu perfil no Google+</span>
                <input type="text" ng-blur="save_field('googleplus')" ng-model="agent.googleplus" placeholder="http://"/>
            </label>
            <span class="destaque subtitle">Formador 2</span>
            <label class="colunm-full">
                <span>Nome</span>
                <input type="text">
            </label>
            <label class="colunm-full">
                <span>Email: </span>
                <input type="text">
            </label>
            <label class="colunm-full">
                <span>Telefone: </span>
                <input type="text">
            </label>
            <label class="colunm-full">
                <span>Áreas de atuação (oficinas/atividades ministradas):</span>
                <input type="text">
            </label>
            <label class="colunm-full">
                <span>Descrição/Mini-bio:  </span>
                <input type="text">
            </label>
            <div class="colunm-full">
                <span class="destaque redessociais">Seu perfil nas redes sociais: <i>?</i></span>
            </div>
            <label class="colunm-redes facebook">
                <span><i class="icon icon-facebook-squared"></i> Seu perfil no Facebook</span>
                <input type="text" ng-blur="save_field('facebook')" ng-model="agent.facebook" placeholder="http://"/>
            </label>

            <label class="colunm-redes twitter">
                <span><i class="icon icon-twitter"></i> Seu perfil no Twitter</span>
                <input type="text" ng-blur="save_field('twitter')" ng-model="agent.twitter" placeholder="http://"/>
            </label>

            <label class="colunm-redes googleplus">
                <span><i class="icon icon-gplus"></i> Seu perfil no Google+</span>
                <input type="text" ng-blur="save_field('googleplus')" ng-model="agent.googleplus" placeholder="http://"/>
            </label>

            <span class="destaque title">Espaços de Aprendizagem</span>
            <div class="colunm-full">
                <span class="destaque">Que tipo de espaço/plataforma quer registrar?</span>
            </div>
            <label class="colunm-full">
                <input type="checkbox" name="" > Temporário (Por exemplo: Festival, seminário, encontro, evento digital ou presencial, entre outras)
            </label>
            <label class="colunm-full">
                <input type="checkbox" name="" > Permanente (Por exemplo:  Sede do Ponto de Cultura, espaços culturais onde podem ser realizadas atividades e processos formativos)
            </label>
            <p>Descreva o espaço (Cite atividades realizadas, público alcançado, periodicidade de ações):</p>
            <span class="destaque title"> Metodologias</span>
            <span class="destaque title">Metodologia 1</span>
            <label class="colunm-full">
                <span>Nome da metodologia:  </span>
                <input type="text">
            </label>
            <label class="colunm-full">
                <span>Descrição:  </span>
                <textarea></textarea>
            </label>
            <label class="colunm-full">
                <span>Necessidades técnicas:  </span>
                <textarea></textarea>
            </label>
            <label class="colunm-full">
                <span>Capacidade de público:  </span>
                 <input type="text">
            </label>
            <label class="colunm-full">
                <span>Carga horária:  </span>
                 <input type="text">
            </label>
            <label class="colunm-full">
                <span class="destaque">Possui certificação?</span>
            </label>
            <div class="colunm-50">
                <label class="label-radio"><input type="radio" name="certificacao"> Sim</label>
                <label class="label-radio"><input type="radio" name="certificacao"> Não </label>
            </div>
            <div class="colunm-full">
                <span class="destaque">Tipo de Metodologia</span>
            </div>
            <label class="colunm1">
                <input type="checkbox" name="" > Não formal
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Conhecimento popular
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Conhecimento empírico
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" > Outro. Qual?
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Acadêmica
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Ensino básico
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" > Ensino médio
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Ensino superior
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Graduação
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" > Pós-graduação
            </label>
            <span class="destaque title">Metodologia 2</span>
            <label class="colunm-full">
                <span>Nome da metodologia:  </span>
                <input type="text">
            </label>
            <label class="colunm-full">
                <span>Descrição:  </span>
                <textarea></textarea>
            </label>
            <label class="colunm-full">
                <span>Necessidades técnicas:  </span>
                <textarea></textarea>
            </label>
            <label class="colunm-full">
                <span>Capacidade de público:  </span>
                 <input type="text">
            </label>
            <label class="colunm-full">
                <span>Carga horária:  </span>
                 <input type="text">
            </label>
            <label class="colunm-full">
                <span class="destaque">Possui certificação?</span>
            </label>
            <div class="colunm-50">
                <label class="label-radio"><input type="radio" name="certificacao"> Sim</label>
                <label class="label-radio"><input type="radio" name="certificacao"> Não </label>
            </div>
            <div class="colunm-full">
                <span class="destaque">Tipo de Metodologia</span>
            </div>
            <label class="colunm1">
                <input type="checkbox" name="" > Não formal
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Conhecimento popular
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Conhecimento empírico
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" > Outro. Qual?
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Acadêmica
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Ensino básico
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" > Ensino médio
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Ensino superior
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Graduação
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" > Pós-graduação
            </label>
        </div -->
        <div class="row">
            <div class="colunm-full" >
                <span class="destaque title">Áreas de atuação</span>
            </div>
            <div class="row">
                <span class="destaque">Especifique a área de experiência e temas que você pode compartilhar conhecimento:*</span>
            </div>
            <label class="colunm1">
                <input type="checkbox" name="" > Produção Cultural
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Artes Cênicas
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Artes Visuais
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" > Artesanato
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Audiovisual
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Capacitação
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" > Capoeira
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Contador de Histórias
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Cultura Afro
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" > Cultura Alimentar
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Cultura Digital
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Culturas Indígenas
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" > Culturas Populares
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Comunicação
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Direitos Humanos
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" > Esporte
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Fotografia
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Gastronomia
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" > Gênero
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Hip Hop
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Juventude
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" > Literatura
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Meio Ambiente
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Moda
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" > Música
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Software Livre
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Tradição Oral
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" > Turismo
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Internacional
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Outros. Quais?
            </label>
        </div>
        <div class="row">
            <h4>Economia Viva</h4>
            <div class="colunm-full">
                <span class="destaque">Quantas pessoas fazem parte do Ponto/Pontão de Cultura? (indique o número de pessoas em cada categoria)*</span>
            </div>
            <label class="colunm-full">
                <input type="text" size="10" maxlength="3" class="inputqtd"> Núcleo principal (pessoa dedicada exclusivamente/prioritariamente às ações desenvolvidas pelo Ponto/Pontão de Cultura)
            </label>
            <label class="colunm-full">
                <input type="text" size="10" maxlength="3" class="inputqtd">  Colaborador (pessoa que participa de ações específicas, de maneira pontual, mas mantêm um vínculo com o Ponto/Pontão de Cultura)
            </label>
            <label class="colunm-full">
                <input type="text" size="10" maxlength="3" class="inputqtd">  Quantas pessoas participam indiretamente do Ponto/Pontão de Cultura? (indique o número de pessoas em cada categoria)*
            </label>
            <label class="colunm-full">
                <input type="text" size="10" maxlength="3" class="inputqtd">  Parceiro (participa pontualmente de ações do Ponto/Pontão de Cultura fornecendo serviços, recursos ou estrutura)
            </label>
            <label class="colunm-full">
                <input type="text" size="10" maxlength="3" class="inputqtd">  Apoiador (financia ou fomenta de alguma forma as atividades do Ponto/Pontão de Cultura)
            </label>
            <label class="colunm-full">
                <input type="text" size="10" maxlength="3" class="inputqtd">  Redes (outras redes que se relacionam com o Ponto/Pontão de Cultura)<br />
                <span class="destaque">Descreva: </span>
                <textarea></textarea>
            </label>
            <label class="colunm-full">
                <input type="checkbox"> Movimentos (movimentos sociais, culturais, ambientais e outros que se relacionem com o Ponto/Pontão de Cultura)
            </label>
            <div class="colunm-full">
                <span class="destaque">Quais são as formas de sustentabilidade do Ponto/Pontão de Cultura?</span>
            </div>
            <label class="colunm-full">
                <input type="checkbox" name="" > Prestação de serviços. Quais?
                <!-- textarea></textarea -->
            </label>
            <label class="colunm-full">
                <input type="checkbox" name="" > Venda de produtos. Quais?
                <!-- textarea></textarea -->
            </label>
            <label class="colunm-full">
                <input type="checkbox" name="" > Patrocínio. Quais?
                <!-- textarea></textarea -->
            </label>
            <label class="colunm-full">
                <input type="checkbox" name="" > Apoio/doação/colaboração
                <!-- input type="text" value="" -->
            </label>
            <label class="colunm-full">
                <input type="checkbox" name="" > Troca direta e indireta
                 <!-- input type="text" value="" -->
            </label>
            <label class="colunm-full">
                <input type="checkbox" name="" > Empréstimo
                 <!-- input type="text" value="" -->
            </label>
            <label class="colunm-full">
                <input type="checkbox" name="" > Emprego/salário
                 <!-- input type="text" value="" -->
            </label>
            <label class="colunm-full">
                <input type="checkbox" name="" > Convênio com Órgão público
                <input type="text" value="">
            </label>
            <label class="colunm-full">
                <input type="checkbox" name="" > Moeda complementar (social)
                <!-- textarea></textarea -->
            </label>
            <label class="colunm-full">
                <input type="checkbox" name="" > Outros.<br >
                <span class="destaque">Descreva: </span>
                <textarea></textarea>
            </label>
            <div class="colunm-full">
                <span class="destaque">O Ponto/Pontão de Cultura pratica Economia Solidária* ? Como?</span>
            </div>
            <label class="colunm1">
                <input type="radio" name="pontoeconomia" > Sim. Como?
                <textarea></textarea>
            </label>
            <label class="colunm2">
                <input type="radio" name="pontoeconomia" > Não
            </label>
            <label class="colunm3">
                <input type="radio" name="pontoeconomia" >  Não, mas gostaria
            </label>
            <div class="colunm-full">
                <spanc class="destaque">O Ponto/Pontão de Cultura pratica Economia da cultura*?</span>
            </div>
            <label class="colunm1">
                <input type="radio" name="pontoeconomiacultura" > Sim. Como?
                <textarea></textarea>
            </label>
            <label class="colunm2">
                <input type="radio" name="pontoeconomiacultura" > Não
            </label>
            <label class="colunm3">
                <input type="radio" name="pontoeconomiacultura" > Não, mas gostaria
            </label>
            <div class="colunm-full">
                <span class="destaque">O Ponto/Pontão de Cultura tem moeda complementar (social)? *</span>
            </div>
            <label class="colunm1">
                <input type="radio" name="pontoeconomiasocial" > Sim, física. Qual?
                <textarea></textarea>
            </label>
            <label class="colunm2">
                <input type="radio" name="pontoeconomiasocial" > Sim, digital. Qual?
                <textarea></textarea>
            </label>
            <label class="colunm3">
                <input type="radio" name="pontoeconomiasocial" > Não, mas está planejando seu lançamento
            </label>
            <label class="colunm1">
               <input type="radio" name="pontoeconomiasocial" > Não, mas pretende ter
            </label>
            <label class="colunm2">
                <input type="radio" name="pontoeconomiasocial" > Não, porque não sabe o que é nem como funciona
            </label>
            <label class="colunm3">
                <input type="radio" name="pontoeconomiasocial" > Não, e não pretende ter
            </label>
            <div class="colunm-full">
                <span class="destaque">Em caso afirmativo, conte em um parágrafo a definição e o funcionamento da sua moeda, seja física ou digital.</span>
            </div>
            <div class="colunm-full">
                <span class="destaque">O Ponto/Pontão de Cultura está disponível para as trocas de serviços ou produtos?</span>
            </div>
            <label class="colunm1">
                <input type="radio" name="culturaprodutos" > Sim, parcialmente
            </label>
            <label class="colunm2">
                <input type="radio" name="culturaprodutos" > Sim, integralmente
            </label>
            <label class="colunm3">
                <input type="radio" name="culturaprodutos" > Não
            </label>
            <label class="colunm1">
                <input type="radio" name="culturaprodutos" > Depende de quem estará envolvido na troca
            </label>
            <label class="colunm2">
                <input type="radio" name="culturaprodutos" > Outros
                <textarea></textarea>
            </label>
            <div class="colunm-full">
                <span class="destaque">O Ponto/Pontão de Cultura contrata serviços e/ou produtos de outros Pontos/Pontões de Cultura?</span>
            </div>
            <label class="colunm1">
                <input type="checkbox" name="" >  Sim. Que tipo de serviços e/ou produtos?
                <input type="radio" name="servicoprodutos" >  Sim. Que tipo de serviços e/ou produtos?
                <textarea></textarea>
            </label>
            <label class="colunm2">
                <input type="radio" name="servicoprodutos" > Não
            </label>
            <div class="colunm-full">
                <span class="destaque">O Ponto/Pontão de Cultura já apoiou, investiu ou emprestou algum recurso para projetos de outros coletivos, grupos, movimentos, redes, Pontos ou Pontões de Cultura?*</span>
            </div>
            <label class="colunm1">
                <input type="radio" name="projetosapoiou" > Sim. Quanto e para quem?
                <textarea></textarea>
            </label>
            <label class="colunm2">
                <input type="radio" name="projetosapoiou" > Não
            </label>
            <label class="colunm-full">
                <span>Quanto custa por ano o Ponto/Pontão de Cultura? (valore todas as atividades realizadas, pagamento de pessoal envolvido, aluguel e manutenção de sede e equipamentos, entre outros - custeados ou não com recursos do Ministério da Cultura).</span>
                <textarea></textarea>
            </label>
        </div>
        <div class="row">
            <h4>Articulação</h4>
            <div class="colunm-full">
                <span class="destaque">Participa de algum movimento político-cultural? *</span>
            </div>
            <label class="colunm1">
                <input type="radio" name="politicocultural" >   Não
            </label>
            <label class="colunm2">
                <input type="radio" name="politicocultural" >  Sim*
                <!-- textarea></textarea -->
            </label>
            <div class="colunm-full">
                <span class="destaque">Participa de algum Fórum de Cultura? *</span>
            </div>
            <label class="colunm1">
                <input type="radio" name="forumcultural" >  Não
            </label>
            <label class="colunm2">
                <input type="radio" name="forumcultural" > Sim*
                <!-- textarea></textarea -->
            </label>
            <div class="colunm-full">
                <span class="destaque">Participa de instância de representação junto ao Ministério da Cultura? *</span>
            </div>
            <label class="colunm1">
                <input type="checkbox" name="" >  Colegiados*
                <!-- textarea></textarea -->
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" >  Fóruns*
                <!-- textarea></textarea -->
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" >  Comissões
                <!-- textarea></textarea -->
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" >  Conferência Nacional de Cultura
                <!-- textarea></textarea -->
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" >  Grupo de Trabalho*
                <!-- textarea></textarea -->
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" >  Conselhos*
                <!-- textarea></textarea -->
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" >  Outros*
                <!-- textarea></textarea -->
            </label>
            <div class="colunm-full">
                <span class="destaque">Possui parceria com o Poder Público? *</span>
            </div>
            <label class="colunm1">
                <input type="radio" name="poderpublico" > Não
            </label>
            <label class="colunm2">
                <input type="radio" name="poderpublico" >  Sim*
                <!-- textarea></textarea -->
            </label>

        </div>
    </div>
</form>
