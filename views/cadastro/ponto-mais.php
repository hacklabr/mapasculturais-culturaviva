<?php
    $this->bodyProperties['ng-app'] = "culturaviva";
    $this->layout = 'cadastro';
    $this->cadastroTitle = 'Fale mais sobre seu ponto';
    $this->cadastroText = 'Queremos entender melhor quais são as atividades realizadas pelo seu Ponto e quem é o público que as frequenta';
    $this->cadastroIcon = 'icon-vcard';
    $this->cadastroPageClass = 'ponto-mais page-base-form';
    
?>

<form ng-controller="ResponsibleCtrl">
    <div class="form">
        <h4>Informações Obrigatórias</h4>
        <div class="row">
            <label class="colunm-full">
                <span class="destaque">Em qual edital do Ministério da Cultura a entidade/coletivo já foi contemplado? <i>?</i><br>(Pode escolher mais de uma opção)</span>
            </label>
            <label class="colunm1">
                <input type="checkbox" name="ministerio" value=""> <span>Ponto de Cultura</span>
            </label>
            <label class="colunm2">
                <input type="checkbox" name="ministerio" value=""> <span>Pontão de Cultura</span>
            </label>
            <label class="colunm3">
                <input type="checkbox" name="ministerio" value=""> <span>Ponto de Mídia Livre</span>
            </label>
            <label class="colunm1">
                <input type="checkbox" name="ministerio" value=""> <span>Ponto de Memória</span>
            </label>
            <label class="colunm2">
                <input type="checkbox" name="ministerio" value=""> <span>Ponto de Leitura</span>
            </label>
            <label class="colunm3">
                <input type="checkbox" name="ministerio" value=""> <span>Ponto de Cultura Indígena</span>
            </label>
            <label class="colunm1">
                <input type="checkbox" name="ministerio" value=""> <span>Pontinho de Cultura</span>
            </label>
            <label class="colunm2">
                <input type="checkbox" name="ministerio" value=""> <span>Pontão de Bens Registrados</span>
            </label>
            <label class="colunm3">
                <input type="checkbox" name="ministerio" value=""> <span>Ainda não fui contemplado</span>
            </label>
            <label class="colunm1">
                <input type="checkbox" name="ministerio" value=""> <span>Outro</span>
                <span>Quais?*</span>
                <input type="text" >
            </label>
        </div>
        <div class="row">
            <label class="colunm-full">
                <span class="destaque">Quais são as ações estruturantes do Ponto/Pontão de Cultura? <i>?</i><br>(Pode escolher mais de uma opção)</span>
            </label>
            <label class="colunm1">
                <input type="checkbox" name="ministerio" value=""> <span>Conhecimentos<br>tradicionais</span>
            </label>
            <label class="colunm2">
                <input type="checkbox" name="ministerio" value=""> <span>Cultura, comunicação e<br>mídia livre</span>
            </label>
            <label class="colunm3">
                <input type="checkbox" name="ministerio" value=""> <span>Cultura e educação</span>
            </label>
            <label class="colunm1">
                <input type="checkbox" name="ministerio" value=""> <span>Economia criativa e<br>solidária</span>
            </label>
            <label class="colunm2">
                <input type="checkbox" name="ministerio" value=""> <span>Cultura digital</span>
            </label>
            <label class="colunm3">
                <input type="checkbox" name="ministerio" value=""> <span>Cultura e juventude</span>
            </label>
            <label class="colunm1">
                <input type="checkbox" name="ministerio" value=""> <span>Intercâmbio e<br>residências<br>artístico-culturais</span>
            </label>
            <label class="colunm2">
                <input type="checkbox" name="ministerio" value=""> <span>Cultura e saúde</span>
            </label>
            <label class="colunm3">
                <input type="checkbox" name="ministerio" value=""> <span>Cultura e direitos<br>humanos</span>
            </label>
            <label class="colunm1">
                <input type="checkbox" name="ministerio" value=""> <span>Livro, Leitura e<br>literatura</span>
            </label>
            <label class="colunm2">
                <input type="checkbox" name="ministerio" value=""> <span>Memória e patrimônio<br>cultural</span>
            </label>
            <label class="colunm3">
                <input type="checkbox" name="ministerio" value=""> <span>Cultura e meio<br>ambiente</span>
            </label>
             <label class="colunm1">
                <input type="checkbox" name="ministerio" value=""> <span>Cultura, infância e<br> adolescência</span>
            </label>
            <label class="colunm2">
                <input type="checkbox" name="ministerio" value=""> <span>Agente cultura viva</span>
            </label>
            <label class="colunm3">
                <input type="checkbox" name="ministerio" value=""> <span>Cultura circense</span>
            </label>
            <label class="colunm1">
                <input type="checkbox" name="ministerio" value=""> <span>Outro</span>
                <span>Quais?*</span>
                <input type="text" >
            </label>
        </div>
        <div class="row">
            <label class="colunm-full">
                <span class="destaque">Quais são as áreas do Ponto/Pontão de Cultura? <i>?</i><br>(Pode escolher mais de uma opção)</span>
            </label>
            <label class="colunm1">
                <input type="checkbox" name="ministerio" value=""> <span>Produção Cultural</span>
            </label>
            <label class="colunm2">
                <input type="checkbox" name="ministerio" value=""> <span>Artes Cênicas</span>
            </label>
            <label class="colunm3">
                <input type="checkbox" name="ministerio" value=""> <span>Artes Visuais</span>
            </label>
            <label class="colunm1">
                <input type="checkbox" name="ministerio" value=""> <span>Artesanato</span>
            </label>
            <label class="colunm2">
                <input type="checkbox" name="ministerio" value=""> <span>Audiovisual</span>
            </label>
            <label class="colunm3">
                <input type="checkbox" name="ministerio" value=""> <span>Capacitação</span>
            </label>
            <label class="colunm1">
                <input type="checkbox" name="ministerio" value=""> <span>Capoeira</span>
            </label>
            <label class="colunm2">
                <input type="checkbox" name="ministerio" value=""> <span>Contador de Histórias</span>
            </label>
            <label class="colunm3">
                <input type="checkbox" name="ministerio" value=""> <span>Cultura Afro</span>
            </label>
            <label class="colunm1">
                <input type="checkbox" name="ministerio" value=""> <span>Cultura Digital</span>
            </label>
            <label class="colunm2">
                <input type="checkbox" name="ministerio" value=""> <span>Cultura Indígenas</span>
            </label>
            <label class="colunm3">
                <input type="checkbox" name="ministerio" value=""> <span>Cultura Populares</span>
            </label>
            <label class="colunm1">
                <input type="checkbox" name="ministerio" value=""> <span>Comunicação</span>
            </label>
            <label class="colunm2">
                <input type="checkbox" name="ministerio" value=""> <span>Direitos Humanos</span>
            </label>
            <label class="colunm3">
                <input type="checkbox" name="ministerio" value=""> <span>Esporte</span>
            </label>
            <label class="colunm1">
                <input type="checkbox" name="ministerio" value=""> <span>Fotografia</span>
            </label>
            <label class="colunm2">
                <input type="checkbox" name="ministerio" value=""> <span>Gastronomia</span>
            </label>
            <label class="colunm3">
                <input type="checkbox" name="ministerio" value=""> <span>Gênero</span>
            </label>
            <label class="colunm1">
                <input type="checkbox" name="ministerio" value=""> <span>Hip Hop</span>
            </label>
            <label class="colunm2">
                <input type="checkbox" name="ministerio" value=""> <span>Juventude</span>
            </label>
            <label class="colunm3">
                <input type="checkbox" name="ministerio" value=""> <span>Literatura</span>
            </label>
            <label class="colunm1">
                <input type="checkbox" name="ministerio" value=""> <span>Meio Ambiente</span>
            </label>
            <label class="colunm2">
                <input type="checkbox" name="ministerio" value=""> <span>Moda</span>
            </label>
            <label class="colunm3">
                <input type="checkbox" name="ministerio" value=""> <span>Música</span>
            </label>
            <label class="colunm1">
                <input type="checkbox" name="ministerio" value=""> <span>Patrimônio<br>Cultural</span>
            </label>
            <label class="colunm2">
                <input type="checkbox" name="ministerio" value=""> <span>Software Livre</span>
            </label>
            <label class="colunm3">
                <input type="checkbox" name="ministerio" value=""> <span>Tradição Oral</span>
            </label>
            <label class="colunm1">
                <input type="checkbox" name="ministerio" value=""> <span>Turismo</span>
            </label>
            <label class="colunm2">
                <input type="checkbox" name="ministerio" value=""> <span>Áreas de Fronteira</span>
            </label>
            <label class="colunm3">
                <input type="checkbox" name="ministerio" value=""> <span>Internacional</span>
            </label>
            <label class="colunm1">
                <input type="checkbox" name="ministerio" value=""> <span>Outro
                <span>Quais?*</span>
                <input type="text" >
            </label>
        </div>
        <div class="row">
            <label class="colunm-full">
                <span class="destaque">Quais os públicos que participam das ações do Ponto/Pontão de Cultura? <i>?</i><br>(Pode escolher mais de uma opção)</span>
            </label>
            <label class="colunm1">
                <input type="checkbox" name="ministerio" value=""> <span>Afro-Brasileiros</span>
            </label>
            <label class="colunm2">
                <input type="checkbox" name="ministerio" value=""> <span>Ciganos</span>
            </label>
            <label class="colunm3">
                <input type="checkbox" name="ministerio" value=""> <span>Estudantes</span>
            </label>
            <label class="colunm1">
                <input type="checkbox" name="ministerio" value=""> <span>Grupos artísticos e<br>culturais<br>independentes</span>
            </label>
            <label class="colunm2">
                <input type="checkbox" name="ministerio" value=""> <span>Idosos </span>
            </label>
            <label class="colunm3">
                <input type="checkbox" name="ministerio" value=""> <span>Imigrantes</span>
            </label>
            <label class="colunm1">
                <input type="checkbox" name="ministerio" value=""> <span>Indígenas</span>
            </label>
            <label class="colunm2">
                <input type="checkbox" name="ministerio" value=""> <span>Crianças e<br>Adolescentes</span>
            </label>
            <label class="colunm3">
                <input type="checkbox" name="ministerio" value=""> <span>Juventude</span>
            </label>
            <label class="colunm1">
                <input type="checkbox" name="ministerio" value=""> <span>LGBT</span>
            </label>
            <label class="colunm2">
                <input type="checkbox" name="ministerio" value=""> <span>Mulheres</span>
            </label>
            <label class="colunm3">
                <input type="checkbox" name="ministerio" value=""> <span>Pescadores</span>
            </label>
            <label class="colunm1">
                <input type="checkbox" name="ministerio" value=""> <span>Pessoas com<br>deficiência</span>
            </label>
            <label class="colunm2">
                <input type="checkbox" name="ministerio" value=""> <span>Pessoas em situação<br>de sofrimento psíquico</span>
            </label>
            <label class="colunm3">
                <input type="checkbox" name="ministerio" value=""> <span>População de Rua</span>
            </label>
            <label class="colunm1">
                <input type="checkbox" name="ministerio" value=""> <span>População em regime<br>prisional</span>
            </label>
            <label class="colunm2">
                <input type="checkbox" name="ministerio" value=""> <span>Povos e Comunidades<br>Tradicionais de Matriz<br>Africana</span>
            </label>
            <label class="colunm3">
                <input type="checkbox" name="ministerio" value=""> <span>Público em Geral</span>
            </label>
            <label class="colunm1">
                <input type="checkbox" name="ministerio" value=""> <span>Quilombolas</span>
            </label>
            <label class="colunm2">
                <input type="checkbox" name="ministerio" value=""> <span>Ribeirinhos</span>
            </label>
            <label class="colunm3">
                <input type="checkbox" name="ministerio" value=""> <span>População Rural</span>
            </label>
            <label class="colunm1">
                <input type="checkbox" name="ministerio" value=""> <span>População de Baixa<br>Renda</span>
            </label>
            <label class="colunm2">
                <input type="checkbox" name="ministerio" value=""> <span>Grupos assentados de<br>reforma agrária</span>
            </label>
            <label class="colunm3">
                <input type="checkbox" name="ministerio" value=""> <span>Mestres, praticantes,<br>brincantes e grupos culturais<br>populares, urbanos e ruraisv
            </label>
            <label class="colunm1">
                <input type="checkbox" name="ministerio" value=""> <span>Pessoas ou grupos<br>vítimas de violência</span>
            </label>
            <label class="colunm2">
                <input type="checkbox" name="ministerio" value=""> <span>População sem teto</span>
            </label>
            <label class="colunm3">
                <input type="checkbox" name="ministerio" value=""> <span>Populações atingida<br>por barragens</span>
            </label>
            <label class="colunm1">
                <input type="checkbox" name="ministerio" value=""> <span>Populações de regiões<br>fronteiriças</span>
            </label>
            <label class="colunm2">
                <input type="checkbox" name="ministerio" value=""> <span>Populações em áreas de<br>vulnerabilidade social</span>
            </label>
        </div>
        <div class="row">
            <label class="colunm1">
                <input type="checkbox" name="ministerio" value=""> <span>Outro
                <span>Quais?*</span>
                <input type="text" >
            </label>
        </div>
    </div>
</form>
