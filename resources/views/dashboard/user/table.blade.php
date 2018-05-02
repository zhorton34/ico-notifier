<ico-table :user="user" inline-template>
	<div class="container">
		<div class="row">
			<div class="col-md-6 add-notification">
				<form class="form-control" v-on:submit.prevent>
                    <h6 class="text-center">@{{ title }}</h6>
                    <hr>
                    <div class="form-group">
                        <label>Name</label>
					    <input class="form-control" type="text" v-model="preico" placeholder="Ex: Bitcoin"><br>
                        <label>Ticker/Symbol</label>
					    <input class="form-control" type="text" v-model="symbol" placeholder="Ex: BTC"><br>
					    <label>Source</label>
                        <input class="form-control" type="text" v-model="source" placeholder="Ex: The Crow"><br>
					    <label>Notes</label>
                        <input class="form-control" type="text" v-model="notes"  placeholder="Ex: Facebook Considering Using"><br>
                        <input type="hidden" value="false" />
                        <div class="text-center">
                            <hr><button @click="addNotification()" class="btn btn-primary">Add Notification</button>
                        </div>
                    </div>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
		        <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Ticker</th>
                            <th scope="col">Source</th>
                            <th scope="col">Notes</th>
                            <th scope="col">Date Recorded</th>
                            <th scope="col">Notify</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(token, index) in userSymbols">
                            <th scope="row">@{{ index + 1 }}.</th>
                            <td>@{{ token.preico }}</td>
                            <td>@{{ token.symbol }}</td>
                            <td>@{{ token.source }}</td>
                            <td>@{{ token.notes }}</td>
                            <td>@{{ token.created_at }}</td>
                            <td><input @click="updateNotification(token.symbol)" v-model="token.notify" type="checkbox" /></td>
                            <td @click="deleteNotification(token.symbol)"><i style="color:red" class="fa fa-trash"></i></td>
                        </tr>
                    </tbody>
                </table>
			</div>
		</div>
	</div>		
</ico-table>
