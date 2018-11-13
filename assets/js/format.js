  var eeisus = 0;
  var eetrue = "VERDADEIRO";
  var eefalse = "FALSO";
  var eedec = ",";
  var eeth = ".";
  var eedecreg = new RegExp(",","g");
  var eethreg = new RegExp("[.]","g");
  var fmtdaynamesshort = new Array("dom","seg","ter","qua","qui","sex","sáb");
  var fmtdaynameslong = new Array("domingo","segunda-feira","terça-feira","quarta-feira","quinta-feira","sexta-feira","sábado");
  var fmtmonthnamesshort = new Array("jan","fev","mar","abr","mai","jun","jul","ago","set","out","nov","dez");
  var fmtmonthnameslong = new Array("janeiro","fevereiro","março","abril","maio","junho","julho","agosto","setembro","outubro","novembro","dezembro");
  var fmtstrings = new Array("/"," ","de");
  var fmtdate1 = new Array(7,32,3,32,11);
  var fmtdate2 = new Array(5,33,34,33,11);
  var fmtdate3 = new Array(1);fmtdate3[0]=5;

  var eecm1=new Array();

  function myIsNaN(x){
    return(isNaN(x)||(typeof x=='number'&&!isFinite(x)));
  };

  function mod(n,d){
    return n-d*Math.floor(n/d);
  };

  function round(n,nd){
    if(isFinite(n)&&isFinite(nd)){
      var sign_n=(n<0)?-1:1;
      var abs_n=Math.abs(n);
      var factor=Math.pow(10,nd);
      return sign_n*Math.round(abs_n*factor)/factor;
    }else{
      return NaN;
    }
  };

  function andgeneral(cnt,vsum,vcnt,x){
    if(!vsum){
      return false;
    };
    for(var ii=0;ii<x.length;ii++){
      var arr=x[ii][0];
      for(var jj=x[ii][1];jj<=x[ii][3];jj++){
        for(var kk=x[ii][2];kk<=x[ii][4];kk++){
          if(!arr[jj][kk]){
            return false;
          };
        };
      };
    };
    return true;
  };

  function eeparseFloat(str){
    str = String(str).replace(eedecreg,".");
    var res = parseFloat(str);
    if(isNaN(res)){
      return 0;
    }else{
      return res;
    }
  };

  function eedisplayFloat(x){
    if(myIsNaN(x)){
      return Number.NaN;
    }else{
      return String(x).replace(/\./g,eedec);
    }
  };

  function eedisplayFloatND(x,nd){
    if(myIsNaN(x)){
      return Number.NaN;
    }else{
      var res = round(x,nd);
      if(nd>0){
        var str = String(res);
        if(str.indexOf('e')!=-1)
          return str;
        if(str.indexOf('E')!=-1)
          return str;
        var parts = str.split('.');
        if(parts.length<2){
        var decimals = ('00000000000000').substring(0,nd);
        return(parts[0]).toString()+eedec+decimals;
      }else{
        var decimals=((parts[1]).toString()+'00000000000000').substring(0,nd);
        return(parts[0]).toString()+eedec+decimals;}
      }else{
        return res;
      }
    }
  };

  function eedisplayPercentND(x,nd){
    if(myIsNaN(x)){
      return Number.NaN;
    }else{
      return eedisplayFloatND(x*100,nd)+'%';
    }
  }

  function eeparseFloatTh(str){
    str = String(str).replace(eethreg,"");
    str = String(str).replace(eedecreg,".");
    var res = parseFloat(str);
    if(isNaN(res)){
      return 0;
    }else{
    return res;
    }
  };

  function eedisplayFloatNDTh(x,nd){
    if(myIsNaN(x)){
      return Number.NaN;
    }else{
      var res = round(x,nd);
      if(nd>0){
        var str=String(res);
        if(str.indexOf('e')!=-1)
          return str;
        if(str.indexOf('E')!=-1)
          return str;
        var parts=str.split('.');
        var res2=eeinsertThousand(parts[0].toString());
        if(parts.length<2){
          var decimals=('00000000000000').substring(0,nd);
          return(res2+eedec+decimals);
        }else{
          var decimals=((parts[1]).toString()+'00000000000000').substring(0,nd);
          return(res2+eedec+decimals);
        }
      }else{
        return(eeinsertThousand(res.toString()));
      }
    }
  };

  function eeinsertThousand(whole){
    if(whole==""||whole.indexOf("e")>=0){
      return whole;
    }else{
      var minus_sign="";
      if(whole.charAt(0)=="-"){minus_sign="-";
      whole=whole.substring(1);};
      var res="";
      var str_length=whole.length-1;
      for(var ii=0;ii<=str_length;ii++){
        if(ii>0&&ii%3==0){
          res=eeth+res;
        };
        res=whole.charAt(str_length-ii)+res;
      };
      return minus_sign+res;
    }
  };
  function eedatefmt(fmt,x){
    if(!isFinite(x))
      return Number.NaN;
      var tmp=0;
      var res="";
      var len=fmt.length;
    for(var ii=0;ii<len;ii++){
      if(fmt[ii]>31){
        res+=fmtstrings[fmt[ii]-32];
      }else{
        switch(fmt[ii]){
          case 2:res+=eemonth(x);
            break;
          case 3:tmp=eemonth(x);
            if(tmp<10){
              res+="0";
            };
            res+=tmp;
            break;
          case 4:res+=fmtmonthnamesshort[eemonth(x)-1];
            break;
          case 5:res+=fmtmonthnameslong[eemonth(x)-1];
            break;
          case 6:res+=eeday(x);
            break;
          case 7:tmp=eeday(x);
            if(tmp<10){
              res+="0";
            };
            res+=tmp;
            break;
          case 8:res+=fmtdaynamesshort[weekday(x,1)-1];
            break;
          case 9:res+=fmtdaynameslong[weekday(x,1)-1];
            break;
          case 10:tmp=year(x)%100;
            if(tmp<10){
              res+="0";
            };
            res+=tmp;
            break;
          case 11:res+=year(x);
            break;
          case 12:res+=hour(x);
            break;
          case 13:tmp=hour(x);
            if(tmp<10){
              res+="0";
            };
            res+=tmp;
            break;
          case 14:res+=hour(x)%12;
            break;
          case 15:tmp=hour(x)%12;
            if(tmp<10){
              res+="0";
            };
            res+=tmp;
            break;
          case 16:res+=minute(x);
            break;
          case 17:tmp=minute(x);
            if(tmp<10){
              res+="0";
            };
            res+=tmp;
            break;
          case 18:res+=second(x);
            break;
          case 19:tmp=second(x);
            if(tmp<10){
              res+="0";
            };
            res+=tmp;
            break;
          case 21:
          case 22:res+="AM/PM";
            break;
        };
      };
    };
    return res;
  };

  function eeisstring(v){
    switch(typeof v){
      case "string":return true;
      case "object":return v.constructor==String;default:return false;
    }
  };

  function leap_gregorian(year){
    return((year%4)==0)&&(!(((year%100)==0)&&((year%400)!=0)));
  }

  var GREGORIAN_EPOCH=1721425;

  function gregorian_to_jd(year,month,day){
    return(GREGORIAN_EPOCH-0)+(365*(year-1))+Math.floor((year-1)/4)+(-Math.floor((year-1)/100))+Math.floor((year-1)/400)+Math.floor((((367*month)-362)/12)+((month<=2)?0:(leap_gregorian(year)?-1:-2))+day);
  }

  function jd_to_gregorian(jd){
    var wjd,depoch,quadricent,dqc,cent,dcent,quad,dquad,yindex,year,yearday,leapadj;
    wjd=Math.floor(jd);
    depoch=wjd-GREGORIAN_EPOCH-1;
    quadricent=Math.floor(depoch/146097);
    dqc=mod(depoch,146097);
    cent=Math.floor(dqc/36524);
    dcent=mod(dqc,36524);
    quad=Math.floor(dcent/1461);
    dquad=mod(dcent,1461);
    yindex=Math.floor(dquad/365);
    year=(quadricent*400)+(cent*100)+(quad*4)+yindex;
    if(!((cent==4)||(yindex==4))){
      year++;
    }
    yearday=wjd-gregorian_to_jd(year,1,1);
    leapadj=((wjd<gregorian_to_jd(year,3,1))?0:(leap_gregorian(year)?1:2));
    var month=Math.floor((((yearday+leapadj)*12)+373)/367);
    var day=(wjd-gregorian_to_jd(year,month,1))+1;
    return new Array(year,month,day);
  }

  var r99=new RegExp("[a-zA-Z]+|[0-9]+|:","g");

  function eeparsedate_keep_all(str){
    var res=eeparsedate(str,3);
    if(isNaN(res)){
      return 1;
    }else{
      return res;
    }
  };

  function eeparsedate_keep_allV(str){
    if(str=="")return str;
    var res=eeparsedate(str,3);
    if(isNaN(res)){
      return str;
    }else{
      return res;
    }
  };

  function eeparsedate_keep_time(str){
    var res=eeparsedate(str,2);
    if(isNaN(res)){
      return 0;
    }else{
      return res;
    }
  };

  function eeparsedate_keep_timeV(str){
    if(str=="")return str;
    var res=eeparsedate(str,2);
    if(isNaN(res)){
      return str;
    }else{
      return res;
    }
  };

  function eeparsedate(str,keep){
    var year=1900;
    var month=1;
    var day=1;
    var hour=0;
    var minutes=0;
    var seconds=0;
    var ptr=0;
    var current=0;
    var lookahead;
    var parts;
    parts=str.match(r99);
    var len=0;
    if(str.length>0)len=parts.length;
    var time_parsed=false;
    if(len<1){
      return Number.NaN;
    }else{
      var cmd=1;
      if(len>1){
        lookahead=parts[1];
        if(lookahead==":"){
          cmd=2
        };
      };
      while(cmd>0&&ptr<len){
        if(cmd==1){
          current=parseFloat(parts[ptr]);
          if(isNaN(current))return Number.NaN;
          lookahead=parts[ptr+1];
          if(lookahead==":"){
            cmd=2;
          }else{
            if(current>1899){
              year=current;ptr++;
              current=parseFloat(parts[ptr++]);
              if(isNaN(current))return Number.NaN;
              month=current;
              current=parseFloat(parts[ptr++]);
              if(isNaN(current))return Number.NaN;
              day=current;cmd=3;
            }else if(current<32){
              if(eeisus){
                month=current;
                ptr++;
                current=parseFloat(parts[ptr++]);
                if(isNaN(current))return Number.NaN;
                if(current>1899){
                  year=current;
                }else{
                  day=current;
                  current=parseFloat(parts[ptr++]);
                  if(isNaN(current))return Number.NaN;
                  year=current;
                  if(year<30){
                    year+=2000;
                  }
                };
              }else{
                day=current;
                ptr++;
                current=parseFloat(parts[ptr++]);
                if(isNaN(current))return Number.NaN;
                if(current>1899){
                  year=current;
                  month=day;
                  day=1;
                }else{
                  month=current;
                  current=parseFloat(parts[ptr++]);
                  if(isNaN(current))return Number.NaN;
                  year=current;
                  if(year<30){
                    year+=2000;
                  }
                };
              }
              cmd=3;
            }else{
              return Number.NaN;
            };
          };
        }else if(cmd==2||cmd==3){
          if(cmd==3&&time_parsed){
            return Number.NaN;
          };
          time_parsed=true;
          current=parseFloat(parts[ptr++]);
          if(isNaN(current))return Number.NaN;
          hour=current;
          lookahead=parts[ptr++];
          if(lookahead==":"){
            current=parseFloat(parts[ptr++]);
            if(isNaN(current))return Number.NaN;
            minutes=current;
            current=parts[ptr];
            if(current==":"){
              ptr++;
              current=parseFloat(parts[ptr++]);
              if(isNaN(current))return Number.NaN;
              seconds=current;
            };
          };
          cmd=1;
        }
      }
    };
    switch(keep){
      case 1:return date(year,month,day);
      case 2:return time(hour,minutes,seconds);
      case 3:return date(year,month,day)+time(hour,minutes,seconds);
      default:return Number.NaN;
    }
  };

  function date(year,month,day){
    if(!isFinite(day)||!isFinite(month)||!isFinite(year))return Number.NaN;
    if(year<1900){
      year+=1900
    };
    if(year>9999)return Number.NaN;
    var adj_year=year;
    var adj_month=month;
    if(month>0){
      adj_year=year+Math.floor((month-1)/12);
      adj_month=((month-1)%12)+1;
    }else if(month<0){
      var tmp=Math.ceil((-month)/12);
      adj_year=year-tmp;
      adj_month=adj_month+tmp*12;
    }
    var res=Math.floor(gregorian_to_jd(adj_year,adj_month,day)-2415020);
    if(res>59)return res+1;
    return res;
  };

  function eeday(serial_number){
    if(!isFinite(serial_number))return Number.NaN;
    if(serial_number<1){
      return 0;
    }
    if(serial_number>60)serial_number--;
    var res=jd_to_gregorian(serial_number+2415020);
    return res[2];
  };

  function hour(serial_number){
    if(!isFinite(serial_number))return Number.NaN;
    var res=Math.floor((serial_number-Math.floor(serial_number))*86400+0.5);
    return Math.floor(res/3600);
  }

  function minute(serial_number){
    if(!isFinite(serial_number))return Number.NaN;
    var res=Math.floor((serial_number-Math.floor(serial_number))*86400+0.5);
    return Math.floor(res/60)%60;
  };

  function eemonth(serial_number){
    if(!isFinite(serial_number))return Number.NaN;
    if(serial_number<1){
      return 1;
    }
    if(serial_number>60)serial_number--;
    var res=jd_to_gregorian(serial_number+2415020);
    return res[1];
  };

  function second(serial_number){
    if(!isFinite(serial_number))return Number.NaN;
    var res=Math.floor((serial_number-Math.floor(serial_number))*86400+0.5);
    return res%60;
  };

  function time(hour,minute,second){
    if(!isFinite(second)||!isFinite(minute)||!isFinite(hour))return Number.NaN;
    return((second+minute*60+hour*3600)%86400)/86400;
  };

  function weekday(serial_number,return_type){
    if(!isFinite(return_type)||!isFinite(serial_number))return Number.NaN;
    if(return_type<1||return_type>3)return Number.NaN;
    var res=(serial_number+6)%7;
    switch(Math.floor(return_type)){
      case 1:return res+1;
      case 2:return(res+6)%7+1;
      case 3:return(res+6)%7;
    };
    return "hej";
  };

  function year(serial_number){
    if(!isFinite(serial_number))return Number.NaN;
    if(serial_number<1){
      return 1900;
    }if(serial_number>60)serial_number--;
    var res=jd_to_gregorian(serial_number+2415020);
    return res[0];
  };

  function fv(rate,nper,pmt,pv,type){
    if(!isFinite(type)||!isFinite(pv)||!isFinite(pmt)||!isFinite(nper)||!isFinite(rate))return Number.NaN;
    if(rate==0)return-(pv+nper*pmt);
    var type1=(type!=0)?1:0;
    var pvif=Math.pow(1+rate,nper);
    var fvifa=(Math.pow(1+rate,nper)-1)/rate;
    return(-((pv*pvif)+pmt*(1+rate*type1)*fvifa));
  };

  function pmt(rate,nper,pv,fv,type){
    var pvif=Math.pow(1+rate,nper);
    var fvifa=(Math.pow(1+rate,nper)-1)/rate;
    var type1=(type!=0)?1:0;
    return((-pv*pvif-fv)/((1+rate*type1)*fvifa));
  };

  // PARTE 2

  var op2, ob_tb, ob_url, selected_node_id;
  function ob_wk(os, url) {
    var ot = os.parentNode.nextSibling.firstChild.nextSibling;
    var lensrc = (os.src.length - 8);
    var s = os.src.substr(lensrc, 8);
    if (s == "inus.gif") {
        ot.style.display = "none";
        os.src = "imagens/plusik.gif";
    }
    if (s == "usik.gif") {
        ot.style.display = "block";
        os.src = "imagens/minus.gif";
      if (url != "") {
        var s = os.parentNode.nextSibling.firstChild.nextSibling.innerText;
        if (s != "Loading ...") {
            return;
        }
        ob_url = url;
        ob_tb = os;
        window.setTimeout("ob_tm()", 100);
      }
    }
  }

  function ob_tm() {
	  var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  	xmlhttp.open("GET", ob_url, false);
	  xmlhttp.send("");
  	ob_tb.parentNode.nextSibling.firstChild.nextSibling.outerHTML = xmlhttp.responseText;
  }

  function ob_ft(e) {
    if (e.tagName == "TABLE" && e.className == "ob_zz") {
        if (typeof op2 != "undefined") {
            op2.style.backgroundColor = "transparent";
            op2.style.border = "0px solid #999999";
            op2.style.margin = "1px";
        }
        e.style.backgroundColor = "ccddee";
        e.style.border = "1px solid #666666";
        e.style.margin = "0px";
        op2 = e;
        selected_node_id = e.firstChild.firstChild.childNodes[1].id;
    }
    else {
        ob_ft(e.parentNode);
    }
  }

  function ob_os(e){
    var os = e.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.firstChild.firstChild;
    if (os != null) {
      if ((typeof os != "undefined") && (os.tagName == "IMG")) {
        var lensrc = (os.src.length - 8);
        var s = os.src.substr(lensrc, 8);
        if ((s == "inus.gif") || (s == "usik.gif")) {
            e.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.firstChild.firstChild.click();
        }
      }else {
        ob_os(e.parentNode);
      }
    }
  }
