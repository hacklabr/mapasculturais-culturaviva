<style>
    .messages {
        position: fixed;
        top:5px;
        left:5px;
        right:5px;
        text-align: center;
    }

    .messages span{
        padding:10px;
        min-width:250px;
        display:inline-block;

    }

    .messages.saved span {
        background: #afa;
    }
    .messages.error span {
        background: #faa;
    }
    .messages.saving span {
        background: #ffa;
    }
</style>
<div ng-show="messages.status !== null" class="messages" ng-class="{saved: messages.status === 'saved', error: messages.status === 'error', saving: messages.status === 'saving'}"><span>{{messages.text}}</span></div>