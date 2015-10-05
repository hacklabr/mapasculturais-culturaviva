<?php
    $this->bodyProperties['ng-app'] = "culturaviva";
    $this->layout = 'cadastro';
    $this->cadastroTitle = '7. Economia Viva';
    $this->cadastroText = 'Fale mais sobre os recursos que o seu ponto tem para trocar com outros pontos de cultura.';
    $this->cadastroIcon = 'icon-dollar';
    $this->cadastroPageClass = 'economia-viva page-base-form';
    $this->cadastroLinkContinuar = 'formacao';

?>

<form ng-controller="PontoEconomiaVivaCtrl">
    <?php $this->part('messages'); ?>
    <div class="form">
        <div class="row">
            <h4>Rede Colaborativa</h4>
            <p>O Ponto/Pontão de Cultura só se realiza plenamente quando se articula em rede. Agir em rede é interagir em um universo de troca e colaboração mútua. Espaços, serviços, equipamentos, atividades, conexão, aquilo que o Ponto/Pontão tem, somado ao que o outro pode oferecer, multiplicam as possibilidades da rede e gera uma outra economia viva,  colaborativa e transformadora. </p>
            <span class="destaque title">O que o Ponto/Pontão de Cultura pode oferecer para a rede?*</span>

            <div class="colunm-full">
                <span class="destaque">Infra-Estrutura*</span>
            </div>
            <taxonomy-checkboxes taxonomy="ponto_infra_estrutura" entity="agent" terms="termos.ponto_infra_estrutura"></taxonomy-checkboxes>

            <div class="colunm-full">
                <span class="destaque">Equipamentos*</span>
            </div>
            <taxonomy-checkboxes taxonomy="ponto_equipamentos" entity="agent" terms="termos.ponto_equipamentos"></taxonomy-checkboxes>

            <div class="colunm-full">
             <span class="destaque">Recursos Humanos</span>
            </div>
            <taxonomy-checkboxes taxonomy="ponto_recursos_humanos" entity="agent" terms="termos.ponto_recursos_humanos"></taxonomy-checkboxes>

            <div class="colunm-full">
                <span class="destaque">Hospedagem</span>
            </div>
            <taxonomy-checkboxes taxonomy="ponto_hospedagem" entity="agent" terms="termos.ponto_hospedagem"></taxonomy-checkboxes>

            <div class="colunm-full">
                <span class="destaque">Deslocamento/Transportes</span>
            </div>
            <taxonomy-checkboxes taxonomy="ponto_deslocamento" entity="agent" terms="termos.ponto_deslocamento"></taxonomy-checkboxes>

            <div class="colunm-full">
                <span class="destaque">Serviços de Comunicação</span>
            </div>
            <taxonomy-checkboxes taxonomy="ponto_comunicacao" entity="agent" terms="termos.ponto_comunicacao"></taxonomy-checkboxes>

            <label class="colunm-full">
                <span class="destaque">Outros recursos (descreva outros itens que o Ponto/Pontão de Cultura tem disponível e não estavam especificados acima):</span>
                <textarea ng-model="agent.pontoOutrosRecursosRede" ng-blur="save_field('pontoOutrosRecursosRede')"></textarea>
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
