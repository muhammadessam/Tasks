    var Ziggy = {
        namedRoutes: {"login":{"uri":"login","methods":["GET","HEAD"],"domain":null},"logout":{"uri":"logout","methods":["POST"],"domain":null},"register":{"uri":"register","methods":["GET","HEAD"],"domain":null},"password.request":{"uri":"password\/reset","methods":["GET","HEAD"],"domain":null},"password.email":{"uri":"password\/email","methods":["POST"],"domain":null},"password.reset":{"uri":"password\/reset\/{token}","methods":["GET","HEAD"],"domain":null},"password.update":{"uri":"password\/reset","methods":["POST"],"domain":null},"password.confirm":{"uri":"password\/confirm","methods":["GET","HEAD"],"domain":null},"home":{"uri":"home","methods":["GET","HEAD"],"domain":null},"projects.index":{"uri":"projects","methods":["GET","HEAD"],"domain":null},"projects.create":{"uri":"projects\/create","methods":["GET","HEAD"],"domain":null},"projects.store":{"uri":"projects","methods":["POST"],"domain":null},"projects.show":{"uri":"projects\/{project}","methods":["GET","HEAD"],"domain":null},"projects.edit":{"uri":"projects\/{project}\/edit","methods":["GET","HEAD"],"domain":null},"projects.update":{"uri":"projects\/{project}","methods":["PUT","PATCH"],"domain":null},"projects.destroy":{"uri":"projects\/{project}","methods":["DELETE"],"domain":null},"tasks.index":{"uri":"tasks","methods":["GET","HEAD"],"domain":null},"tasks.create":{"uri":"tasks\/create","methods":["GET","HEAD"],"domain":null},"tasks.store":{"uri":"tasks","methods":["POST"],"domain":null},"tasks.show":{"uri":"tasks\/{task}","methods":["GET","HEAD"],"domain":null},"tasks.edit":{"uri":"tasks\/{task}\/edit","methods":["GET","HEAD"],"domain":null},"tasks.update":{"uri":"tasks\/{task}","methods":["PUT","PATCH"],"domain":null},"tasks.destroy":{"uri":"tasks\/{task}","methods":["DELETE"],"domain":null}},
        baseUrl: 'http://localhost/',
        baseProtocol: 'http',
        baseDomain: 'localhost',
        basePort: false,
        defaultParameters: []
    };

    if (typeof window.Ziggy !== 'undefined') {
        for (var name in window.Ziggy.namedRoutes) {
            Ziggy.namedRoutes[name] = window.Ziggy.namedRoutes[name];
        }
    }

    export {
        Ziggy
    }
