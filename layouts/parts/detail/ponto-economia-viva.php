<div ng-controller="DetailCtrl">
    <div class="form">
        <div class="row">
            <h4>Rede Colaborativa</h4>
            <p>O Ponto/Pontão de Cultura só se realiza plenamente quando se articula em rede. Agir em rede é interagir em um universo de troca e colaboração mútua. Espaços, serviços, equipamentos, atividades, conexão, aquilo que o Ponto/Pontão tem, somado ao que o outro pode oferecer, multiplicam as possibilidades da rede e gera uma outra economia viva,  colaborativa e transformadora </p>
            <span class="destaque">O que o Ponto/Pontão de Cultura pode oferecer para a rede?</span>

            <div class="colunm-full">
                <span class="destaque">Infra-Estrutura</span>
            </div>
            <taxonomy-checkboxes taxonomy="ponto_infra_estrutura" entity="agent" terms="termos.ponto_infra_estrutura"></taxonomy-checkboxes>

            <div class="colunm-full">
                <span class="destaque">Equipamentos</span>
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
                <textarea ng-model="agent.pontoOutrosRecursosRede" disabled="true"></textarea>
            </label>
        </div>
        <div class="row">
            <h4>Economia Viva</h4>
            <div class="colunm-full">
                <span class="destaque">Quantas pessoas fazem parte do Ponto/Pontão de Cultura? (indique o número de pessoas em cada categoria)</span>
            </div>
            <label class="colunm-full">
                <input type="text" size="10" maxlength="3" class="inputqtd" disabled="true"
                       ng-model="agent.pontoNumPessoasNucleo"> Núcleo principal (pessoa dedicada exclusivamente/prioritariamente às ações desenvolvidas pelo Ponto/Pontão de Cultura)
            </label>
            <label class="colunm-full">

                <input type="text" size="10" maxlength="3" class="inputqtd" disabled="true"
                       ng-model="agent.pontoNumPessoasColaboradores">  Colaborador (pessoa que participa de ações específicas, de maneira pontual, mas mantêm um vínculo com o Ponto/Pontão de Cultura)
            </label>
            <div class="colunm-full">
                <span class="destaque">Quantas pessoas participam indiretamente do Ponto/Pontão de Cultura? (indique o número de pessoas em cada categoria)</span>
            </div>

            <label class="colunm-full">
                <input type="text" size="10" maxlength="3" class="inputqtd" disabled="true"
                       ng-model="agent.pontoNumPessoasParceiros">  Parceiro (participa pontualmente de ações do Ponto/Pontão de Cultura fornecendo serviços, recursos ou estrutura)
            </label>
            <label class="colunm-full">
                <input type="text" size="10" maxlength="3" class="inputqtd" disabled="true"
                       ng-model="agent.pontoNumPessoasApoiadores">  Apoiador (financia ou fomenta de alguma forma as atividades do Ponto/Pontão de Cultura)
            </label>
            <label class="colunm-full">
                <input type="text" size="10" maxlength="3" class="inputqtd" disabled="true"
                       ng-model="agent.pontoNumRedes">  Redes (outras redes que se relacionam com o Ponto/Pontão de Cultura)<br />
                <span class="destaque">Descreva: </span>
                <textarea ng-model="agent.pontoRedesDescricao" disabled="true"></textarea>
            </label>
            <label class="colunm-full">
                <input type="text" size="10" maxlength="3" class="inputqtd" disabled="true"
                       ng-model="agent.pontoMovimentos"> Movimentos (movimentos sociais, culturais, ambientais e outros que se relacionem com o Ponto/Pontão de Cultura)
            </label>

            <div class="colunm-full">
                <span class="destaque">Quais são as formas de sustentabilidade do Ponto/Pontão de Cultura?</span>
            </div>
            <taxonomy-checkboxes taxonomy="ponto_sustentabilidade" entity="agent" terms="termos.ponto_sustentabilidade"></taxonomy-checkboxes>

            <div class="colunm-full">
                <span class="destaque">O Ponto/Pontão de Cultura pratica Economia Solidária? Como?<i class='hltip' title='Entende-se por economia solidária, uma forma diferente de produzir, vender, comprar e trocar o que é preciso para viver. Sem explorar os outros, sem querer levar vantagem, sem destruir o ambiente. Cooperando, fortalecendo o grupo, cada um pensando no bem de todos e no próprio bem. Compreende-se por economia solidária o conjunto de atividades econômicas de produção, distribuição, consumo, poupança e crédito, organizadas sob a forma de autogestão.'>?</i></span>

            </div>
            <label class="colunm1">
                <input type="radio"
                       disabled="true"
                       name="pontoeconomia"
                       value="sim"
                       ng-model="agent.pontoEconomiaSolidaria"> Sim
                <div ng-show="agent.pontoEconomiaSolidaria==='sim'">
                    <span> Como? </span>
                    <textarea ng-model="agent.pontoEconomiaSolidariaDescricao" disabled="true"></textarea>
                </div>
            </label>
            <label class="colunm2">
                <input type="radio"
                       disabled="true"
                       name="pontoeconomia"
                       value="nao"
                       ng-model="agent.pontoEconomiaSolidaria"> Não
            </label>
            <label class="colunm3">
                <input type="radio"
                       disabled="true"
                       name="pontoeconomia"
                       value="gostaria"
                       ng-model="agent.pontoEconomiaSolidaria">  Não, mas gostaria
            </label>


            <div class="colunm-full">
                <span class="destaque">O Ponto/Pontão de Cultura pratica Economia da Cultura? <i class='hltip' title='Entende-se por economia criativa, um conceito em construção, mas é sabido que sua prática volta-se à economia do intangível, do simbólico. Essa concepção da economia prevê os ciclos de criação, produção, difusão, circulação/distribuição e consumo/fruição de bens e serviços caracterizados pela prevalência de sua dimensão simbólica originada por setores cujas atividades econômicas têm como processo principal o ato criativo, gerador de valor simbólico, elemento central da formação do preço, e que resulta em produção de riqueza cultural.'>?</i></span>
            </div>
            <label class="colunm1">
                <input type="radio"
                       disabled="true"
                       name="pontoeconomiacultura"
                       value="sim"
                       ng-model="agent.pontoEconomiaCultura"> Sim
                <div ng-show="agent.pontoEconomiaCultura==='sim'">
                    <span> Como? </span>
                    <textarea ng-model="agent.pontoEconomiaCulturaDescricao" disabled="true"></textarea>
                </div>
            </label>
            <label class="colunm2">
                <input type="radio"
                       disabled="true"
                       name="pontoeconomiacultura"
                       value="nao"
                       ng-model="agent.pontoEconomiaCultura"> Não
            </label>
            <label class="colunm3">
                <input type="radio"
                       disabled="true"
                       name="pontoeconomiacultura"
                       value="gostaria"
                       ng-model="agent.pontoEconomiaCultura"> Não, mas gostaria
            </label>

            <div class="colunm-full">
                <span class="destaque">O Ponto/Pontão de Cultura tem moeda complementar (social)? <i class='hltip' title='Moeda complementar (social): A moeda social é uma forma de moeda paralela criadas e administradas por seus próprios usuários (logo na esfera privada, da economia). Ela não tem qualquer vínculo obrigatório com a moeda nacional (oficial) e sua circulação é baseada na confiança mútua entre os usuários, participantes de um grupo circunscrito por adesão voluntária.'>?</i></span>
            </div>
            <label class="colunm1">
                <input type="radio"
                       disabled="true"
                       name="pontoeconomiasocial"
                       value="sim_fisica"
                       ng-model="agent.pontoMoedaSocial"> Sim, física
            </label>
            <label class="colunm2">
                <input type="radio"
                       disabled="true"
                       name="pontoeconomiasocial"
                       value="sim_digital"
                       ng-model="agent.pontoMoedaSocial"
                       > Sim, digital
            </label>
            <label class="colunm3">
                <input type="radio"
                       disabled="true"
                       name="pontoeconomiasocial"
                       value="nao_planejado"
                       ng-model="agent.pontoMoedaSocial"
                       > Não, mas está planejando seu lançamento
            </label>
            <label class="colunm1">
               <input type="radio"
                      disabled="true"
                      name="pontoeconomiasocial"
                       value="nao_pretende"
                       ng-model="agent.pontoMoedaSocial"
                      > Não, mas pretende ter
            </label>
            <label class="colunm2">
                <input type="radio"
                       disabled="true"
                       name="pontoeconomiasocial"
                       value="nao_entende"
                       ng-model="agent.pontoMoedaSocial"
                       > Não, porque não sabe o que é nem como funciona
            </label>
            <label class="colunm3">
                <input type="radio"
                       disabled="true"
                       name="pontoeconomiasocial"
                       value="nao_pretende_ter"
                       ng-model="agent.pontoMoedaSocial"
                       > Não, e não pretende ter
            </label>
            <div class="colunm-full" ng-show="agent.pontoMoedaSocial==='sim_fisica' || agent.pontoMoedaSocial==='sim_digital'">
                <span class="destaque">Conte em um parágrafo a definição e o funcionamento da sua moeda, seja física ou digital.</span>
                <textarea ng-model="agent.pontoMoedaSocialDescricao" disabled="true"></textarea>
            </div>

            <div class="colunm-full">
                <span class="destaque">O Ponto/Pontão de Cultura está disponível para as trocas de serviços ou produtos?</span>
            </div>
            <label class="colunm1">
                <input type="radio"
                       disabled="true"
                       name="culturaprodutos"
                       value="sim_parcial"
                       ng-model="agent.pontoTrocasServicos"> Sim, parcialmente
            </label>
            <label class="colunm2">
                <input type="radio"
                       disabled="true"
                       name="culturaprodutos"
                       value="sim_integral"
                       ng-model="agent.pontoTrocasServicos"> Sim, integralmente
            </label>
            <label class="colunm3">
                <input type="radio"
                       disabled="true"
                       name="culturaprodutos"
                       value="nao"
                       ng-model="agent.pontoTrocasServicos"> Não
            </label>
            <label class="colunm1">
                <input type="radio"
                       disabled="true"
                       name="culturaprodutos"
                       value="depende"
                       ng-model="agent.pontoTrocasServicos"> Depende de quem estará envolvido na troca
            </label>
            <label class="colunm2">
                <input type="radio"
                       disabled="true"
                       name="culturaprodutos"
                       value="outros"
                       ng-model="agent.pontoTrocasServicos"> Outros
                <textarea ng-show="agent.pontoTrocasServicos==='outros'" disabled="true"
                          ng-model="agent.pontoTrocasServicosOutros"></textarea>
            </label>

            <div class="colunm-full">
                <span class="destaque">O Ponto/Pontão de Cultura contrata serviços e/ou produtos de outros Pontos/Pontões de Cultura?</span>
            </div>
            <label class="colunm1">
                <input type="radio"
                       disabled="true"
                       name="servicoprodutos"
                       value="sim"
                       ng-model="agent.pontoContrataServicos">  Sim
                <div ng-show="agent.pontoContrataServicos==='sim'">
                    <span>Que tipo de serviços e/ou produtos?</span>
                    <textarea ng-model="agent.pontoContrataServicosOutros" disabled="true"></textarea>
                </div>
            </label>
            <label class="colunm2">
                <input type="radio"
                       disabled="true"
                       name="servicoprodutos"
                       value="nao"
                       ng-model="agent.pontoContrataServicos"> Não
            </label>
            <div class="colunm-full">
                <span class="destaque">O Ponto/Pontão de Cultura já apoiou, investiu ou emprestou algum recurso para projetos de outros coletivos, grupos, movimentos, redes, Pontos ou Pontões de Cultura?</span>
            </div>
            <label class="colunm1">
                <input type="radio"
                       disabled="true"
                       name="projetosapoiou"
                       value="sim"
                       ng-model="agent.pontoInvestimentosColetivos"> Sim
                 <div ng-show="agent.pontoInvestimentosColetivos==='sim'">
                    <span>Quanto e para quem?</span>
                    <textarea ng-model="agent.pontoInvestColetivosOutros" disabled="true"></textarea>
                </div>
            </label>
            <label class="colunm2">
                <input type="radio"
                       disabled="true"
                       name="projetosapoiou"
                       value="nao"
                       ng-model="agent.pontoInvestimentosColetivos"> Não
            </label>


            <label class="colunm-full">
                <span class="destaque">Quanto custa por ano o Ponto/Pontão de Cultura? (valore todas as atividades realizadas, pagamento de pessoal envolvido, aluguel e manutenção de sede e equipamentos, entre outros - custeados ou não com recursos do Ministério da Cultura).</span>
                <textarea ng-model="agent.pontoCustoAnual" disabled="true"></textarea>
            </label>
        </div>
    </div>
</div>
