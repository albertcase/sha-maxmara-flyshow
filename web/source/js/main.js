// login js
var popup = {
  warningshow : function(selector,text) {
    var self = this;
    var warning = $(document.createElement('div'));
    warning.addClass('warningbox').append(text);
    warning.prependTo($(selector)).hide().slideDown();
    warning.one('click', function() {
      self.warningautomove($(this));
    });
    self.warningclear(warning);
    return true;
  },
  warningautomove: function(obj) {
    obj.fadeOut(function(){
      this.remove();
    });
  },
  warningclear : function(element) {
    setTimeout(this.warningautomove, '3000', element);
  },
  openprogress:function(){
    $("#myprogress").show();
  },
  closeprogress:function(){
    $("#myprogress").hide();
  },
  goprogress:function(t){
    $("#myprogress .progress-bar").attr("aria-valuenow" ,t);
    $("#myprogress .progress-bar").css("width", t+"%");
    $("#myprogress .sr-only").text(t+"%");
  },
  openwarning:function(text){
    this.warningshow('#warningpopup',text);
  },
  openloading:function(){
    $(".remodal-overlay").show();
  },
  closeloading:function(){
    $(".remodal-overlay").hide();
  }
};

(function($, popup){
  $(function(){
    $("#loginsubmit").click(function(){
      popup.openwarning("login error");
      window.location.reload();
    });
  });
})(jQuery, popup);

