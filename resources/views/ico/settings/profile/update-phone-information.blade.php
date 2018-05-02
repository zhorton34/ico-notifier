<update-phone-information :user="user" inline-template>
    <div class="card">
        <div class="card-header">Phone Details</div>

        <div class="card-body">
            <!-- Success Message -->
            <div class="alert alert-success" v-if="form.successful">
                Your phone details have been updated!
            </div>

            <form role="form">
                <!-- phone number -->
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Phone Number</label>

                    <div class="col-md-6">
                        <input type="tel" class="form-control" name="number"
                               v-model="form.number"
                               :class="{'is-invalid': form.errors.has('number')}">

                        <span class="invalid-feedback" v-show="form.errors.has('number')">
                            @{{ form.errors.get('number') }}
                        </span>
                    </div>
                </div>

                <!-- phone company -->
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Phone Company</label>

                    <div class="col-md-6">
                        <select class="form-control" v-model="form.company" :class="{'invalid-feedback': form.errors.has('company')}">
                            <option v-for="(gateway, provider) in this.spark.providers">
                                @{{ provider }}
                            </option>
                        </select>

                        <span class="invalid-feedback" v-show="form.errors.has('company')">
                            @{{ form.errors.get('company') }}
                        </span>
                    </div>
                </div>

                <!-- Update Button -->
                <div class="form-group">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary"
                                @click.prevent="update"
                                :disabled="form.busy">

                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</update-phone-information>