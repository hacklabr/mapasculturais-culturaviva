<style>
    .messages {
        position: fixed;
        top:5px;
        left:5px;
        right:5px;
        text-align: center;
        z-index:999999999;
    }

    .messages span{
        padding:10px;
        min-width:250px;
        display:inline-block;

    }

    .messages.sucesso span {
        background: #afa;
    }
    .messages.erro span {
        background: #faa;
    }
    .messages.enviando span {
        background: #ffa;
    }
</style>

<div ng-show="messages.status !== null" class="messages" ng-class="{sucesso: messages.status === 'sucesso', erro: messages.status === 'erro', enviando: messages.status === 'enviando'}"><span>{{messages.text}}</span></div>