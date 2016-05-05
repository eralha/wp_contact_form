<div data-angular-module="module/angular/angular__module">

	<div ng-controller="myCtrl" class="cf contact__list" ng-init="getMessages()">

		<div class="panel panel-default" ng-class="{'delleting' : contact.delleting}" ng-repeat="contact in contacts" style="width:90%;">
		  <div class="panel-heading">
		    <h2 class="panel-title">{{contact.vchNome}} {{contact.vchApelido}} - {{contact.vchAssunto}}
		    	<div style="float:right;">{{getDate(contact.iData)}}</div>
		    </h2>
		  </div>
		  <div class="panel-body">
		    <b><a href="mailto:{{contact.vchEmail}}">{{contact.vchEmail}}</a></b><br />
		    <p>{{contact.vchMensagem}}</p>
		    <button type="button" class="btn btn-danger" ng-click="deleteContact(contact.iIDContacto)" ng-if="!contact.delleting">Apagar</button>
		  </div>
		</div>

		<ul class="list-group" style="width:90%;" ng-if="contacts.length == 0">
		  <li class="list-group-item">
    		Não existem contactos a apresentar.
		  </li>
		</ul>

	</div>

</div>