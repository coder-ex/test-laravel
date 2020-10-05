<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <textarea rows="6" readonly="" class="form-control">{{ data.join('\n') }}</textarea>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="наберите сообщение" v-model="message">
                    <div class="input-group-append">
                        <button @click="sendData" class="btn btn-outline-secondary" type="button">Отправить</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                data: [],
                message: "",
            }
        },
        mounted() {
            var socket = io('http://127.0.0.1:3000');

            socket.on("news-action:App\\Events\\NewMessage", function (data) {
                this.data.push(data.message);
            }.bind(this));
        },
        methods: {
            sendData: function () {
                axios({
                    method: 'get',
                    url: '/start/send-message',
                    params: { message: this.message }
                }).then((response) => {
                    this.message = "";
                });
            }
        }
    }
</script>