(function($, popup){
  var mouseinfo = {
    clientX: null,
    clientY: null,
  };
  var dmhtml= {
    mcontect: function(data){
      var a = "";
      if(data.hasOwnProperty("path"))
        a += '<div><img src="'+data.path+'"/></div>';
      if(data.hasOwnProperty("name"))
        a += '<div>'+data.name+'</div>';
      if(data.hasOwnProperty("comment"))
        a += '<div>'+data.comment+'</div>';
      a += '<div class="d-sedit"><i>edit</i></div>';
      a += '<div class="d-add"><i>addsub</i></div>';
      return a;
    },
    subslidbar: function(data){
      var a = "";
        a += '<div class="d-lastslide" sid="'+data.id+'">';
        if(data.hasOwnProperty("path"))
          a += '<div><img src="'+data.path+'"/></div>';
        if(data.hasOwnProperty("name"))
          a += '<div>'+data.name+'</div>';
        if(data.hasOwnProperty("comment"))
          a += '<div>'+data.comment+'</div>';
        a += '<div class="d-sdrag"></div>';
        a += '<div class="d-strush"><i>delete</i></div>';
        a += '<div class="d-sedit"><i>edit</i></div>';
        a += '</div>';
      return a;
    },
    slidbar: function(data, deep){
      var self = this;
      var d = deep?deep:1;
      var la = data.length;
      var a = ""
      for(var i=0; i<la; i++){
        if(data[i].type == "mslid"){
          a += "<input id='s"+d+i+"' type='checkbox' class='d-scbu d-scboxinput' />";
          a += '<div class="d-slidbar" sid="'+data[i].id+'">';
          a += "<div>";
          a += "<label for='s"+d+i+"' class='d-scbox'>";
          a += '<b class="d-scbu scsleft">▷</b>';
          a += '<b class="d-scbu scsdown">▽</b>';
          a += '</label>';
          a += '</div>';
          a += self.mcontect(data[i]);
          a += '</div>';
          a += '<div class="d-slidbox">';
          a += self.slidbar(data[i]["son"], (d+1));
          a += '</div>';
        }
        if(data[i].type == "lslid")
          a += self.subslidbar(data[i]);
      }
      return a;
    },
    buildlist: function(data, obj){
      var self = this;
      obj.html(self.slidbar(data));
    }
};
  var main = {
    sheight: null,
    swidth: null,
    smoveh: 0,
    sObjh: 0,
    SmNo: null,
    newOm: null,
    control: "#d-editshow",
    dragmove: function(e,obj){
      var self = this;
      var list = obj.parent().children();
      var LNo = obj.index();
      var rangeMax = self.sObjh.top + (list.length - LNo -1) * parseInt(self.sheight); //the max height
      var rangeMin = self.sObjh.top - LNo * parseInt(self.sheight);//the min height
      var gapY = e.clientY - self.smoveh;
      var top = self.sObjh.top + gapY;
      var N = (gapY < 0)?-1:1;
      var Sm = LNo + (parseInt(Math.abs(gapY) / parseInt(self.sheight)) + 1) * N;
      self.newOm = parseInt((top - rangeMin + parseInt(self.sheight)/2) / parseInt(self.sheight));
      if(top < rangeMin || top > rangeMax){// out of ranger
        var Smtop = 0;
        var Smbot = parseInt(self.sheight);
        if(top < rangeMin){
          top = rangeMin;
        }
        if(top > rangeMax){
          top = rangeMax;
          Sm = (LNo == (list.length - 1))?(list.length - 2):(list.length - 1);
        }
        if(Sm < 0){
          var Smtop = parseInt(self.sheight);
          var Smbot = 0;
          Sm = (LNo == 0)?1:0;
        }
      }else{
        if(N < 0){//position change
          var Smtop = Math.abs(gapY) % parseInt(self.sheight);
          var Smbot = parseInt(self.sheight) - Smtop;
          self.newOm = self.newOm - 1;
        }else{
          var Smbot = Math.abs(gapY) % parseInt(self.sheight);
          var Smtop = parseInt(self.sheight) - Smbot;
        }
      }
      var ObjSm = list.eq(Sm);
      ObjSm.css({"margin-top": Smtop + "px", "margin-bottom": Smbot + "px"});
      if(self.SmNo != Sm){
        list.eq(self.SmNo).css({"margin-top": 0,"margin-bottom": 0});
      }
      self.SmNo = Sm;
      obj.css({"top": top+'px', "height": self.sheight, 'width': self.swidth, "position": "absolute"});
    },
    movfun: function(e){
      main.dragmove(e,$(".d-sdragmove"));
    },
    removmove: function(){
      var self = this;
      var list = $(".d-sdragmove").parent().children();
      $(".d-sdragmove").css({"position": "static"});
      list.eq(self.SmNo).css({"margin-top": "0px","margin-bottom": 0});
      if(self.newOm < 0){//move curreny obj
        $(".d-sdragmove").prependTo($(".d-sdragmove").parent());
      }else{
        list.eq(self.newOm).after($(".d-sdragmove"));
      }
      document.getElementsByTagName("body")[0].removeEventListener("mousemove", self.movfun);
      $(".d-sdragmove").removeClass("d-sdragmove");
    },
    initdrag: function(obj,e){
      var self = this;
      self.sheight = obj.parent().css("height");
      self.swidth = obj.parent().css("width");
      self.sObjh = obj.parent().offset();
      self.smoveh = e.clientY;
      obj.parent().addClass("d-sdragmove");
      document.getElementsByTagName("body")[0].addEventListener("mousemove", self.movfun);
      obj.parent().one("mouseout",function(){
        self.removmove();
      });
      $("body").one("mouseup",function(){
        self.removmove();
      });
    },
    onload: function(){
      var self = this;
      $(self.control).on("mousedown" ,".d-sdrag", function(e){
        self.initdrag($(this),e);
      });
    }
  };

  var dedit = {
    buildS1: function(data){
      var a1 = '<img src="'+data.path+'" />';
      a1 += '<span>×</span>';
      $('[data-remodal-id=S1modal] .editimg').html(a1);
      var a2 = '<dl>';
      a2 += '<dt style="width:60px">Name:</dt>';
      a2 += '<dd><input id="msname" type="text" placeholder="Name" value="'+data.name+'"></dd>';
      a2 += '</dl>';
      $('[data-remodal-id=S1modal] .editconect').html(a2);
    },
    ajaxMitemGet: function(){
      popup.openloading();
      $.ajax({
        url: "/api/mitemget",
        type: "post",
        dataType:'json',
        success: function(data){
          popup.closeloading();
          if(data.code == '10'){
            console.log(data);
            dedit.buildS1(data.data);
            var inst = $('[data-remodal-id=S1modal]').remodal();
            inst.open();
            return true;
          }
          popup.openwarning(data.msg);
        },
        error: function(){
          popup.closeloading();
          popup.openwarning(data.msg);
        }
      });
    },
    onload: function(){
      $(".editslidshow").on("mouseup", "#d-editshow>.d-slidbar>.d-sedit>i", function(){
        dedit.ajaxMitemGet();
      });
      $("#d-editshow").on("click", ".d-slidbox>.d-slidbar>.d-sedit>i", function(){
        var inst = $('[data-remodal-id=S2modal]').remodal();
        inst.open();
      });
      $("#d-editshow").on("click", ".d-lastslide>.d-sedit>i", function(){
        var inst = $('[data-remodal-id=S3modal]').remodal();
        inst.open();
      });
    }
  }

  $(function(){
    dmhtml.buildlist(pagecode, $("#d-editshow"));
    main.onload();
    dedit.onload();
  });
})(jQuery, popup);
