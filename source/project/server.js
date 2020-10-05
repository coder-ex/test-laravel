var http = require('http').Server();
var io = require('socket.io')(http);
var Redis = require('ioredis');

var redis = new Redis();
redis.psubscribe("news-action.*");
redis.on('pmessage', function (pattern, channel, message) {
    message = JSON.parse(message);

    console.log('Message recived: ' + JSON.stringify(message));
    console.log('Channel: ' + channel);

    io.emit(channel + ':' + message.event, message.data);
});

http.listen(3000, function () {
    console.log('Listening on Port: 3000');
});
