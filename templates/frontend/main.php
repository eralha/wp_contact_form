<div>

	<style type="text/css">
	  select,
	  textarea,
	  input[type="text"],
	  input[type="email"] {
	  	width: 100%;
	  	height: 40px;
	  	margin-bottom: 20px;
	  }
      select,
	  textarea,
	  input[type="text"],
	  input[type="email"] {
        height: 40px !important;
      	margin-bottom: 20px !important;
	    padding-top: 12px !important;
	    padding-bottom: 12px !important;
        background: transparent !important;
        border: 1px solid #c9c9c9 !important;
        width: 100% !important;
        padding: 10px !important;
        color: #888 !important;
        font-size: 12px !important;
        outline: none !important;
        -webkit-box-sizing: border-box;
		  -moz-box-sizing: border-box;
		  box-sizing: border-box;  
      }
      input.error,
      select.error,
      textarea.error {
      	background-color: #ffd1d1 !important;
      	border-color: #f6a3a3 !important;
      	color: #fff !important;
      }

      textarea {
      	height: 150px !important;
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
	          <option value="Apoio Jurídico">Apoio Jurídico</option>
	          <option value="Notariado">Notariado</option>
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