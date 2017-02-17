function radarChart(mc, tc, hw, bs, ks, ac){
    var canvas = document.getElementById("radarChart");
    var stage = new createjs.Stage(canvas);

    var a = new createjs.Shape();
    a.graphics.beginFill("#80000022");
    a.graphics.drawPolyStar(300, 300, 200, 6, 0, 0);
    a.graphics.beginFill("#80000022");
    a.graphics.drawPolyStar(300, 300, 180, 6, 0, 0);
    a.graphics.beginFill("#00800022");
    a.graphics.drawPolyStar(300, 300, 160, 6, 0, 0);
    a.graphics.beginFill("#00800022");
    a.graphics.drawPolyStar(300, 300, 140, 6, 0, 0);
    a.graphics.beginFill("#00008022");
    a.graphics.drawPolyStar(300, 300, 120, 6, 0, 0);
    a.graphics.beginFill("#00008022");
    a.graphics.drawPolyStar(300, 300, 100, 6, 0, 0);
    a.graphics.beginFill("#00000022");
    a.graphics.drawPolyStar(300, 300, 80, 6, 0, 0);
    a.graphics.beginFill("#00000022");
    a.graphics.drawPolyStar(300, 300, 60, 6, 0, 0);
    a.graphics.beginFill("#00000022");
    a.graphics.drawPolyStar(300, 300, 40, 6, 0, 0);
    a.graphics.beginFill("#00000022");
    a.graphics.drawPolyStar(300, 300, 20, 6, 0, 0);

    var blinecolor = "#00000022";
    var b = new createjs.Shape();
    b.graphics.setStrokeStyle(2);
    b.graphics.beginStroke(blinecolor);
    b.graphics.lineTo(300, 300);
    b.graphics.lineTo(100, 300);
    b.graphics.endStroke();

    b.graphics.moveTo(300, 300);

    b.graphics.beginStroke(blinecolor);
    b.graphics.lineTo(300, 300);
    b.graphics.lineTo(200, 125);
    b.graphics.endStroke();

    b.graphics.beginStroke(blinecolor);
    b.graphics.lineTo(300, 300);
    b.graphics.lineTo(400, 125);
    b.graphics.endStroke();

    b.graphics.beginStroke(blinecolor);
    b.graphics.lineTo(300, 300);
    b.graphics.lineTo(500, 300);
    b.graphics.endStroke();

    b.graphics.beginStroke(blinecolor);
    b.graphics.lineTo(300, 300);
    b.graphics.lineTo(400, 475);
    b.graphics.endStroke();

    b.graphics.beginStroke(blinecolor);
    b.graphics.lineTo(300, 300);
    b.graphics.lineTo(200, 475);
    b.graphics.endStroke();

    stage.addChild(a);
    stage.addChild(b);

    var centerX = 300;
    var centerY = 300;
    var radius = 200;


    var mcX = radius * mc/10 * (1/2);
    var mcY = radius * mc/10 * Math.sqrt(3)/2;


    var tcX = radius * tc/10 * 1;
    var tcY = radius * tc/10 * 0;


    var hwX = radius * hw/10 * (1/2);
    var hwY = radius * hw/10 * -Math.sqrt(3)/2;


    var bsX = radius * bs/10 * (-1/2);
    var bsY = radius * bs/10 * -Math.sqrt(3)/2;


    var ksX = radius * ks/10 * (-1);
    var ksY = radius * ks/10 * 0;


    var acX = radius * ac/10 * (-1/2);
    var acY = radius * ac/10 * Math.sqrt(3)/2;

    var c = new createjs.Shape();
    c.graphics.setStrokeStyle(1);
    c.graphics.beginStroke("black");
    c.graphics.beginFill("#00000088");
    c.graphics.lineTo(centerX+mcX, centerY-mcY);
    c.graphics.lineTo(centerX+tcX, centerY-tcY);
    c.graphics.lineTo(centerX+hwX, centerY-hwY);
    c.graphics.lineTo(centerX+bsX, centerY-bsY);
    c.graphics.lineTo(centerX+ksX, centerY-ksY);
    c.graphics.lineTo(centerX+acX, centerY-acY);

    stage.addChild(c);

    var mcLabel = new createjs.Text("MC", "24px Arial", "#000");
    mcLabel.x = 400;
    mcLabel.y = 100;
    stage.addChild(mcLabel);

    var tcLabel = new createjs.Text("TC", "24px Arial", "#000");
    tcLabel.x = 510;
    tcLabel.y = 285;
    stage.addChild(tcLabel);

    var hwLabel = new createjs.Text("HW", "24px Arial", "#000");
    hwLabel.x = 400;
    hwLabel.y = 490;
    stage.addChild(hwLabel);

    var bsLabel = new createjs.Text("BS", "24px Arial", "#000");
    bsLabel.x = 180;
    bsLabel.y = 490;
    stage.addChild(bsLabel);

    var ksLabel = new createjs.Text("KS", "24px Arial", "#000");
    ksLabel.x = 60;
    ksLabel.y = 285;
    stage.addChild(ksLabel);

    var acLabel = new createjs.Text("AC", "24px Arial", "#000");
    acLabel.x = 180;
    acLabel.y = 100;
    stage.addChild(acLabel);

    stage.update();

    var hitBox = new createjs.Shape();
    hitBox.graphics.beginFill("white").drawRect(0, 0, 50, 50);
    mcLabel.hitArea = hitBox;
    tcLabel.hitArea = hitBox;
    hwLabel.hitArea = hitBox;
    bsLabel.hitArea = hitBox;
    ksLabel.hitArea = hitBox;
    acLabel.hitArea = hitBox;

    mcLabel.addEventListener("mouseover", function() {
        mcLabel.text= mc;
        stage.update();
    });

    mcLabel.addEventListener("mouseout", function() {
        mcLabel.text= "MC";
        stage.update();
    });

    tcLabel.addEventListener("mouseover", function() {
        tcLabel.text= tc;
        stage.update();
    });

    tcLabel.addEventListener("mouseout", function() {
        tcLabel.text= "TC";
        stage.update();
    });

    hwLabel.addEventListener("mouseover", function() {
        hwLabel.text= hw;
        stage.update();
    });

    hwLabel.addEventListener("mouseout", function() {
        hwLabel.text= "HW";
        stage.update();
    });

    bsLabel.addEventListener("mouseover", function() {
        bsLabel.text= bs;
        stage.update();
    });

    bsLabel.addEventListener("mouseout", function() {
        bsLabel.text= "BS";
        stage.update();
    });

    ksLabel.addEventListener("mouseover", function() {
        ksLabel.text= ks;
        stage.update();
    });

    ksLabel.addEventListener("mouseout", function() {
        ksLabel.text= "KS";
        stage.update();
    });

    acLabel.addEventListener("mouseover", function() {
        acLabel.text= ac;
        stage.update();
    });

    acLabel.addEventListener("mouseout", function() {
        acLabel.text= "AC";
        stage.update();
    });

    stage.enableMouseOver(20);
}