<div>

	<style type="text/css">
      select,
      input[type="email"] {
        height: 40px;
      	margin-bottom: 20px;
	    padding-top: 12px;
	    padding-bottom: 12px;
        background: transparent;
        border: 1px solid #e4e4e4;
        width: 100%;
        padding: 10px;
        color: #888;
        font-size: 12px;
        outline: none;
      }
      input[type="email"] { margin-left: -2px; }
      input.error,
      select.error,
      textarea.error {
      	background-color: #ffd1d1;
      	border-color: #f6a3a3;
      	color: #fff;
      }
    </style>

	<div ng-controller="myCtrl">

		<div ng-if="formError">
			<p><b>Ocorreu um erro ao enviar o seu pedido de contacto</b></p>
        	<p>Pedimos desculpa pelo incómodo, <a href="#" ng-click="sendForm()">tente novamente.</a></p>
		</div>

		<div ng-if="loading">
			<p><b>Estamos a processar o seu pedido.</b></p>
        	<p>Aguarde um momento.</p>
		</div>

		<div ng-if="formSent">
			<p><b>Recebemos os seu pedido de contacto</b></p>
        	<p>Entraremos em contacto assim que possível.</p>
		</div>

	    <form ng-show="!formSent && !loading" method="POST" id="formContactos" name="formContactos" class="comment-form" ng-model="formContactos" form-validator>
	      <div class="text-name"><input id="clientname" placeholder="Primeiro Nome*" name="clientname" type="text" value="" size="30" field-validator="required" ng-model="clientname"></div>
	      <div class="text-email"><input id="last_name" placeholder="Último Nome*" name="last_name" type="text" value="" size="30" field-validator="required" ng-model="last_name"></div>
	      <div class="text-email"><input id="_email" placeholder="Email*" name="_email" type="email" value="" size="30" field-validator="required,email" ng-model="_email"></div>
	      <div class="text-email">
	        <select id="assunto" name="assunto" field-validator="required" ng-model="assunto">
	          <option value="">Assunto*...</option>
	          <option value="Transformacoes">Transformações</option>
	          <option value="Apoio Geral">Apoio Geral</option>
	        </select>
	      </div>
	      <div class="text-comment">
	        <textarea id="message" placeholder="A sua mensagem..." name="message" field-validator="required" ng-model="message" rows="10"></textarea>
	      </div>
	      <p>* campos de preenchimento obrigatório</p>
	      <p class="form-submit"></p>
	    </form>

	    <input name="submit_contacto" ng-show="!formSent && !loading" type="submit" id="submit_contacto" value="Enviar Contacto" ng-click="sendForm()" />

    </div>

</div>