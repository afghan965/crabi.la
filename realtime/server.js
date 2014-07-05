var SocketCluster = require('socketcluster').SocketCluster;

var socketCluster = new SocketCluster({
    workers: [9100, 9101, 9102],
    stores: [9001, 9002, 9003],
    balancerCount: 1, // Optional
    port: 8000,
    appName: 'myapp',
    workerController: 'worker.js',
    balancerController: 'firewall.js' // Optional
});
