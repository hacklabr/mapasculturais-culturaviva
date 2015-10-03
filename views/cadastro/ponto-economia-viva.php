<?php
    $this->bodyProperties['ng-app'] = "culturaviva";
    $this->layout = 'cadastro';
    $this->cadastroTitle = 'Fale mais sobre seu ponto';
    $this->cadastroText = 'Queremos entender melhor quais são as atividades realizadas pelo seu Ponto e quem é o público que as frequenta';
    $this->cadastroIcon = 'icon-vcard';
    $this->cadastroPageClass = 'ponto-mais page-base-form';
    $this->cadastroLinkContinuar = 'formacao';

?>

<form ng-controller="PointCtrl">
    <?php $this->part('messages'); ?>
    <div class="form">
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
    </div>
</form>
