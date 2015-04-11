<?php
/* This code is developed by Dr. Dhaval Patel (drdhaval2785@gmail.com) of www.sanskritworld.in and Ms. Sivakumari Katuri.
  * Layout assistance by Mr Marcis Gasuns.
  * Available under GNU licence.
  * Version 1.1 date 17/11/2013
  * The latest source code is available at https://github.com/drdhaval2785/sanskrit
  * For setup, copy and paste sandhi.html, sandhi.php, function.php, mystyle.css, slp-dev.php and dev-slp.php to your localhost and server and run sandhi.html.
  * sandhi.html is the frontend for the code.
  * function.php stores the frequently used functions in this code (The description on how to use the code is there in function.php.
  * slp-dev.php is for converting SLP1 data to Devanagari. dev-slp.php is for converting Devanagari data to SLP1.
  * Mystyle.css is stylesheet where you can change your preferences.
  */

/* Defining grammatical arrays */
$shiv=array("a","i","u","-R","f","x","-k","e","o","-N","E","O","-c","h","y","v","r","-w","l","-R","Y","m","N","R","n","-m","J","B","-Y","G","Q","D","-z","j","b","g","q","d","-S","K","P","C","W","T","c","w","t","-v","k","p","-y","S","z","s","-r","h","-l");
$kantha = array("a","A","k","K","g","G","N","h","H"); // kanThya letters
$talu = array("i","I","c","C","j","J","Y","y","S"); // tAlavya letters
$murdha = array("f","F","w","W","q","Q","R","r","z"); // mUrdhanya letters
$danta = array("x","X","t","T","d","D","n","l","s"); // dantavya letters
$oshtha = array("u","U","p","P","b","B","m"); // oSThya letters
$nasika = array("N","Y","R","n","m","M"); // anunAsika letters
$kanthatalu = array ("e","E"); // kanThatAlu letters
$kanthoshtha = array("o","O"); // kanThauSThya letters
$dantoshtha = array("v"); // dantauSThya letters
$sparsha = array("k","K","g","G","N","c","C","j","J","Y","w","W","q","Q","R","t","T","d","D","n","p","P","b","B","m"); // sparza letters
$sprushta = array("k","K","g","G","N","c","C","j","J","Y","w","W","q","Q","R","t","T","d","D","n","p","P","b","B","m",); // spRSTa letters
$ishatsprushta = array("y","r","l","v"); // iSatspRSTa letters
$vivruta = array("S","z","s","h","a","A","i","I","u","U","f","F","x","X","e","E","o","O"); // vivRta letters
$samvruta = array("a"); // saMvRta letter
$vivara = array("k","K","c","C","w","W","t","T","p","P","H","S","z","s"); // vivAra letters
$shvasa = array("k","K","c","C","w","W","t","T","p","P","H","S","z","s"); // zvAsa letters
$aghosha = array("k","K","c","C","w","W","t","T","p","P","H","S","z","s"); // aghoSa letters
$samvara = array("g","G","N","j","J","Y","q","Q","R","d","D","n","b","B","m","y","r","l","v","h"); // saMvAra letters
$nada = array("g","G","N","j","J","Y","q","Q","R","d","D","n","b","B","m","y","r","l","v","h"); // nAda letters
$ghosha = array("g","G","N","j","J","Y","q","Q","R","d","D","n","b","B","m","y","r","l","v","h"); // ghoSa letters
$alpaprana = array("k","g","c","j","w","q","t","d","p","b","y","r","l","v"); // alpaprANa letters
$mahaprana = array("K","G","C","J","W","Q","T","D","P","B","S","z","s","h"); // mahAprANa letters
$ru = array("f","F","x","X"); // R, RR, lR and lRR
$ac = array("a","A","i","I","u","U","f","F","x","X","e","o","E","O",); // vowels - 'ac' letters
$hl = array("k","K","g","G","N","c","C","j","J","Y","w","W","q","Q","R","t","T","d","D","n","p","P","b","B","m","y","r","l","v","S","z","s","h"); // consonants - hal letters
$al = array("a","A","i","I","u","U","f","F","x","X","e","o","E","O","k","K","g","G","N","c","C","j","J","Y","w","W","q","Q","R","t","T","d","D","n","p","P","b","B","m","y","r","l","v","S","z","s","h","M","H");
$e = array("e","E","o","O"); // 'ec' letters
$dirgha = array("A","I","U","F","X","e","E","o","O"); // dIrgha letters
$hrasva = array("a","i","u","f","x"); // hrasva letters
$guna = array ("e","o"); // guNa letters
$vruddhi = array("E","O"); // vRddhi letters
$aa = array("a","A"); // a, A
$upasarga = array("pra","prati","api","parA","apa","upa","pari","anu","ava","vi","saM","su","ati","ni","nir","ut","aDi","dur","aBi","A"); // upasargas
$upasarga_combinations = array("ati,atinis,atipra,ativi,ativyA,atisam,atyati,atyaBi,atyA,atyud,atyupa,aDi,aDini,aDinis,aDivi,aDyava,aDyA,aDyupa,anu,anuni,anunis,anuparA,anupari,anuparyA,anupra,anuprati,anuvi,anuvyava,anuvyA,anusam,anusampra,anUd,anvapa,anvava,anvA,apa,apani,apanis,apaparA,apaparyA,apapra,apavyA,apA,apAti,api,apipari,apod,apyati,aBi,aBini,aBinis,aBiparA,aBipari,aBiparyA,aBipra,aBivi,aBivyA,aBisamA,aBisam,aByati,aByaDi,aByanu,aByapa,aByava,aByA,aByudA,aByud,aByupa,aByupA,aByupAva,ava,avani,avA,A,utpra,udava,udA,ud,udvi,unni,upa,upani,upanis,upanyA,upapari,upaparyA,upapra,upavi,upavyA,upasaṁni,upasamA,upasam,upA,upAti,upAva,upodA,upod,upopa,duHsam,duranu,durava,durA,durud,durupa,durni,duzpari,duzpra,dus,ni,nipra,nirati,niraDi,niranu,nirapa,niraBi,niraBi,nirava,nirupA,nirvi,nivyA,nizpra,nisu,nis,nyA,parA,pari,parini,parinis,paripra,parivi,parivyA,parisam,paryaDi,paryanu,paryava,paryA,paryud,paryupa,pra,praNi,prati,pratini,pratinis,pratiparA,pratipari,pratipra,prativi,prativyA,pratisam,pratyaDi,pratyanu,pratyapa,pratyapi,pratyaBi,pratyava,pratyA,pratyudA,pratyud,pratyupa,pratyupA,pravi,pravyA,prasam,prA,prADi,prod,vi,vini,vinis,viparA,vipari,viparyA,vipra,viprati,visam,vyati,vyanu,vyanvA,vyapa,vyapA,vyaBi,vyava,vyA,vyud,vyupa,saṁvi,saṁvyava,saṁvyA,sanni,samati,samaDi,samanu,samanuvi,samanvA,samapa,samapi,samaBi,samaBivyA,samaBisam,samaBisampra,samaByava,samaByA,samaByud,samava,samava,samavA,samA,samudA,samud,samupa,samupA,sam,samparA,sampari,sampra,samprati,samprA,samprod,sampvari,su,supari,suvi,susamA,svanu,svaBi,svaByA,");
$verbs_ru = array("fkz","fc","fC","fj","fYj","fR","ft","fd","fD","fn","fP","fBukz","fmP","fS","fz","fh"); // verbs starging with R.
$verbs_changed = array("kz","c","C","j","Yj","R","t","d","D","n","P","Bukz","mP","S","z","h"); // verbs with removal of R.
$ku = array("k","K","g","G","N"); // kavarga letters
$cu = array("c","C","j","J","Y"); // cavarga letters
$Tu = array("w","W","q","Q","R"); // Tavarga letters 
$tu = array("t","T","d","D","n"); // tavarga letters
$pu = array("p","P","b","B","m"); // pavarga letters 
$noco = array("ac","ic","ec","Ec"); // array where coH kuH won't apply.
$antastha = array("y","r","l","v"); // antaHstha letters
$ushma = array("S","z","s","h"); // uSma letters
$iN = array("i","I","u","U"); // 'iN' pratyAhAra
foreach ($hl as $value){ $hlplus[] = $value."+"; } // defining $hlplus
$iN1 = array("i","I","u","U","f","F","x","X","e","o","E","O","h","y","v","r","l","k","K","g","G","N"); // iN and kavarga combined.
$iN2 = array("i","I","u","U","f","F","x","X","e","o","E","O","h","y","v","r","l",); // iN
$pratya =  array("aR","ak","ik","uk","eN","ac","ic","ec","Ec","aw","aR","iR","yaR","am","yam","Yam","Nam","yaY","Jaz","Baz","aS","haS","vaS","JaS","jaS","vaS","Cav","yay","may","Jay","Kay","cay","yar","Jar","Kar","car","Sar","al","hal","val","ral","Jal","Sal"); // valid pratyAhAras according to pANinIya vyAkaraNa
$sup = array("su!","Ow","jas","am","O","Sas","wA","ByAm","Bis","Ne","ByAm","Byas","Nasi!","ByAm","Byas","Nas","os","Am","Ni","os","sup"); // sup pratyayas
$acsup = array("O","jas","am","Ow","Sas","wA","Ne","Nasi!","Nas","os","Am","Ni","os"); // sup pratyayas which start with a vowel
$hlsup = array("su!","ByAm","Bis","Byas","sup"); // sup pratyayas which start with a consonant
$prathama = array("su!","O","jas","am","Ow","Sas"); // sup pratyayas of first two vibhaktis
$sarvanama = array("sarva","viSva","uBa","uBaya","atara","atama","anya","anyatara","itara","tvat","tva","nema","sima","tyad","tad","yad","etad","idam","adas","eka","dvi","yuzmad","asmad","Bavat","kim","idakam","etara"); // sarvanAmas
$zasadi = array("Sas","wA","ByAm","Bis","Ne","ByAm","Byas","Nasi!","ByAm","Byas","Nas","os","Am","Ni","os","sup"); // sup pratyayas, starting from zas
$sarvanamasthana = array("su!","O","jas","am","Ow","Si"); // sarvanAmasthAna pratyayas
$yacibham = array("Sas","wA","Ne","Nasi!","Nas","os","Am","os","Ni"); // sup pratyayas which mandate bha saJjJA subject to some conditions
$tRtIyAdiSvaci = array("wA","Ne","Nasi!","Nas","os","Am","Ni","os"); // sup pratyayas tRtIyA vibhakti onwards and starting with vowel
$tRtIyAdi = array("wA","ByAm","Bis","Ne","ByAm","Byas","Nasi!","ByAm","Byas","Nas","os","Am","Ni","os","sup"); // sup pratyayas tRtIyA vibhakti onwards
$eksup = array("su!","am","wA","Ne","Nasi!","Nas","Ni",); // ekavacana sup pratyayas
$dvisup = array("O","Ow","ByAm","ByAm","ByAm","os","os",); // dvivacana sup pratyayas
$bahusup = array("jas","Sas","Bis","Byas","Byas","Am","sup"); // bahuvacana sup pratyayas
$diksamAsa = array("uttarapUrvA","dakziRapUrvA","uttarapaScimA","dakziRapaScimA"); // diksamAsa array
$sarvanamastri = array("sarvA","viSvA","uBA","uBayA","qatarA","qatamA","anyA","anyatarA","itarA","tvA","nemA","simA","pUrvA","parA","avarA","dakziRA","uttarA","aparA","aDarA","svA","antarA","ekA","dvA","kA","idA"); // sarvanAmas feminine gender
$svasrAdi = array("svasf","tisf","catasf","nanAndf","duhitf","yAtf","mAtf"); // svasrAdi gaNa
$tyadadi = array("dvi","tyad","tad","yad","etad","idam","adas","eka","idakam"); // tyadAdi gaNa
$acdir = array("A","A","I","I","U","U","F","F","F","F","e","o","E","O",); // dIrgha of vowels
$ak1 = array("a","a","A","A","i","i","I","I","u","u","U","U","f","f","F","F","f","f","F","F","x","x","X","X","x","x","X","X");
$ak2 = array("a","A","a","A","i","I","i","I","u","U","u","U","f","F","f","F","x","X","x","X","f","F","f","F","x","X","x","X");
$ik = array("i","I","u","U","f","F","x","X"); // ik pratyAhAra.
$ikyan = array("y","y","v","v","ar","Ar","ar","Ar"); // yaN replacements of ik pratyAhAra.
// cleanup of $avyaya pending.
$avyaya = array("svar","antar","prAtar","punar","sanutar","uccEs","nIcEs","SanEs","fDak","fte","yugapat","ArAt","antikAt","pfTak","hyas","svas","divA","rAtrO","sAyam","ciram","manAk","Izat","SaSvat","jozam","tUzRIm","bahis","aDas","avas","samayA","nikazA","svayam","mfzA","naktam","naY","hetO","he","hE","idDA","adDA","sAmi","antodAttAH","vat","bata","sanat","sanAt","tiras","AdyudAttAH","antarA","antareRa","mak","jyok","yok","nak","kam","Sam","sanA","sahasA","SradDA","alam","svaDA","vazaw","vinA","mAnA","svasti","anyat","asti","upAMSu","kzamA","vihAyasA","dozA","mfzA","miTyA","muDA","purA","miTo","miTas","prAyas","muhus","pravAhukam","pravAhikA","Aryahalam","aBIkzRam","sAkam","sArDam","namas","hiruk","Dik","aTa","am","Am","pratAm","praSAn","pratAn","mA","mAN","ham","vA","ha","aha","eva","evam","nUnam","SaSvat","yugapat","BUyas","kUpat","kuvit","net","cet","caR","kaccit","yatra","naha","hanta","mAkiH","mAkim","nakiH","nakim","mAN","naY","yAvat","tAvat","tve","dvE","tvE","rE","SrOzaw","vOzaw","svAhA","svaDA","vazaw","tum","taTAhi","Kalu","kila","aTo","aTa","suzWu","sma","Adaha","avadattam","ahaMyuH","astikzIrA","paSu","Sukam","yaTAkaTAcam","pAw","pyAw","aNga","hE","he","BoH","aye","dya","vizu","ekapade","yut","AtaH","am","Am","ca","vA","ha","aha","eva","evam","nUnam","SaSvat","yugapat","sUpat","kUpat","kuvit","net","cet","caR","kaccit","yatra","naha","hanta","mAkim","nakim","mAN","mANo NakAro viSezaRArTaH, mANi luN iti","iha na Bavati, mA Bavatu, ma Bavizyati","naY","yAvat","tAvat","tvA","tvE","dvE","rE","SrOzaw","vOzaw","svAhA","vazaw","svaDA","om","kila","taTA","aTa","su","sma","asmi","am","tak","uY","ukaY","velAyAm","mAtrAyAm","yaTA","yat","yam","tat","kim","purA","adDA","Dik","hAhA","he","hE","pyAw","pAw","TAw","aho","utAho","ho","tum","taTAhi","Kalu","Am","Aho","aTo","nanu","manye","miTyA","asi","brUhi","tu","nu","iti","iva","vat","cana","bata","iha","Sam","kam","anukam","nahikam","hikam","sukam","satyam","ftam","SradDA","idDA","muDA","no cet","na cet","nahi","jAtu","kaTam","kutaH","kutra","ava","anu","hAhO","hEhA","IhA","Ahosvit","Cambaw","Kam","dizwyA","paSu","vaw","saha","Anuzak","aNga","Paw","tAjak","aye","are","cawu","bAw","kum","Kum","Gum","hum","AIm","SIm","sIm","vE");
// For gaNapATha, we take gaNapATha taken after SK as base. Sometimes other words are supplied from gaNaratnamahodadhi of vardhamAna.
$TitprAtipadika = array("nada","Baza","gara","plava","cara","tara","cora","grAha","sUda","deva","moda"); // this list is carved out of gaNapATha.
$TiDDhA=array("dvayasa","daDna","mAtra","taya","AdfSa","itvara","naSvara","sftvara","Itvara","etvara","taruRa","taluna","cara","puraHsara","agrataHsara","agresara","purassara","pUrvasara","kara","dAsa","dASa","Palguna","Sakraga","sAmaga","surApa","SIDupa","jAyAhan","patihan","jAyAGna","patiGna","hastiGna","hastihan","kapAwahan","kapAwaGna","pARiGa","rAjaGa","tAqaGa","rAja","saKa","Aha","mahAha","paramAha","dIrghAha","gava","orasa","Anasa","ASma","Ayasa","sarasa","grAmatakza","kOwatakza","atiSva","AkarzaSva","PalakaSva","uttarasakTa","mftasakTa","pUrvasakTa","PalakasakTa","nAva","KAra","Jjala","surAzwrabrahma","avantibrahma","kubrahma","mahadbrahma","SrARika","mAMsOdanika","kaMsika","kArSApaRika","pratika","mahiza","vArkeRya","sOmya","sAyantana","cirantana","prAhRetana","pragetana","dozAtana","divAtana","pUrvAhRetana","aparAhRetana","SAmIla","stra","gAyana","daSa","viMSa","triMSa","paYcama","saptama","azwama","navama","daSama","zazWa","katiTa","katipayaTa","bahutiTa","pUgatiTa","gaRatiTa","saNGatiTa","titama","Witama","samamaya","viSamamaya","maya","ISvara","SaRQa",);
$aJwords=array("Otsa","OdapAna","vEkara","vEnoda","mAhAnada","mAhAnasa","mAhAprARa","tAruRa","tAluna","DEnava","pArTiva","pANkta","jAgata","tErzwupa","Anuzwupa","jAnapada","BArata","OSInara","grEzma","pElava","kOla","BAllakIya","rATAntara","mADyandina","bfrhat","mfhat","sAttvantava","kOrava","pAYcAla","EndrAvasAna","OzRih","kAkuB","sOvarRa","dEva","grEzma","bEda","Orva","kASyapa","kOSika","BAradvAja","Opamanyava","kElAlapa","kEdarBa","vESvAnara","ArwizeRa","ArtaBAga","hAryaSva","prEyaka","Apastamba","kOcavAra","SAradvat","SOnaka","DEnava","gOpavana","SEgrava","bEndava","BAjana","ASvAvatAna","SyAmAka","SyAmAka","SyAparRa","hArita","kEndAsa","vAhyaska","ArkalUza","vADyoza","vEzRuvfdDa","prAtiboDa","rATAntara","rATItara","gAvizWira","nEzAda","mAWara","mArda","pOnarBava","pOtra","dOhitra","nAnAndra","pArastrya","pAraSava","mAhAkula","mAnuza","hAridra","mAhArajana","dvEpa","vEyAGra","kApota","mAyUra","tEttira","KARqika","vAqava","kzOdraka","mAlava","sEna","BEkzuka","SOka","OlUka","SvAna","yOga","Ahana","vAratra","hAlabanDa","kAWaka","kAlApaka","CAndogya","OkTikya","ATarvaRa","mOdaka","pEppalAdaka","dErGavastra","kApilavastra","dAtta","gOpta","sANkala","pOzkala","Odvapa","Oqupa","Otpuwa","kOmBa","vEDAna","sOdakza","sOdatta","sOBUta","sOnetra","sOpiNgala","sEkata","pOtIka","pOlasa","kOlAsa","pAlASa","nEveSa","gAveza","gAmBIra","Etara","Sarma","aha","loma","vema","vAruRa","bAhula","sAdyoja","ABizikta","gOBft","rAjaBft","gArha","BArta","BAlla","mAla","vfta","dAttAmitra","vEDUmAgna","kAkanda","mAkanda","maRicara","jAruza","pOrvamadra","Aparamadra","SEvapura","mARqavapura","pOrvArDa","dAkziRArDa","OttarArDa","Apakara","sEnDava","vArRava","gAnDAra","maDumat","kAmboja","kASmIra","sAlva","kEzkinDa","gAdika","Orasa","darat","tAkzaSila","vAtsodDaraRa","kOmedura","kARqavAraRa","grAmaRI","sArAlaka","kAMsa","kEnnara","sAMkucita","sEMhakozWa","kArRakozWa","bArbara","AvasAna","ASvaraTa","OzwraraTa","gArdaBaraTa","ASva","Ozwra","gArdaBa","ADvarya","pArizada","rAjata","lOha","sEsa","sEsaka","Odumbara","nEladArava","rOhitaka","bEBItaka","pEtadAsa","tEvradArava","trEkaRwaka","kARwakAra","dADitTa","kApitTa","mAhitTa","pAlASa","KAdira","SEMSipa","spAndana","kArIra","SErIza","yAvAsa","vEkaNkata","vARDra","vAratra","SOrpa","sArvaBOma","pArTiva","kOmAra","kESora","OdgAtra","Onnetra","prAtihartra","rATagaRaka","pAkzigaRaka","sOzWava","dOzWava","ADvaryava","vADava","sOBaga","vyAvakroSa","vyAvaleKa","vyAvahAsa","vyAvacora","vyAvacarca",);
$aNwords=array("lAva","dAya","kAra","Aya","pAra","ASvapata","SAtapata","DAnapata","gARapata","rAzwrapata","kOlapata","gArhapata","DAnyapata","pASupata","DArmapata","sABApata","prARapata","kzEtrapata","SEva","prOzWa","prOzWika","cARqa","jAmBa","mOna","sAnDa","BOra","kOWAra","AnaBimlAna","kAkutsTa","kAhoqa","lEKa","rODa","KAYjana","kOhaqa","pEzwa","hEhaya","KAYjAra","KAYjAla","sOrohika","pArRa","kAhUza","pArila","vAtaRqa","tArRa","kArRa","kzErahrada","jAlahrada","pArizika","jAwilika","gOPilika","bADirikA","mAYjIraka","vArzRika","rEKa","AleKana","vESravaRa","rAvaRa","vArtanAkza","pEwaka","pEwAka","tArkzAka","nABAka","OrRanABa","jratkArava","Otkzipa","rOhitika","AryaSveta","sOpizwa","KArjUrakarRa","mAsUrakarRa","tURakarRa","mAyUrakarRa","KAqaraka","takza","ArwizeRa","gANga","vEpASa","yAska","lAhya","drOGa","AyaHsTURa","BAlandana","vErUpAkza","BOma","Ela","sApatna","trEveRa","trEvaRa","ErAvata","vEtasta","nArmada","SEkzita","cEntita","yAmuna","vAsizWa","vESvAmitra","SvAPalka","rAnDasa","vAsudeva","AnirudDa","sAhadeva","nAkula","kAnIna","vEkarRa","SONga","CAgala","pEla","mARwuka","ANga","vANga","sOhma","mAgaDa","kAliNga","sOramasa","kAzAya","mAYjizWa","kOsumBa","pOza","mAGa","kOmAra","SArAva","mAllika","kArpara","sTARwila","GArta","BrAzwra","kAlaSa","kOmBa","Aditya","bArhaspatya","prAjApatya","Endra","kAya","vEzRava","mAhendra","kAka","bAka","guRagrAma","karaRagrAma","tattvagrAma","SabdagrAma","indriyagrAma","BEkza","gArBiRa","SEba","Ozwra","pANkta","pragATa","AnuzwuBa","jAgata","gAyatra","trEzwuBa","sOBadra","gOrimitra","AhimAla","syAndanASva","CAndasa","vEyAkaraRa","nErukta","nEmitta","mOhUrta","OtpAta","Odumbara","bAlbaja","pArvata","sAhasra","kOSAmba","ArjunAva","SudizWa","vEdiSa","hEmavata","sOvAstava","vESaNka","cAkzuza","SrAvaRa","Opanizada","dArzada","OlUKala","cAtura","cAturdaSa","pAlada","pArizada","yAkflloma","rOmaka","kAlakUwa","pAwaccara","vAhIka","kAlakIwa","mAlakIwa","kAmalakIwa","kAmalaBida","gOzWa","kAmalakIra","bAhukIta","nEtaka","pAriKa","SOrasena","gOmata","OdayAna","dAkza","plAkza","mAhaka","pAnnAgAra","kOrava","yOganDara","EkzvAka","mAhizika","kAcCa","sEnDava","vArRava","gAnDAra","mADumata","kAmboja","kASmIra","sAlva","kOrava","rANkava","ARava","KARqa","dvEpa","AnUpa","AjavAha","vEjApaka","kOlUna","pArvata","yOzmAka","AsmAka","tAvaka","mAmaka","sAndivela","sAMDya","grEzma","SESira","tEza","pOza","sAnDivela","sAnDya","AmAvAsya","trAyodaSa","cAturdaSa","pAYcadaSa","pOrRamasa","prAtipada","sMavatsara","SArada","vArza","hEmana","vAsanta","sEnDava","Apakara","AmAvAsya","AmAvasya","vAtsaSAla","ABihjita","ASvayuja","SAtaBizaja","rOhiRa","mArgaSIrza","srOGna","mATura");
$dade = array("dah","dAh","dih","duh","dfh","drAh",);
$ekaco = array("gaD","gaB","gaQ","gAQ","gAD","gAQ","guD","guQ","gUQ","gfD","gfQ","graB","graQ","griQ","glaQ","qaQ","qiQ","quQ","daG","daG","daG","daG","diG","duG","duG","dfG","dfG","dfG","drAG","drAG","druG","druh","baD","baQ","bAQ","bAD","bAQ","bIB","buD","bfQ","beQ","braQ","druQ","gardaB"); // list of verbs satisfying the conditions.
$ekaco1 = array("GaD","GaB","GaQ","GAQ","GAD","GAQ","GuD","GuQ","GUQ","GfD","GfQ","GraB","GraQ","GriQ","GlaQ","QaQ","QiQ","QuQ","DaG","DaG","DaG","DaG","DiG","DuG","DuG","DfG","DfG","DfG","DrAG","DrAG","DruG","DruQ","BaD","BaQ","BAQ","BAD","BAQ","BIB","BuD","BfQ","BeQ","BraQ","DruQ","garDaB"); // list of verbs after application of this sUtra.
// karmaNyaN is difficult to do. 
$Titpratyaya = array("lyuw",); // Only lyuw is pending for scrutiny. Rest all are included in TiDDhA.
$ajAdi = array("aja","eqaka","aSva","cawaka","mUzika","bAla","vatsa","hoQa","manda","bilAta","uzRih","devaviS","jyezWa","kanizWa","maDyama","kokila","pUrvApahARa","aparAhARa","triPala","tryanIka","paraBfta","bAla","amba","hoqa","mugDa","daMzwra","saMprahARa","pUrvApahAyaRa","aparApahAyaRa","samprahAyaRa","saMprahAyaRa","diS","dfS","kzuD","vAc","gir","balAka","vaqava");
$bahvAdi=array("bahu","padDati","aNkati","aYcati","aMhati","vaMhati","Sakawi","Sakti","SAri","vAri","gati","ahi","kapi","muni","yazwi","caRqa","arAla","kamala","kfpARa","vikawa","viSAla","viSaNkawa","Baruja","Dvaja","kalyARa","udAra","purARa","ahan","cAndraBAga","candraBAga",);
$svAGga=array("keSa","kaca","muKa","stana","naKa","RaKa","nAsika");
$kroDAdi=array("kalyARakroqa","kalyARaKura","kalyARoKa","kalyARabAla","kalyARaSaPa","kalyARaguda","kalyARaGoRa","kalyARanaKa","kalyARamuKa","suBaga","sugala","pfTujaGana","mahAlalAwa","kalyARakroqA","kalyARAKurA","kalyARoKA","kalyARabAlA","kalyARaSaPA","kalyARagudA","kalyARaGoRA","kalyARanaKA","kalyARamuKA","kroqAdirAkftigaRaH","suBagA","sugalA","pfTujaGanA","mahAlalAwA","BAvyaBAlA","BavyaBAla","SrImaduKA","SrImaduKa","kalyARagoKa","kalyANagoKA","pavitraSaPa","pavitraSaPA","mfRAlaBujA","mfRAlaBuja","kalyARaguda","kalyARagudA","unnataGoRa","unnataGoRA","kisalayakarA","kisalayakara","suraNga","suraNga");
$bahvacasvAGga=array("jaGana");
$aupagava=array("Opagava","kaWa","kalApa","bahvfca",);
$Sidwords=array("dvimUrDa","trimUrDa","SatapaTika","zazwipaTika","pfTiva","sAmiDenya","paTika","kusidika","daSEkAdaSika","pOroqASika","Bastrika","Barawika","BaraRika","SIrzaBArika","SIrzeBArika","aMsaBArika","aMseBArika","vivaDika","vIvaDika","parpika","aSvika","aSvatTika","raTika","jAlika","nyAsika","vyAlika","pAdika","paYcika","padika","SvagaRika","kiSarika","naradika","naladika","sumaNgalika","tagarika","gugguluka","uSIrika","haridrika","haridrAyaRIka","SalAluka","kAsUtara","gORItara","Akarzika","AvasaTika","DAtra","dAtra","Sastra","netra","yotra","yoktra","stotra","totra","setra","sektra","meQra","patra","nadDa","potra","kApiSyAyana","karbara","karvara","garbara","garbara","nizadvara","Citvara","Catvara","nartaka","Kanaka","rajaka"); // kurvAdi pending
$gaurAdi=array("gOra","matsya","manuzya","SfNga","haya","gavaya","mukaya","fzya","puwa","druRa","droRa","hariRa","kaRa","pawara","ukaRa","Amalaka","kuvala","badara","bamba","tarkAra","SarkAra","puzkara","SiKaRqa","suzama","salanda","gaquja","Ananda","sfpAwa","sfgeWa","AQaka","Sazkula","sUrma","suba","sUrya","pUza","mUza","GAtaka","sakalUka","sallaka","mAlaka","mAlata","sAlvaka","vetasa","atasa","pfsa","maWa","Ceda","Svan","takzan","anaquh","ezaRa","deha","kAkAdana","gavAdana","tejana","rajana","lavaRa","pAna","meDa","gOtama","AyasTURa","BOri","BOliki","BOliNgi","OdgAhamAni","AliNgi","ApicCika","Arawa","wowa","nawa","nAwa","malAwa","SAtana","pAtana","savana","Astarana","ADikaraRa","eta","aDikAra","AgrahAyaRI","pratyavarohiRI","sevana","sumaNgalAt saMjYAyAm","sundara","maRqala","piRqa","viwaka","kurda","gUrda","pawa","pARwa","loPARwa","kandara","kandala","bfhat","mahat","sODarma","rohiRI nakzatre","revatI nakzatre","vikala","nizPala","puzkala","kawa","pippala","harItaka","koSAtaka","Sama","karIra","pfTiva","krozwra","mAtAmaha","pitAmaha"); // removed taruRa and taluna, because they have a separate vArtika mandating GIp and not GIz.
$itmanuSyajAti=array("dAkzi","Odameyi");
$zArGgaravAdi=array("SArNgarava","kApawava","gOgulava","brAhmaRa","gOtama","kAmaRqaleya","brAhamakfteya","Aniceya","AniDeya","ASokeya","vAtsyAyana","mOYjAyana","kEkaseya","kAvya","SEvya","ehi","paryehi","ASmaraTya","OdapAna ","arAla","caRqAla","vataRqa","jAti","bEda");
$kvanipwords=array("prAtaritvan","DIvan","pIvan","suDIvan","supIvan","BUridAvan","GftapAvan","SIvan","kruSvan","ruhvan","jitvan","kzitvan","sftvan","Dftvan","dfSvan");
$Gvanipwords=array("sutvan","yajvan"); // also hrasva-tvan combination.
$vanipwords=array("DIvan","pIvan","suDIvan","supIvan","snAvan","nadvan","padvan","arvan","parvan","Sakvan","BUridAvan","GftapAvan","vijAvan","agregAvan");
$vanoracawords= array_merge($kvanipwords,$Gvanipwords,$vanipwords);
$tiG=array("tip","tas","Ji","sip","Tas","Ta","mip","vas","mas","ta","AtAm","Ja","TAs","ATAm","Dvam","iw","vahi","mahiN");
$tis=array("tip","tas","Ji","sip","Tas","Ta","mip","vas","mas",);
$taG=array("ta","AtAm","Ja","TAs","ATAm","Dvam","iw","vahi","mahiN");
$tiGprathama=array("tip","tas","Ji","ta","AtAm","Ja",);
$tiGmadhyama=array("sip","Tas","Ta","TAs","ATAm","Dvam",);
$tiGuttama=array("mip","vas","mas","iw","vahi","mahiN");
$tiG1=array("te","ite","ante","se","iTe","Dve","e","vahe","mahe","ti","tas","anti","si","Tas","Ta","mi","vas","mas","Ate","ATe","ta","itAm","anta","TAs","iTAm","Dvam","i","vahi","mahi","t","ant","s","m","tAm","tam","ta","am","AtAm","ATAm","va","ma","Ral","Ra","atus","us","Tal","Ta","aTus","a","va","ma","e","Ate","ire","se","ATe","Dve","e","vahe","mahe","O","ata"); // removal of anubandhas.
$shitpratyaya=array("Sap","Syan","Snu","Sa","Snam","SnA","SAyac","SAnac");
$Nitpratyaya=array("");
$Jitpratyaya=array("");
$navibhaktau=array("su!","jas","am","Sas","ByAm","Bis","Byas","os","Am","Ni","tas","Tas","vas","mas","AtAm","TAs","ATAm","Dvam","jus","tAt");
$inbetweenpratyaya=array("ap","yan");
$inbetweeenreplace=array("a","ya");
// Ashtadhyayi data, to enable separation of display from grammar context.
$ASdata=array("1.1.1:संज्ञा:वृद्धिरादैच्","1.1.2:संज्ञा:अदेङ् गुणः","1.1.3:परिभाषा:इको गुणवृद्धी","1.1.4::न धातुलोप आर्धधातुके","1.1.5::ग्क्ङिति च","1.1.6::दीधीवेवीटाम्","1.1.7:संज्ञा:हलोऽनन्तराः संयोगः","1.1.8:संज्ञा:मुखनासिकावचनोऽनुनासिकः","1.1.9:संज्ञा:तुल्यास्यप्रयत्नं सवर्णम्","1.1.10:संज्ञा:नाज्झलौ","1.1.11:संज्ञा:ईदूदेद्द्विवचनं प्रगृह्यम्","1.1.12:संज्ञा:अदसो मात्","1.1.13:संज्ञा:शे","1.1.14:संज्ञा:निपात एकाजनाङ्","1.1.15:संज्ञा:ओत्","1.1.16:संज्ञा:सम्बुद्धौ शाकल्यस्येतावनार्षे","1.1.17:संज्ञा:उञः","1.1.18:संज्ञा:ऊँ","1.1.19:संज्ञा:ईदूतौ च सप्तम्यर्थे","1.1.20:संज्ञा:दाधा घ्वदाप्","1.1.21:परिभाषा:आद्यन्तवदेकस्मिन्","1.1.22:संज्ञा:तरप्तमपौ घः","1.1.23:संज्ञा:बहुगणवतुडति संख्या","1.1.24:संज्ञा:ष्णान्ता षट्","1.1.25:संज्ञा:डति च","1.1.26:संज्ञा:क्तक्तवतू निष्ठा","1.1.27:संज्ञा:सर्वादीनि सर्वनामानि","1.1.28:संज्ञा:विभाषा दिक्समासे बहुव्रीहौ","1.1.29:संज्ञा:न बहुव्रीहौ","1.1.30:संज्ञा:तृतीयासमासे","1.1.31:संज्ञा:द्वन्द्वे च","1.1.32:संज्ञा:विभाषा जसि","1.1.33:संज्ञा:प्रथमचरमतयाल्पार्धकतिपयनेमाश्च","1.1.34:संज्ञा:पूर्वपरावरदक्षिणोत्तरापराधराणि","1.1.35:संज्ञा:स्वमज्ञातिधनाख्यायाम्","1.1.36:संज्ञा:अन्तरं बहिर्योगोपसंव्यानयोः","1.1.37:संज्ञा:स्वरादिनिपातमव्ययम्","1.1.38:संज्ञा:तद्धितश्चासर्वविभक्तिः","1.1.39:संज्ञा:कृन्मेजन्तः","1.1.40:संज्ञा:क्त्वातोसुन्कसुनः","1.1.41:संज्ञा:अव्ययीभावश्च","1.1.42:संज्ञा:शि सर्वनामस्थानम्","1.1.43:संज्ञा:सुडनपुंसकस्य","1.1.44:संज्ञा:न वेति विभाषा","1.1.45:संज्ञा:इग्यणः सम्प्रसारणम्","1.1.46:परिभाषा:आद्यन्तौ टकितौ","1.1.47:परिभाषा:मिदचोऽन्त्यात्परः","1.1.48:परिभाषा:एच इग्घ्रस्वादेशे","1.1.49:परिभाषा:षष्ठी स्थानेयोगा","1.1.50:परिभाषा:स्थानेऽन्तरतमः","1.1.51:परिभाषा:उरण् रपरः","1.1.52:परिभाषा:अलोऽन्त्यस्य","1.1.53:परिभाषा:ङिच्च","1.1.54:परिभाषा:आदेः परस्य","1.1.55:परिभाषा:अनेकाल्शित्सर्वस्य","1.1.56:अतिदेशः:स्थानिवदादेशोऽनल्विधौ","1.1.57:अतिदेशः:अचः परस्मिन् पूर्वविधौ","1.1.58:अतिदेशः:न पदान्तद्विर्वचनवरेयलोपस्वरसवर्णानुस्वारदीर्घजश्चर्विधिषु","1.1.59:अतिदेशः:द्विर्वचनेऽचि","1.1.60:संज्ञा:अदर्शनं लोपः","1.1.61:संज्ञा:प्रत्ययस्य लुक्‌श्लुलुपः","1.1.62:परिभाषा:प्रत्ययलोपे प्रत्ययलक्षणम्","1.1.63:परिभाषा:न लुमताऽङ्गस्य","1.1.64:संज्ञा:अचोऽन्त्यादि टि","1.1.65:संज्ञा:अलोऽन्त्यात् पूर्व उपधा","1.1.66:परिभाषा:तस्मिन्निति निर्दिष्टे पूर्वस्य","1.1.67:परिभाषा:तस्मादित्युत्तरस्य","1.1.68::स्वं रूपं शब्दस्याशब्दसंज्ञा","1.1.69::अणुदित् सवर्णस्य चाप्रत्ययः","1.1.70::तपरस्तत्कालस्य","1.1.71:संज्ञा:आदिरन्त्येन सहेता","1.1.72:संज्ञा:येन विधिस्तदन्तस्य","1.1.73:संज्ञा:वृद्धिर्यस्याचामादिस्तद् वृद्धम्","1.1.74:संज्ञा:त्यदादीनि च","1.1.75:संज्ञा:एङ् प्राचां देशे","1.2.1:अतिदेशः:गाङ्कुटादिभ्योऽञ्णिन्ङ् इत्","1.2.2:अतिदेशः:विज इट्","1.2.3:अतिदेशः:विभाषोर्णोः","1.2.4:अतिदेशः:सार्वधातुकमपित्","1.2.5:अतिदेशः:असंयोगाल्लिट् कित्","1.2.6:अतिदेशः:ईन्धिभवतिभ्यां च","1.2.7:अतिदेशः:मृडमृदगुधकुषक्लिशवदवसः क्त्वा","1.2.8:अतिदेशः:रुदविदमुषग्रहिस्वपिप्रच्छः सँश्च","1.2.9:अतिदेशः:इको झल्","1.2.10:अतिदेशः:हलन्ताच्च","1.2.11:अतिदेशः:लिङ्सिचावात्मनेपदेषु","1.2.12:अतिदेशः:उश्च","1.2.13:अतिदेशः:वा गमः","1.2.14:अतिदेशः:हनः सिच्","1.2.15:अतिदेशः:यमो गन्धने","1.2.16:अतिदेशः:विभाषोपयमने","1.2.17:अतिदेशः:स्था घ्वोरिच्च","1.2.18:अतिदेशः:न क्त्वा सेट्","1.2.19:अतिदेशः:निष्ठा शीङ्स्विदिमिदिक्ष्विदिधृषः","1.2.20:अतिदेशः:मृषस्तितिक्षायाम्","1.2.21:अतिदेशः:उदुपधाद्भावादिकर्मणोरन्यतरस्याम्","1.2.22:अतिदेशः:पूङः क्त्वा च","1.2.23:अतिदेशः:नोपधात्थफान्ताद्वा","1.2.24:अतिदेशः:वञ्चिलुञ्च्यृतश्च","1.2.25:अतिदेशः:तृषिमृषिकृशेः काश्यपस्य","1.2.26:अतिदेशः:रलो व्युपधाद्धलादेः संश्च","1.2.27:संज्ञा:ऊकालोऽज्झ्रस्वदीर्घप्लुतः","1.2.28:परिभाषा:अचश्च","1.2.29:संज्ञा:उच्चैरुदात्तः","1.2.30:संज्ञा:नीचैरनुदात्तः","1.2.31:संज्ञा:समाहारः स्वरितः","1.2.32::तस्यादित उदात्तमर्धह्रस्वम्","1.2.33::एकश्रुति दूरात् सम्बुद्धौ","1.2.34::यज्ञकर्मण्यजपन्यूङ्खसामसु","1.2.35::उच्चैस्तरां वा वषट्कारः","1.2.36::विभाषा छन्दसि","1.2.37::न सुब्रह्मण्यायां स्वरितस्य तूदात्तः","1.2.38::देवब्रह्मणोरनुदात्तः","1.2.39::स्वरितात् संहितायामनुदात्तानाम्","1.2.40::उदात्तस्वरितपरस्य सन्नतरः","1.2.41:संज्ञा:अपृक्त एकाल् प्रत्ययः","1.2.42:संज्ञा:तत्पुरुषः समानाधिकरणः कर्मधारयः","1.2.43:संज्ञा:प्रथमानिर्दिष्टं समास उपसर्जनम्","1.2.44:संज्ञा:एकविभक्ति चापूर्वनिपाते","1.2.45:संज्ञा:अर्थवदधातुरप्रत्ययः प्रातिपदिकम्","1.2.46:संज्ञा:कृत्तद्धितसमासाश्च","1.2.47::ह्रस्वो नपुंसके प्रातिपदिकस्य","1.2.48::गोस्त्रियोरुपसर्ज्जनस्य","1.2.49::लुक् तद्धितलुकि","1.2.50::इद्गोण्याः","1.2.51:अतिदेशः:लुपि युक्तवद्व्यक्तिवचने","1.2.52:अतिदेशः:विशेषणानां चाजातेः","1.2.53::तदशिष्यं संज्ञाप्रमाणत्वात्","1.2.54::लुब्योगाप्रख्यानात्","1.2.55::योगप्रमाणे च तदभावेऽदर्शनं स्यात्","1.2.56::प्रधानप्रत्ययार्थवचनमर्थस्यान्यप्रमाणत्वात्","1.2.57::कालोपसर्जने च तुल्यम्","1.2.58::जात्याख्यायामेकस्मिन् बहुवचनमन्यतरस्याम्","1.2.59::अस्मदो द्वायोश्च","1.2.60::फल्गुनीप्रोष्ठपदानां च नक्षत्रे","1.2.61::छन्दसि पुनर्वस्वोरेकवचनम्","1.2.62::विशाखयोश्च","1.2.63::तिष्यपुनर्वस्वोर्नक्षत्रद्वंद्वे बहुवचनस्य","1.2.64::सरूपाणामेकशेष एकविभक्तौ","1.2.65::वृद्धो यूना तल्लक्षणश्चेदेव विशेषः","1.2.66:अतिदेशः:स्त्री पुंवच्च","1.2.67::पुमान् स्त्रिया","1.2.68::भ्रातृपुत्रौ स्वसृदुहितृभ्याम्","1.2.69::नपुंसकमनपुंसकेनैकवच्चास्यान्यतरस्याम्","1.2.70::पिता मात्रा","1.2.71::श्वशुरः श्वश्र्वा","1.2.72::त्यदादीनि सर्वैर्नित्यम्","1.2.73::ग्राम्यपशुसंघेषु अतरुणेषु स्त्री","1.3.1:संज्ञा:भूवादयो धातवः","1.3.2:संज्ञा:उपदेशेऽजनुनासिक इत्","1.3.3:संज्ञा:हलन्त्यम्","1.3.4:संज्ञा:न विभक्तौ तुस्माः","1.3.5:संज्ञा:आदिर्ञिटुडवः","1.3.6:संज्ञा:षः प्रत्ययस्य","1.3.7:संज्ञा:चुटू","1.3.8:संज्ञा:लशक्वतद्धिते","1.3.9:संज्ञा:तस्य लोपः","1.3.10:परिभाषा:यथासंख्यमनुदेशः समानाम्","1.3.11:परिभाषा:स्वरितेनाधिकारः","1.3.12::अनुदात्तङित आत्मनेपदम्","1.3.13::भावकर्म्मणोः","1.3.14::कर्त्तरि कर्म्मव्यतिहारे","1.3.15::न गतिहिंसार्थेभ्यः","1.3.16::इतरेतरान्योन्योपपदाच्च","1.3.17::नेर्विशः","1.3.18::परिव्यवेभ्यः क्रियः","1.3.19::विपराभ्यां जेः","1.3.20::आङो दोऽनास्यविहरणे","1.3.21::क्रीडोऽनुसम्परिभ्यश्च","1.3.22::समवप्रविभ्यः स्थः","1.3.23::प्रकाशनस्थेयाख्ययोश्च","1.3.24::उदोऽनूर्द्ध्वकर्मणि","1.3.25::उपान्मन्त्रकरणे","1.3.26::अकर्मकाच्च","1.3.27::उद्विभ्यां तपः","1.3.28::आङो यमहनः","1.3.29::समो गम्यृच्छिप्रच्छिस्वरत्यर्तिश्रुविदिभ्यः","1.3.30::निसमुपविभ्यो ह्वः","1.3.31::स्पर्द्धायामाङः","1.3.32::गन्धनावक्षेपणसेवनसाहसिक्यप्रतियत्नप्रकथनोपयोगेषु कृञः","1.3.33::अधेः प्रसहने","1.3.34::वेः शब्दकर्म्मणः","1.3.35::अकर्मकाच्च","1.3.36::सम्माननोत्सञ्जनाचार्यकरणज्ञानभृतिविगणनव्ययेषु नियः","1.3.37::कर्तृस्थे चाशरीरे कर्मणि","1.3.38::वृत्तिसर्गतायनेषु क्रमः","1.3.39::उपपराभ्याम्","1.3.40::आङ उद्गमने","1.3.41::वेः पादविहरणे","1.3.42::प्रोपाभ्यां समर्थाभ्याम्","1.3.43::अनुपसर्गाद्वा","1.3.44::अपह्नवे ज्ञः","1.3.45::अकर्मकाच्च","1.3.46::सम्प्रतिभ्यामनाध्याने","1.3.47::भासनोपसम्भाषाज्ञानयत्नविमत्युपमन्त्रणेषु वदः","1.3.48::व्यक्तवाचां समुच्चारणे","1.3.49::अनोरकर्मकात्","1.3.50::विभाषा विप्रलापे","1.3.51::अवाद्ग्रः","1.3.52::समः प्रतिज्ञाने","1.3.53::उदश्चरः सकर्मकात्","1.3.54::समस्तृतीयायुक्तात्","1.3.55::दाणश्च सा चेच्चतुर्थ्यर्थे","1.3.56::उपाद्यमः स्वकरणे","1.3.57::ज्ञाश्रुस्मृदृशां सनः","1.3.58::नानोर्ज्ञः","1.3.59::प्रत्याङ्भ्यां श्रुवः","1.3.60::शदेः शितः","1.3.61::म्रियतेर्लुङ्‌लिङोश्च","1.3.62:अतिदेशः:पूर्ववत् सनः","1.3.63:अतिदेशः:आम्प्रत्ययवत् कृञोऽनुप्रयोगस्य","1.3.64::प्रोपाभ्यां युजेरयज्ञपात्रेषु","1.3.65::समः क्ष्णुवः","1.3.66::भुजोऽनवने","1.3.67::णेरणौ यत् कर्म णौ चेत् स कर्ताऽनाध्याने","1.3.68::भीस्म्योर्हेतुभये","1.3.69::गृधिवञ्च्योः प्रलम्भने","1.3.70::लियः सम्माननशालिनीकरणयोश्च","1.3.71::मिथ्योपपदात् कृञोऽभ्यासे","1.3.72::स्वरितञितः कर्त्रभिप्राये क्रियाफले","1.3.73::अपाद्वदः","1.3.74::णिचश्च","1.3.75::समुदाङ्भ्यो यमोऽग्रन्थे","1.3.76::अनुपसर्गाज्ज्ञः","1.3.77::विभाषोपपदेन प्रतीयमाने","1.3.78::शेषात् कर्तरि परस्मैपदम्","1.3.79::अनुपराभ्यां कृञः","1.3.80::अभिप्रत्यतिभ्यः क्षिपः","1.3.81::प्राद्वहः","1.3.82::परेर्मृषः","1.3.83::व्याङ्परिभ्यो रमः","1.3.84::उपाच्च","1.3.85::विभाषाऽकर्मकात्","1.3.86::बुधयुधनशजनेङ्प्रुद्रुस्रुभ्यो णेः","1.3.87::निगरणचलनार्थेभ्यः","1.3.88::अणावकर्मकाच्चित्तवत्कर्तृकात्","1.3.89::न पादम्याङ्यमाङ्यसपरिमुहरुचिनृतिवदवसः","1.3.90::वा क्यषः","1.3.91::द्युद्भ्यो लुङि","1.3.92::वृद्भ्यः स्यसनोः","1.3.93::लुटि च कॢपः","1.4.1:अधिकारः:आ कडारादेका संज्ञा","1.4.2:परिभाषा:विप्रतिषेधे परं कार्यम्","1.4.3:संज्ञा:यू स्त्र्याख्यौ नदी","1.4.4:संज्ञा:नेयङुवङ्स्थानावस्त्री","1.4.5:संज्ञा:वाऽऽमि","1.4.6:संज्ञा:ङिति ह्रस्वश्च","1.4.7:संज्ञा:शेषो घ्यसखि","1.4.8:संज्ञा:पतिः समास एव","1.4.9:संज्ञा:षष्ठीयुक्तश्छन्दसि वा","1.4.10:संज्ञा:ह्रस्वं लघु","1.4.11:संज्ञा:संयोगे गुरु","1.4.12:संज्ञा:दीर्घं च","1.4.13:संज्ञा:यस्मात् प्रत्ययविधिस्तदादि प्रत्ययेऽङ्गम्","1.4.14:संज्ञा:सुप्तिङन्तं पदम्","1.4.15:संज्ञा:नः क्ये","1.4.16:संज्ञा:सिति च","1.4.17:संज्ञा:स्वादिष्वसर्वनामस्थाने","1.4.18:संज्ञा:यचि भम्","1.4.19:संज्ञा:तसौ मत्वर्थे","1.4.20:संज्ञा:अयस्मयादीनि च्छन्दसि","1.4.21::बहुषु बहुवचनम्","1.4.22::द्व्येकयोर्द्विवचनैकवचने","1.4.23:संज्ञा; अधिकारः:कारके","1.4.24:संज्ञा:ध्रुवमपायेऽपादानम्","1.4.25:संज्ञा:भीत्रार्थानां भयहेतुः","1.4.26:संज्ञा:पराजेरसोढः","1.4.27:संज्ञा:वारणार्थानां ईप्सितः","1.4.28:संज्ञा:अन्तर्द्धौ येनादर्शनमिच्छति","1.4.29:संज्ञा:आख्यातोपयोगे","1.4.30:संज्ञा:जनिकर्तुः प्रकृतिः","1.4.31:संज्ञा:भुवः प्रभवः","1.4.32:संज्ञा:कर्मणा यमभिप्रैति स सम्प्रदानम्","1.4.33:संज्ञा:रुच्यर्थानां प्रीयमाणः","1.4.34:संज्ञा:श्लाघह्नुङ्स्थाशपां ज्ञीप्स्यमानः","1.4.35:संज्ञा:धारेरुत्तमर्णः","1.4.36:संज्ञा:स्पृहेरीप्सितः","1.4.37:संज्ञा:क्रुधद्रुहेर्ष्याऽसूयार्थानां यं प्रति कोपः","1.4.38:संज्ञा:क्रुधद्रुहोरुपसृष्टयोः कर्म","1.4.39:संज्ञा:राधीक्ष्योर्यस्य विप्रश्नः","1.4.40:संज्ञा:प्रत्याङ्भ्यां श्रुवः पूर्वस्य कर्ता","1.4.41:संज्ञा:अनुप्रतिगृणश्च","1.4.42:संज्ञा:साधकतमं करणम्","1.4.43:संज्ञा:दिवः कर्म च","1.4.44:संज्ञा:परिक्रयणे सम्प्रदानमन्यतरस्याम्","1.4.45:संज्ञा:आधारोऽधिकरणम्","1.4.46:संज्ञा:अधिशीङ्स्थाऽऽसां कर्म","1.4.47:संज्ञा:अभिनिविशश्च","1.4.48:संज्ञा:उपान्वध्याङ्वसः","1.4.49:संज्ञा:कर्तुरीप्सिततमं कर्म","1.4.50:संज्ञा:तथायुक्तं चानिप्सीतम्","1.4.51:संज्ञा:अकथितं च","1.4.52:संज्ञा:गतिबुद्धिप्रत्यवसानार्थशब्दकर्माकर्मकाणामणि कर्ता","1.4.53:संज्ञा:हृक्रोरन्यतरस्याम्","1.4.54:संज्ञा:स्वतन्त्रः कर्ता","1.4.55:संज्ञा:तत्प्रयोजको हेतुश्च","1.4.56:अधिकारः:प्राग्रीश्वरान्निपाताः","1.4.57::चादयोऽसत्त्वे","1.4.58::प्रादयः","1.4.59:संज्ञा:उपसर्गाः क्रियायोगे","1.4.60:संज्ञा:गतिश्च","1.4.61:संज्ञा:ऊर्यादिच्विडाचश्च","1.4.62:संज्ञा:अनुकरणं चानितिपरम्","1.4.63:संज्ञा:आदरानादरयोः सदसती","1.4.64:संज्ञा:भूषणेऽलम्","1.4.65:संज्ञा:अन्तरपरिग्रहे","1.4.66:संज्ञा:कणेमनसी श्रद्धाप्रतीघाते","1.4.67:संज्ञा:पुरोऽव्ययम्","1.4.68:संज्ञा:अस्तं च","1.4.69:संज्ञा:अच्छ गत्यर्थवदेषु","1.4.70:संज्ञा:अदोऽनुपदेशे","1.4.71:संज्ञा:तिरोऽन्तर्द्धौ","1.4.72:संज्ञा:विभाषा कृञि","1.4.73:संज्ञा:उपाजेऽन्वाजे","1.4.74:संज्ञा:साक्षात्प्रभृतीनि च","1.4.75:संज्ञा:अनत्याधान उरसिमनसी","1.4.76:संज्ञा:मध्येपदेनिवचने च","1.4.77:संज्ञा:नित्यं हस्ते पाणावुपयमने","1.4.78:संज्ञा:प्राध्वं बन्धने","1.4.79:संज्ञा:जीविकोपनिषदावौपम्ये","1.4.80::ते प्राग्धातोः","1.4.81::छन्दसि परेऽपि","1.4.82::व्यवहिताश्च","1.4.83:संज्ञा; अधिकारः:कर्मप्रवचनीयाः","1.4.84:संज्ञा:अनुर्लक्षणे","1.4.85:संज्ञा:तृतीयाऽर्थे","1.4.86:संज्ञा:हीने","1.4.87:संज्ञा:उपोऽधिके च","1.4.88:संज्ञा:अपपरी वर्जने","1.4.89:संज्ञा:आङ् मर्यादावचने","1.4.90:संज्ञा:लक्षणेत्थम्भूताख्यानभागवीप्सासु प्रतिपर्यनवः","1.4.91:संज्ञा:अभिरभागे","1.4.92:संज्ञा:प्रतिः प्रतिनिधिप्रतिदानयोः","1.4.93:संज्ञा:अधिपरी अनर्थकौ","1.4.94:संज्ञा:सुः पूजायाम्","1.4.95:संज्ञा:अतिरतिक्रमणे च","1.4.96:संज्ञा:अपिः पदार्थसम्भावनान्ववसर्गगर्हासमुच्चयेषु","1.4.97:संज्ञा:अधिरीश्वरे","1.4.98:संज्ञा:विभाषा कृञि","1.4.99:संज्ञा:लः परस्मैपदम्","1.4.100:संज्ञा:तङानावात्मनेपदम्","1.4.101:संज्ञा:तिङस्त्रीणि त्रीणि प्रथममध्यमोत्तमाः","1.4.102:संज्ञा:तान्येकवचनद्विवचनबहुवचनान्येकशः","1.4.103:संज्ञा:सुपः","1.4.104:संज्ञा:विभक्तिश्च","1.4.105::युष्मद्युपपदे समानाधिकरणे स्थानिन्यपि मध्यमः","1.4.106::प्रहासे च मन्योपपदे मन्यतेरुत्तम एकवच्च","1.4.107::अस्मद्युत्तमः","1.4.108::शेषे प्रथमः","1.4.109:संज्ञा:परः संनिकर्षः संहिता","1.4.110:संज्ञा:विरामोऽवसानम्","2.1.1:परिभाषा:समर्थः पदविधिः","2.1.2:अतिदेशः:सुबामन्त्रिते पराङ्गवत्‌ स्वरे","2.1.3:संज्ञा; अधिकारः:प्राक् कडारात्‌ समासः","2.1.4::सह सुपा","2.1.5:संज्ञा; अधिकारः:अव्ययीभावः","2.1.6::अव्ययं विभक्तिसमीपसमृद्धिव्यृद्ध्यर्थाभावात्ययासम्प्रतिशब्दप्रादुर्भावपश्चाद्यथाऽऽनुपूर्व्ययौगपद्यसादृश्यसम्पत्तिसाकल्यान्तवचनेषु","2.1.7::यथाऽसादृये","2.1.8::यावदवधारणे","2.1.9::सुप्प्रतिना मात्राऽर्थे","2.1.10::अक्षशलाकासंख्याः परिणा","2.1.11::विभाषा","2.1.12::अपपरिबहिरञ्चवः पञ्चम्या","2.1.13::आङ् मर्यादाऽभिविध्योः","2.1.14::लक्षणेनाभिप्रती आभिमुख्ये","2.1.15::अनुर्यत्समया","2.1.16::यस्य चायामः","2.1.17::तिष्ठद्गुप्रभृतीनि च","2.1.18::पारे मध्ये षष्ठ्या वा","2.1.19::संख्या वंश्येन","2.1.20::नदीभिश्च","2.1.21::अन्यपदार्थे च संज्ञायाम्‌","2.1.22:संज्ञा; अधिकारः:तत्पुरुषः","2.1.23:संज्ञा:द्विगुश्च","2.1.24::द्वितीया श्रितातीतपतितगतात्यस्तप्राप्तापन्नैः","2.1.25::स्वयं क्तेन","2.1.26::खट्वा क्षेपे","2.1.27::सामि","2.1.28::कालाः","2.1.29::अत्यन्तसंयोगे च","2.1.30::तृतीया तत्कृतार्थेन गुणवचनेन","2.1.31::पूर्वसदृशसमोनार्थकलहनिपुणमिश्रश्लक्ष्णैः","2.1.32::कर्तृकरणे कृता बहुलम्‌","2.1.33::कृत्यैरधिकार्थवचने","2.1.34::अन्नेन व्यञ्जनम्‌","2.1.35::भक्ष्येण मिश्रीकरणम्‌","2.1.36::चतुर्थी तदर्थार्थबलिहितसुखरक्षितैः","2.1.37::पञ्चमी भयेन","2.1.38::अपेतापोढमुक्तपतितापत्रस्तैरल्पशः","2.1.39::स्तोकान्तिकदूरार्थकृच्छ्राणि क्तेन","2.1.40::सप्तमी शौण्डैः","2.1.41::सिद्धशुष्कपक्वबन्धैश्च","2.1.42::ध्वाङ्क्षेण क्षेपे","2.1.43::कृत्यैर्ऋणे","2.1.44::संज्ञायाम्‌","2.1.45::क्तेनाहोरात्रावयवाः","2.1.46::तत्र","2.1.47::क्षेपे","2.1.48::पात्रेसमितादयश्च","2.1.49::पूर्वकालैकसर्वजरत्पुराणनवकेवलाः समानाधिकरणेन","2.1.50::दिक्संख्ये संज्ञायाम्‌","2.1.51::तद्धितार्थोत्तरपदसमाहारे च","2.1.52::संख्यापूर्वो द्विगुः","2.1.53::कुत्सितानि कुत्सनैः","2.1.54::पापाणके कुत्सितैः","2.1.55::उपमानानि सामान्यवचनैः","2.1.56::उपमितं व्याघ्रादिभिः सामान्याप्रयोगे","2.1.57::विशेषणं विशेष्येण बहुलम्‌","2.1.58::पूर्वापरप्रथमचरमजघन्यसमानमध्यमध्यमवीराश्च","2.1.59::श्रेण्यादयः कृतादिभिः","2.1.60::क्तेन नञ्विशिष्टेनानञ्","2.1.61::सन्महत्परमोत्तमोत्कृष्टाः पूज्यमानैः","2.1.62::वृन्दारकनागकुञ्जरैः पूज्यमानम्‌","2.1.63::कतरकतमौ जातिपरिप्रश्ने","2.1.64::किं क्षेपे","2.1.65::पोटायुवतिस्तोककतिपयगृष्टिधेनुवशावेहत्बष्कयणीप्रवक्तॄश्रोत्रियाध्यापकधूर्तैर्जातिः","2.1.66::प्रशंसावचनैश्च","2.1.67::युवा खलतिपलितवलिनजरतीभिः","2.1.68::कृत्यतुल्याख्या अजात्या","2.1.69::वर्णो वर्णेन","2.1.70::कुमारः श्रमणाऽऽदिभिः","2.1.71::चतुष्पादो गर्भिण्या","2.1.72::मयूरव्यंसकादयश्च","2.2.1::पूर्वापराधरोत्तरमेकदेशिनैकाधिकरणे","2.2.2::अर्धं नपुंसकम्‌","2.2.3::द्वितीयतृतीयचतुर्थतुर्याण्यन्यतरस्याम्‌","2.2.4::प्राप्तापन्ने च द्वितीयया","2.2.5::कालाः परिमाणिना","2.2.6::नञ्‌","2.2.7::ईषदकृता","2.2.8::षष्ठी","2.2.9::याजकादिभिश्च","2.2.10::न निर्धारणे","2.2.11::पूरणगुणसुहितार्थसदव्ययतव्यसमानाधिकरणेन","2.2.12::क्तेन च पूजायाम्‌","2.2.13::अधिकरणवाचिना च","2.2.14::कर्म्मणि च","2.2.15::तृजकाभ्यां कर्तरि","2.2.16::कर्त्तरि च","2.2.17::नित्यं क्रीडाजीविकयोः","2.2.18::कुगतिप्रादयः","2.2.19::उपपदमतिङ्","2.2.20::अमैवाव्ययेन","2.2.21::तृतीयाप्रभृतीन्यन्यतरस्याम्‌","2.2.22::क्त्वा च","2.2.23:संज्ञा:शेषो बहुव्रीहिः","2.2.24::अनेकमन्यपदार्थे","2.2.25::संख्ययाऽव्ययासन्नादूराधिकसंख्याः संख्येये","2.2.26::दिङ्नामान्यन्तराले","2.2.27::तत्र तेनेदमिति सरूपे","2.2.28::तेन सहेति तुल्ययोगे","2.2.29:संज्ञा:चार्थे द्वंद्वः","2.2.30::उपसर्जनं पूर्वम्‌","2.2.31::राजदन्तादिषु परम्‌","2.2.32::द्वंद्वे घि","2.2.33::अजाद्यदन्तम्‌","2.2.34::अल्पाच्तरम्‌","2.2.35::सप्तमीविशेषणे बहुव्रीहौ","2.2.36::निष्ठा","2.2.37::वाऽऽहिताग्न्यादिषु","2.2.38::कडाराः कर्मधराये","2.3.1:अधिकारः:अनभिहिते","2.3.2::कर्मणि द्वितीया","2.3.3::तृतीया च होश्छन्दसि","2.3.4::अन्तराऽन्तरेण युक्ते","2.3.5::कालाध्वनोरत्यन्तसंयोगे","2.3.6::अपवर्गे तृतीया","2.3.7::सप्तमीपञ्चम्यौ कारकमध्ये","2.3.8::कर्मप्रवचनीययुक्ते द्वितीया","2.3.9::यस्मादधिकं यस्य चेश्वरवचनं तत्र सप्तमी","2.3.10::पञ्चमी अपाङ्परिभिः","2.3.11::प्रतिनिधिप्रतिदाने च यस्मात्‌","2.3.12::गत्यर्थकर्मणि द्वितीयाचतुर्थ्यौ चेष्टायामनध्वनि","2.3.13::चतुर्थी सम्प्रदाने","2.3.14::क्रियार्थोपपदस्य च कर्मणि स्थानिनः","2.3.15::तुमर्थाच्च भाववचनात्‌","2.3.16::नमःस्वस्तिस्वाहास्वधालंवषड्योगाच्च","2.3.17::मन्यकर्मण्यनादरे विभाषाऽप्राणिषु","2.3.18::कर्तृकरणयोस्तृतीया","2.3.19::सहयुक्तेऽप्रधाने","2.3.20::येनाङ्गविकारः","2.3.21::इत्थंभूतलक्षणे","2.3.22::संज्ञोऽन्यतरस्यां कर्मणि","2.3.23::हेतौ","2.3.24::अकर्तर्यृणे पञ्चमी","2.3.25::विभाषा गुणेऽस्त्रियाम्‌","2.3.26::षष्ठी हेतुप्रयोगे","2.3.27::सर्वनाम्नस्तृतीया च","2.3.28::अपादाने पञ्चमी","2.3.29::अन्यारादितरर्त्तेदिक्‌शब्दाञ्चूत्तरपदाजाहियुक्ते","2.3.30::षष्ठ्यतसर्थप्रत्ययेन","2.3.31::एनपा द्वितीया","2.3.32::पृथग्विनानानाभिस्तृतीयाऽन्यतरस्याम्‌","2.3.33::करणे च स्तोकाल्पकृच्छ्रकतिपयस्यासत्त्ववचनस्य","2.3.34::दूरान्तिकार्थैः षष्ठ्यन्यतरस्याम्‌","2.3.35::दूरान्तिकार्थेभ्यो द्वितीया च","2.3.36::सप्तम्यधिकरणे च","2.3.37::यस्य च भावेन भावलक्षणम्‌","2.3.38::षष्ठी चानादरे","2.3.39::स्वामीश्वराधिपतिदायादसाक्षिप्रतिभूप्रसूतैश्च","2.3.40::आयुक्तकुशलाभ्यां चासेवायाम्‌","2.3.41::यतश्च निर्धारणम्‌","2.3.42::पञ्चमी विभक्ते","2.3.43::साधुनिपुणाभ्याम् अर्चायां सप्तम्यप्रतेः","2.3.44::प्रसितोत्सुकाभ्यां तृतीया च","2.3.45::नक्षत्रे च लुपि","2.3.46::प्रातिपदिकार्थलिङ्गपरिमाणवचनमात्रे प्रथमा","2.3.47::सम्बोधने च","2.3.48:संज्ञा:साऽऽमन्त्रितम्‌","2.3.49:संज्ञा:एकवचनं संबुद्धिः","2.3.50::षष्ठी शेषे","2.3.51::ज्ञोऽविदर्थस्य करणे","2.3.52::अधीगर्थदयेशां कर्मणि","2.3.53::कृञः प्रतियत्ने","2.3.54::रुजार्थानां भाववचनानामज्वरेः","2.3.55::आशिषि नाथः","2.3.56::जासिनिप्रहणनाटक्राथपिषां हिंसायाम्‌","2.3.57::व्यवहृपणोः समर्थयोः","2.3.58::दिवस्तदर्थस्य","2.3.59::विभाषोपसर्गे","2.3.60::द्वितीया ब्राह्मणे","2.3.61::प्रेष्यब्रुवोर्हविषो देवतासम्प्रदाने","2.3.62::चतुर्थ्यर्थे बहुलं छन्दसि","2.3.63::यजेश्च करणे","2.3.64::कृत्वोऽर्थप्रयोगे कालेऽधिकरणे","2.3.65::कर्तृकर्मणोः कृति","2.3.66::उभयप्राप्तौ कर्मणि","2.3.67::क्तस्य च वर्तमाने","2.3.68::अधिकरणवाचिनश्च","2.3.69::न लोकाव्ययनिष्ठाखलर्थतृनाम्‌","2.3.70::अकेनोर्भविष्यदाधमर्ण्ययोः","2.3.71::कृत्यानां कर्तरि वा","2.3.72::तुल्यार्थैरतुलोपमाभ्यां तृतीयाऽन्यतरस्याम्‌","2.3.73::चतुर्थी चाशिष्यायुष्यमद्रभद्रकुशलसुखार्थहितैः","2.4.1:अतिदेशः:द्विगुरेकवचनम्‌","2.4.2::द्वंद्वश्च प्राणितूर्यसेनाङ्गानाम्‌","2.4.3::अनुवादे चरणानाम्‌","2.4.4::अध्वर्युक्रतुरनपुंसकम्.","2.4.5::अध्ययनतोऽविप्रकृष्टाख्यानाम्‌","2.4.6::जातिरप्राणिनाम्‌","2.4.7::विशिष्टलिङ्गो नदी देशोऽग्रामाः","2.4.8::क्षुद्रजन्तवः","2.4.9::येषां च विरोधः शाश्वतिकः","2.4.10::शूद्राणामनिरवसितानाम्‌","2.4.11::गवाश्वप्रभृतीनि च","2.4.12::विभाषा वृक्षमृगतृणधान्यव्यञ्जनपशुशकुन्यश्ववडवपूर्वापराधरोत्तराणाम्‌","2.4.13::विप्रतिषिद्धं चानधिकरणवाचि","2.4.14::न दधिपयआदीनि","2.4.15::अधिकरणैतावत्त्वे च","2.4.16::विभाषा समीपे","2.4.17::स नपुंसकम्‌","2.4.18::अव्ययीभावश्च","2.4.19:अधिकारः:तत्पुरुषोऽनञ्‌ कर्मधारयः","2.4.20::संज्ञायां कन्थोशीनरेषु","2.4.21::उपज्ञोपक्रमं तदाद्याचिख्यासायाम्‌","2.4.22::छाया बाहुल्ये","2.4.23::सभा राजाऽमनुष्यपूर्वा","2.4.24::अशाला च","2.4.25::विभाषा सेनासुराछायाशालानिशानाम्‌","2.4.26:अतिदेशः:परवल्लिङ्गं द्वन्द्वतत्पुरुषयोः","2.4.27::पूर्ववदश्ववडवौ","2.4.28::हेमन्तशिशिरावहोरात्रे च च्छन्दसि","2.4.29::रात्राह्नाहाः पुंसि","2.4.30::अपथं नपुंसकम्‌","2.4.31::अर्धर्चाः पुंसि च","2.4.32::इदमोऽन्वादेशेऽशनुदात्तस्तृतीयाऽऽदौ","2.4.33::एतदस्त्रतसोस्त्रतसौ चानुदात्तौ","2.4.34::द्वितीयाटौस्स्वेनः","2.4.35:अधिकारः:आर्द्धधातुके","2.4.36::अदो जग्धिर्ल्यप्ति किति","2.4.37::लुङ्सनोर्घसॢ","2.4.38::घञपोश्च","2.4.39::बहुलं छन्दसि","2.4.40::लिट्यन्यतरस्याम्‌","2.4.41::वेञो वयिः","2.4.42::हनो वध लिङि","2.4.43::लुङि च","2.4.44::आत्मनेपदेष्वन्यतरस्याम्‌","2.4.45::इणो गा लुङि","2.4.46::णौ गमिरबोधने","2.4.47::सनि च","2.4.48::इङश्च","2.4.49::गाङ्‌ लिटि","2.4.50::विभाषा लुङ्लृङोः","2.4.51::णौ च सँश्चङोः","2.4.52::अस्तेर्भूः","2.4.53::ब्रुवो वचिः","2.4.54::चक्षिङः ख्याञ्‌","2.4.55::वा लिटि","2.4.56::अजेर्व्यघञपोः","2.4.57::वा यौ","2.4.58::ण्यक्षत्रियार्षञितो यूनि लुगणिञोः","2.4.59::पैलादिभ्यश्च","2.4.60::इञः प्राचाम्‌","2.4.61::न तौल्वलिभ्यः","2.4.62::तद्राजस्य बहुषु तेनैवास्त्रियाम्‌","2.4.63::यस्कादिभ्यो गोत्रे","2.4.64::यञञोश्च","2.4.65::अत्रिभृगुकुत्सवसिष्ठगोतमाङ्गिरोभ्यश्च","2.4.66::बह्वचः इञः प्राच्यभरतेषु","2.4.67::न गोपवनादिभ्यः","2.4.68::तिककितवादिभ्यो द्वंद्वे","2.4.69::उपकादिभ्योऽन्यतरस्यामद्वंद्वे","2.4.70::आगस्त्यकौण्डिन्ययोरगस्तिकुण्डिनच्‌","2.4.71::सुपो धातुप्रातिपदिकयोः","2.4.72::अदिप्रभृतिभ्यः शपः","2.4.73::बहुलं छन्दसि","2.4.74::यङोऽचि च","2.4.75::जुहोत्यादिभ्यः श्लुः","2.4.76::बहुलं छन्दसि","2.4.77::गातिस्थाघुपाभूभ्यः सिचः परस्मैपदेषु","2.4.78::विभाषा घ्राधेट्शाच्छासः","2.4.79::तनादिभ्यस्तथासोः","2.4.80::मन्त्रे घसह्वरणशवृदहाद्वृच्कृगमिजनिभ्यो लेः","2.4.81::आमः","2.4.82::अव्ययादाप्सुपः","2.4.83::नाव्ययीभावादतोऽम्त्वपञ्चम्याः","2.4.84::तृतीयासप्तम्योर्बहुलम्‌","2.4.85::लुटः प्रथमस्य डारौरसः","3.1.1:संज्ञा; अधिकारः:प्रत्ययः","3.1.2:अधिकारः:परश्च","3.1.3::आद्युदात्तश्च","3.1.4::अनुदत्तौ सुप्पितौ","3.1.5::गुप्तिज्किद्भ्यः सन्","3.1.6::मान्बधदान्शान्भ्यो दीर्घश्चाभ्यासस्य","3.1.7::धातोः कर्मणः समानकर्तृकादिच्छायां वा","3.1.8::सुप आत्मनः क्यच्","3.1.9::काम्यच्च","3.1.10::उपमानादाचारे","3.1.11::कर्तुः क्यङ् सलोपश्च","3.1.12::भृशादिभ्यो भुव्यच्वेर्लोपश्च हलः","3.1.13::लोहितादिडाज्भ्यः क्यष्।","3.1.14::कष्टाय क्रमणे","3.1.15::कर्मणः रोमन्थतपोभ्यां वर्तिचरोः","3.1.16::बाष्पोष्माभ्यां उद्वमने","3.1.17::शब्दवैरकलहाभ्रकण्वमेघेभ्यः करणे","3.1.18::सुखादिभ्यः कर्तृवेदनायाम्","3.1.19::नमोवरिवश्चित्रङः क्यच्","3.1.20::पुच्छभाण्डचीवराण्णिङ्","3.1.21::मुण्डमिश्रश्लक्ष्णलवणव्रतवस्त्रहलकलकृततूस्तेभ्यो","3.1.22:अधिकारः:धातोरेकाचो हलादेः क्रियासमभिहारे यङ्","3.1.23::नित्यं कौटिल्ये गतौ","3.1.24::लुपसदचरजपजभदहदशगॄभ्यो भावगर्हायाम्","3.1.25::सत्यापपाशरूपवीणातूलश्लोकसेनालोमत्वचवर्मवर्णचूर्णचुरादिभ्यो णिच्","3.1.26::हेतुमति च","3.1.27::कण्ड्वादिभ्यो यक्","3.1.28::गुपूधूपविच्छिपणिपनिभ्य आयः","3.1.29::ऋतेरीयङ्","3.1.30::कमेर्णिङ्","3.1.31::आयादय आर्धद्धातुके वा","3.1.32:संज्ञा:सनाद्यन्ता धातवः","3.1.33::स्यतासी लृलुटोः","3.1.34::सिब्बहुलं लेटि","3.1.35::कास्प्रत्ययादाममन्त्रे लिटि","3.1.36::इजादेश्च गुरुमतोऽनृच्छः","3.1.37::दयायासश्च","3.1.38::उषविदजागृभ्योऽन्यतरस्याम्","3.1.39::भीह्रीभृहुवां श्लुवच्च","3.1.40::कृञ् चानुप्रयुज्यते लिटि","3.1.41::विदाङ्कुर्वन्त्वित्यन्यतरस्याम्","3.1.42::अभ्युत्सादयांप्रजनयांचिकयांरमयामकः","3.1.43::च्लि लुङि","3.1.44::च्लेः सिच्","3.1.45::शल इगुपधादनिटः क्सः","3.1.46::श्लिष आलिङ्गने","3.1.47::न दृशः","3.1.48::णिश्रिद्रुस्रुभ्यः कर्तरि चङ्","3.1.49::विभाषा धेट्श्व्योः","3.1.50::गुपेश्छन्दसि","3.1.51::नोनयतिध्वनयत्येलयत्यर्दयतिभ्यः","3.1.52::अस्यतिवक्तिख्यातिभ्यः अङ्","3.1.53::लिपिसिचिह्वश्च","3.1.54::आत्मनेपदेष्वन्यतरस्याम्","3.1.55::पुषादिद्युताद्यॢदितः परस्मैपदेषु","3.1.56::सर्त्तिशास्त्यर्तिभ्यश्च","3.1.57::इरितो वा","3.1.58::जृस्तम्भुम्रुचुम्लुचुग्रुचुग्लुचुग्लुञ्चुश्विभ्यश्च","3.1.59::कृमृदृरुहिभ्यश्छन्दसि","3.1.60::चिण् ते पदः","3.1.61::दीपजनबुधपूरितायिप्यायिभ्योऽन्यतरस्याम्","3.1.62::अचः कर्मकर्तरि","3.1.63::दुहश्च","3.1.64::न रुधः","3.1.65::तपोऽनुतापे च","3.1.66::चिण् भावकर्मणोः","3.1.67::सार्वधातुके यक्","3.1.68::कर्तरि शप्‌","3.1.69::दिवादिभ्यः श्यन्","3.1.70::वा भ्राशभ्लाशभ्रमुक्रमुक्लमुत्रसित्रुटिलषः","3.1.71::यसोऽनुपसर्गात्‌","3.1.72::संयसश्च","3.1.73::स्वादिभ्यः श्नुः","3.1.74::श्रुवः शृ च","3.1.75::अक्षोऽन्यतरस्याम्","3.1.76::तनूकरणे तक्षः","3.1.77::तुदादिभ्यः शः","3.1.78::रुधादिभ्यः श्नम्","3.1.79::तनादिकृञ्भ्य उः","3.1.80::धिन्विकृण्व्योर च","3.1.81::क्र्यादिभ्यः श्ना","3.1.82::स्तम्भुस्तुम्भुस्कम्भुस्कुम्भुस्कुञ्भ्यः श्नुश्च","3.1.83::हलः श्नः शानज्झौ","3.1.84::छन्दसि शायजपि","3.1.85::व्यत्ययो बहुलम्","3.1.86::लिङ्याशिष्यङ्","3.1.87:अतिदेशः:कर्मवत्‌ कर्मणा तुल्यक्रियः","3.1.88::तपस्तपःकर्मकस्यैव","3.1.89::न दुहस्नुनमां यक्चिणौ","3.1.90::कुषिरजोः प्राचां श्यन् परस्मैपदं च","3.1.91:अधिकारः:धातोः","3.1.92:संज्ञा:तत्रोपपदं सप्तमीस्थम्‌","3.1.93:संज्ञा:कृदतिङ्","3.1.94:परिभाषा:वाऽसरूपोऽस्त्रियाम्","3.1.95:संज्ञा:कृत्याः प्राङ् ण्वुलः","3.1.96::तव्यत्तव्यानीयरः","3.1.97::अचो यत्‌","3.1.98::पोरदुपधात्‌","3.1.99::शकिसहोश्च","3.1.100::गदमदचरयमश्चानुपसर्गे","3.1.101::अवद्यपण्यवर्या गर्ह्यपणितव्यानिरोधेषु","3.1.102::वह्यं करणम्‌","3.1.103::अर्यः स्वामिवैश्ययोः","3.1.104::उपसर्या काल्या प्रजने","3.1.105::अजर्यं संगतम्‌","3.1.106::वदः सुपि क्यप् च","3.1.107::भुवो भावे","3.1.108::हनस्त च","3.1.109::एतिस्तुशस्वृदृजुषः क्यप्‌","3.1.110::ऋदुपधाच्चाकॢपिचृतेः","3.1.111::ई च खनः","3.1.112::भृञोऽसंज्ञायाम्","3.1.113::मृजेर्विभाषा","3.1.114::राजसूयसूर्यमृषोद्यरुच्यकुप्यकृष्टपच्याव्यथ्याः","3.1.115::भिद्योद्ध्यौ नदे","3.1.116::पुष्यसिद्ध्यौ नक्षत्रे","3.1.117::विपूयविनीयजित्या मुञ्जकल्कहलिषु","3.1.118::प्रत्यपिभ्यां ग्रहेश्छन्दसि","3.1.119::पदास्वैरिबाह्यापक्ष्येषु च","3.1.120::विभाषा कृवृषोः","3.1.121::युग्यं च पत्त्रे","3.1.122::अमावस्यदन्यतरस्याम्","3.1.123::छन्दसि निष्टर्क्यदेवहूयप्रणीयोन्नीयोच्छिष्य","3.1.124::ऋहलोर्ण्यत्‌","3.1.125::ओरावश्यके","3.1.126::आसुयुवपिरपिलपित्रपिचमश्च","3.1.127::आनाय्योऽनित्ये","3.1.128::प्रणाय्योऽसंमतौ","3.1.129::पाय्यसान्नाय्यनिकाय्यधाय्या मानहविर्निवाससामिधेनीषु","3.1.130::क्रतौ कुण्डपाय्यसंचाय्यौ","3.1.131::अग्नौ परिचाय्योपचाय्यसमूह्याः","3.1.132::चित्याग्निचित्ये च","3.1.133::ण्वुल्तृचौ","3.1.134::नन्दिग्रहिपचादिभ्यो ल्युणिन्यचः","3.1.135::इगुपधज्ञाप्रीकिरः कः","3.1.136::आतश्चोपसर्गे","3.1.137::पाघ्राध्माधेट्दृशः शः","3.1.138::अनुपसर्गाल्लिम्पविन्दधारिपारिवेद्युदेजिचेतिसातिसाहिभ्यश्च","3.1.139::ददातिदधात्योर्विभाषा","3.1.140::ज्वलितिकसन्तेभ्यो णः","3.1.141::श्याऽऽद्व्यधास्रुसंस्र्वतीणवसाऽवहृलिहश्लिषश्वसश्च","3.1.142::दुन्योरनुपसर्गे","3.1.143::विभाषा ग्रहेः","3.1.144::गेहे कः","3.1.145::शिल्पिनि ष्वुन्","3.1.146::गस्थकन्","3.1.147::ण्युट् च","3.1.148::हश्च व्रीहिकालयोः","3.1.149::प्रुसृल्वः समभिहारे वुन्","3.1.150::आशिषि च","3.2.1::कर्मण्यण्","3.2.2::ह्वावामश्च","3.2.3::आतोऽनुपसर्गे कः","3.2.4::सुपि स्थः","3.2.5::तुन्दशोकयोः परिमृजापनुदोः","3.2.6::प्रे दाज्ञः","3.2.7::समि ख्यः","3.2.8::गापोष्टक्","3.2.9::हरतेरनुद्यमनेऽच्","3.2.10::वयसि च","3.2.11::आङि ताच्छील्ये","3.2.12::अर्हः","3.2.13::स्तम्बकर्णयोः रमिजपोः","3.2.14::शमि धातोः संज्ञायाम्","3.2.15::अधिकरणे शेतेः","3.2.16::चरेष्टः","3.2.17::भिक्षासेनाऽऽदायेषु च","3.2.18::पुरोऽग्रतोऽग्रेषु सर्तेः","3.2.19::पूर्वे कर्तरि","3.2.20::कृञो हेतुताच्छील्यानुलोम्येषु","3.2.21::दिवाविभानिशाप्रभाभास्करान्तानन्तादिबहुनान्दीकिम्लिपिलिबिबलिभक्तिकर्तृचित्रक्षेत्रसंख्याजङ्घाबाह्वहर्यत्तत्धनुररुष्षु","3.2.22::कर्मणि भृतौ","3.2.23::न शब्दश्लोककलहगाथावैरचाटुसूत्रमन्त्रपदेषु","3.2.24::स्तम्बशकृतोरिन्","3.2.25::हरतेर्दृतिनाथयोः पशौ","3.2.26::फलेग्रहिरात्मम्भरिश्च","3.2.27::छन्दसि वनसनरक्षिमथाम्","3.2.28::एजेः खश्","3.2.29::नासिकास्तनयोर्ध्माधेटोः","3.2.30::नाडीमुष्ट्योश्च","3.2.31::उदि कूले रुजिवहोः","3.2.32::वहाभ्रे लिहः","3.2.33::परिमाणे पचः","3.2.34::मितनखे च","3.2.35::विध्वरुषोः तुदः","3.2.36::असूर्यललाटयोर्दृशितपोः","3.2.37::उग्रम्पश्येरम्मदपाणिन्धमाश्च","3.2.38::प्रियवशे वदः खच्","3.2.39::द्विषत्परयोस्तापेः","3.2.40::वाचि यमो व्रते","3.2.41::पूःसर्वयोर्दारिसहोः","3.2.42::सर्वकूलाभ्रकरीषेषु कषः","3.2.43::मेघर्तिभयेषु कृञः","3.2.44::क्षेमप्रियमद्रेऽण् च","3.2.45::आशिते भुवः करणभावयोः","3.2.46::संज्ञायां भृतॄवृजिधारिसहितपिदमः","3.2.47::गमश्च","3.2.48::अन्तात्यन्ताध्वदूरपारसर्वानन्तेषु डः","3.2.49::आशिषि हनः","3.2.50::अपे क्लेशतमसोः","3.2.51::कुमारशीर्षयोर्णिनिः","3.2.52::लक्षणे जायापत्योष्टक्","3.2.53::अमनुष्यकर्तृके च","3.2.54::शक्तौ हस्तिकपाटयोः","3.2.55::पाणिघताडघौ शिल्पिनि","3.2.56::आढ्यसुभगस्थूलपलितनग्नान्धप्रियेषु च्व्य्र्थेष्वच्वौ कृञः करणे ख्युन्","3.2.57::कर्तरि भुवः खिष्णुच्खुकञौ","3.2.58::स्पृशोऽनुदके क्विन्","3.2.59::ऋत्विग्दधृक्स्रग्दिगुष्णिगञ्चुयुजिक्रुञ्चां च","3.2.60::त्यदादिषु दृशोऽनालोचने कञ् च","3.2.61::सत्सूद्विषद्रुहदुहयुजविदभिदच्छिदजिनीराजामुपसर्गेऽपि क्विप्‌","3.2.62::भजो ण्विः","3.2.63::छन्दसि सहः","3.2.64::वहश्च","3.2.65::कव्यपुरीषपुरीष्येषु ञ्युट्","3.2.66::हव्येऽनन्तः पादम्","3.2.67::जनसनखनक्रमगमो विट्","3.2.68::अदोऽनन्ने","3.2.69::क्रव्ये च","3.2.70::दुहः कब् घश्च","3.2.71::मन्त्रे श्वेतवहौक्थशस्पुरोडाशो ण्विन्","3.2.72::अवे यजः","3.2.73::विजुपे छन्दसि","3.2.74::आतो मनिन्क्वनिप्वनिपश्च","3.2.75::अन्येभ्योऽपि दृश्यन्ते","3.2.76::क्विप् च","3.2.77::स्थः क च","3.2.78::सुप्यजातौ णिनिस्ताच्छिल्ये","3.2.79::कर्तर्युपमाने","3.2.80::व्रते","3.2.81::बहुलमाभीक्ष्ण्ये","3.2.82::मनः","3.2.83::आत्ममाने खश्च","3.2.84:अधिकारः:भूते","3.2.85::करणे यजः","3.2.86::कर्मणि हनः","3.2.87::ब्रह्मभ्रूणवृत्रेषु क्विप्‌","3.2.88::बहुलं छन्दसि","3.2.89::सुकर्मपापमन्त्रपुण्येषु कृञः","3.2.90::सोमे सुञः","3.2.91::अग्नौ चेः","3.2.92::कर्मण्यग्न्याख्यायाम्","3.2.93::कर्मणीनिर्विक्रियः","3.2.94::दृशेः क्वनिप्‌","3.2.95::राजनि युधिकृञः","3.2.96::सहे च","3.2.97::सप्तम्यां जनेर्डः","3.2.98::पञ्चम्यामजातौ","3.2.99::उपसर्गे च संज्ञायाम्","3.2.100::अनौ कर्मणि","3.2.101::अन्येष्वपि दृश्यते","3.2.102::निष्ठा","3.2.103::सुयजोर्ङ्वनिप्‌","3.2.104::जीर्यतेरतृन्","3.2.105::छन्दसि लिट्","3.2.106::लिटः कानज्वा","3.2.107::क्वसुश्च","3.2.108::भाषायां सदवसश्रुवः","3.2.109::उपेयिवाननाश्वाननूचानश्च","3.2.110::लुङ्","3.2.111::अनद्यतने लङ्","3.2.112::अभिज्ञावचने लृट्","3.2.113::न यदि","3.2.114::विभाषा साकाङ्क्षे","3.2.115::परोक्षे लिट्","3.2.116::हशश्वतोर्लङ् च","3.2.117::प्रश्ने चासन्नकाले","3.2.118::लट् स्मे","3.2.119::अपरोक्षे च","3.2.120::ननौ पृष्टप्रतिवचने","3.2.121::नन्वोर्विभाषा","3.2.122::पुरि लुङ् चास्मे","3.2.123:अधिकारः:वर्तमाने लट्","3.2.124::लटः शतृशानचावप्रथमासमानाधिकरणे","3.2.125::सम्बोधने च","3.2.126::लक्षणहेत्वोः क्रियायाः","3.2.127:संज्ञा:तौ सत्‌","3.2.128::पूङ्यजोः शानन्","3.2.129::ताच्छील्यवयोवचनशक्तिषु चानश्","3.2.130::इङ्धार्योः शत्रकृच्छ्रिणि","3.2.131::द्विषोऽमित्रे","3.2.132::सुञो यज्ञसंयोगे","3.2.133::अर्हः पूजायाम्","3.2.134:अधिकारः:आक्वेस्तच्छीलतद्धर्मतत्साधुकारिषु","3.2.135::तृन्","3.2.136::अलंकृञ्निराकृञ्प्रजनोत्पचोत्पतोन्मदरुच्यपत्रपवृतुवृधुसहचर इष्णुच्","3.2.137::णेश्छन्दसि","3.2.138::भुवश्च","3.2.139::ग्लाजिस्थश्च क्स्नुः","3.2.140::त्रसिगृधिधृषिक्षिपेः क्नुः","3.2.141::शमित्यष्टाभ्यो घिनुण्","3.2.142::संपृचानुरुधाङ्यमाङ्यसपरिसृसंसृजपरिदेविसंज्वरपरिक्षिपपरिरटपरिवदपरिदहपरिमुहदुषद्विषद्रुहदुहयुजाक्रीडविविचत्यजरजभजातिचरापचरामुषाभ्याहनश्च","3.2.143::वौ कषलसकत्थस्रम्भः","3.2.144::अपे च लषः","3.2.145::प्रे लपसृद्रुमथवदवसः","3.2.146::निन्दहिंसक्लिशखादविनाशपरिक्षिपपरिरटपरिवादिव्याभाषासूञो वुञ्","3.2.147::देविक्रुशोश्चोपसर्गे","3.2.148::चलनशब्दार्थादकर्मकाद्युच्","3.2.149::अनुदात्तेतश्च हलादेः","3.2.150::जुचङ्क्रम्यदन्द्रम्यसृगृधिज्वलशुचलषपतपदः","3.2.151::क्रुधमण्डार्थेभ्यश्च","3.2.152::न यः","3.2.153::सूददीपदीक्षश्च","3.2.154::लषपतपदस्थाभूवृषहनकमगमशॄभ्य उकञ्","3.2.155::जल्पभिक्षकुट्टलुण्टवृङः षाकन्","3.2.156::प्रजोरिनिः","3.2.157::जिदृक्षिविश्रीण्वमाव्यथाभ्यमपरिभूप्रसूभ्यश्च","3.2.158::स्पृहिगृहिपतिदयिनिद्रातन्द्राश्रद्धाभ्य आलुच्","3.2.159::दाधेट्सिशदसदो रुः","3.2.160::सृघस्यदः क्मरच्","3.2.161::भञ्जभासमिदो घुरच्","3.2.162::विदिभिदिच्छिदेः कुरच्","3.2.163::इण्नश्जिसर्त्तिभ्यः क्वरप्‌","3.2.164::गत्वरश्च","3.2.165::जागुरूकः","3.2.166::यजजपदशां यङः","3.2.167::नमिकम्पिस्म्यजसकमहिंसदीपो रः","3.2.168::सनाशंसभिक्ष उः","3.2.169::विन्दुरिच्छुः","3.2.170::क्याच्छन्दसि","3.2.171::आदृगमहनजनः किकिनौ लिट् च","3.2.172::स्वपितृषोर्नजिङ्","3.2.173::शॄवन्द्योरारुः","3.2.174::भियः क्रुक्लुकनौ","3.2.175::स्थेशभासपिसकसो वरच्","3.2.176::यश्च यङः","3.2.177::भ्राजभासधुर्विद्युतोर्जिपॄजुग्रावस्तुवः क्विप्‌","3.2.178::अन्येभ्योऽपि दृश्यते","3.2.179::भुवः संज्ञाऽन्तरयोः","3.2.180::विप्रसम्भ्यो ड्वसंज्ञायाम्","3.2.181::धः कर्मणि ष्ट्रन्","3.2.182::दाम्नीशसयुयुजस्तुतुदसिसिचमिहपतदशनहः करणे","3.2.183::हलसूकरयोः पुवः","3.2.184::अर्तिलूधूसूखनसहचर इत्रः","3.2.185::पुवः संज्ञायाम्","3.2.186::कर्तरि चर्षिदेवतयोः","3.2.187::ञीतः क्तः","3.2.188::मतिबुद्धिपूजार्थेभ्यश्च","3.3.1::उणादयो बहुलम्","3.3.2::भूतेऽपि दृश्यन्ते","3.3.3:अधिकारः:भविष्यति गम्यादयः","3.3.4::यावत्पुरानिपातयोर्लट्","3.3.5::विभाषा कदाकर्ह्योः","3.3.6::किंवृत्ते लिप्सायाम्","3.3.7::लिप्स्यमानसिद्धौ च","3.3.8::लोडर्थलक्षणे च","3.3.9::लिङ् चोर्ध्वमौहूर्तिके","3.3.10::तुमुन्ण्वुलौ क्रियायां क्रियार्थायाम्‌","3.3.11::भाववचनाश्च","3.3.12::अण् कर्मणि च","3.3.13::लृट् शेषे च","3.3.14::लृटः सद् वा","3.3.15::अनद्यतने लुट्","3.3.16::पदरुजविशस्पृशो घञ्","3.3.17::सृ स्थिरे","3.3.18:अधिकारः:भावे","3.3.19:अधिकारः:अकर्तरि च कारके संज्ञायाम्","3.3.20::परिमणाख्यायां सर्वेभ्यः","3.3.21::इङश्च","3.3.22::उपसर्गे रुवः","3.3.23::समि युद्रुदुवः","3.3.24::श्रिणीभुवोऽनुपसर्गे","3.3.25::वौ क्षुश्रुवः","3.3.26::अवोदोर्नियः","3.3.27::प्रे द्रुस्तुस्रुवः","3.3.28::निरभ्योः पूल्वोः","3.3.29::उन्न्योर्ग्रः","3.3.30::कॄ धान्ये","3.3.31::यज्ञे समि स्तुवः","3.3.32::प्रे स्त्रोऽयज्ञे","3.3.33::प्रथने वावशब्दे","3.3.34::छन्दोनाम्नि च","3.3.35::उदि ग्रहः","3.3.36::समि मुष्टौ","3.3.37::परिन्योर्नीणोर्द्यूताभ्रेषयोः","3.3.38::परावनुपात्यय इणः","3.3.39::व्युपयोः शेतेः पर्याये","3.3.40::हस्तादाने चेरस्तेये","3.3.41::निवासचितिशरीरोपसमाधानेष्वादेश्च कः","3.3.42::संघे चानौत्तराधर्ये","3.3.43::कर्मव्यतिहारे णच् स्त्रियाम्","3.3.44::अभिविधौ भाव इनुण्","3.3.45::आक्रोशेऽवन्योर्ग्रहः","3.3.46::प्रे लिप्सायाम्","3.3.47::परौ यज्ञे","3.3.48::नौ वृ धान्ये","3.3.49::उदि श्रयतियौतिपूद्रुवः","3.3.50::विभाषाऽऽङि रुप्लुवोः","3.3.51::अवे ग्रहो वर्षप्रतिबन्धे","3.3.52::प्रे वणिजाम्","3.3.53::रश्मौ च","3.3.54::वृणोतेराच्छादने","3.3.55::परौ भुवोऽवज्ञाने","3.3.56::एरच्","3.3.57::ऋदोरप्‌","3.3.58::ग्रहवृदृनिश्चिगमश्च","3.3.59::उपसर्गेऽदः","3.3.60::नौ ण च","3.3.61::व्यधजपोरनुपसर्गे","3.3.62::स्वनहसोर्वा","3.3.63::यमः समुपनिविषु","3.3.64::नौ गदनदपठस्वनः","3.3.65::क्वणो वीणायां च","3.3.66::नित्यं पणः परिमाणे","3.3.67::मदोऽनुपसर्गे","3.3.68::प्रमदसम्मदौ हर्षे","3.3.69::समुदोरजः पशुषु","3.3.70::अक्षेषु ग्लहः","3.3.71::प्रजने सर्तेः","3.3.72::ह्वः सम्प्रसारणं च न्यभ्युपविषु","3.3.73::आङि युद्धे","3.3.74::निपानमाहावः","3.3.75::भावेऽनुपसर्गस्य","3.3.76::हनश्च वधः","3.3.77::मूर्तौ घनः","3.3.78::अन्तर्घनो देशे","3.3.79::अगारैकदेशे प्रघणः प्रघाणश्च","3.3.80::उद्घनोऽत्याधानम्","3.3.81::अपघनोऽङ्गम्","3.3.82::करणेऽयोविद्रुषु","3.3.83::स्तम्बे क च","3.3.84::परौ घः","3.3.85::उपघ्न आश्रये","3.3.86::संघोद्घौ गणप्रशंसयोः","3.3.87::निघो निमितम्","3.3.88::ड्वितः क्त्रिः","3.3.89::ट्वितोऽथुच्","3.3.90::यजयाचयतविच्छप्रच्छरक्षो नङ्","3.3.91::स्वपो नन्","3.3.92::उपसर्गे घोः किः","3.3.93::कर्मण्यधिकरणे च","3.3.94:अधिकारः:स्त्रियां क्तिन्","3.3.95::स्थागापापचां भावे","3.3.96::मन्त्रे वृषेषपचमनविदभूवीरा उदात्तः","3.3.97::ऊतियूतिजूतिसातिहेतिकीर्तयश्च","3.3.98::व्रजयजोर्भावे क्यप्‌","3.3.99::संज्ञायां समजनिषदनिपतमनविदषुञ्शीङ्भृञिणः","3.3.100::कृञः श च","3.3.101::इच्छा","3.3.102::अ प्रत्ययात्‌","3.3.103::गुरोश्च हलः","3.3.104::षिद्भिदादिभ्योऽङ्","3.3.105::चिन्तिपूजिकथिकुम्बिचर्चश्च","3.3.106::आतश्चोपसर्गे","3.3.107::ण्यासश्रन्थो युच्","3.3.108::रोगाख्यायां ण्वुल् बहुलम्","3.3.109::संज्ञायाम्","3.3.110::विभाषाऽऽख्यानपरिप्रश्नयोरिञ् च","3.3.111::पर्यायार्हर्णोत्पत्तिषु ण्वुच्","3.3.112::आक्रोशे नञ्यनिः","3.3.113::कृत्यल्युटो बहुलम्","3.3.114::नपुंसके भावे क्तः","3.3.115::ल्युट् च","3.3.116::कर्मणि च येन संस्पर्शात्‌ कर्तुः शरीरसुखम्","3.3.117:अधिकारः:करणाधिकरणयोश्च","3.3.118::पुंसि संज्ञायां घः प्रायेण","3.3.119::गोचरसंचरवहव्रजव्यजापणनिगमाश्च","3.3.120::अवे तॄस्त्रोर्घञ्","3.3.121::हलश्च","3.3.122::अध्यायन्यायोद्यावसंहाराधारावयाश्च","3.3.123::उदङ्कोऽनुदके","3.3.124::जालमानायः","3.3.125::खनो घ च","3.3.126::ईषद्दुःसुषु कृच्छ्राकृच्छ्रार्थेषु खल्","3.3.127::कर्तृकर्मणोश्च भूकृञोः","3.3.128::आतो युच्","3.3.129::छन्दसि गत्यर्थेभ्यः","3.3.130::अन्येभ्योऽपि दृश्यते","3.3.131:अतिदेशः:वर्तमानसामीप्ये वर्तमानवद्वा","3.3.132::आशंसायां भूतवच्च","3.3.133::क्षिप्रवचने लृट्","3.3.134::आशंसावचने लिङ्","3.3.135:अतिदेशः:नानद्यतनवत्‌ क्रियाप्रबन्धसामीप्ययोः","3.3.136::भविष्यति मर्यादावचनेऽवरस्मिन्","3.3.137::कालविभागे चानहोरात्राणाम्","3.3.138::परस्मिन् विभाषा","3.3.139::लिङ्‌निमित्ते लृङ् क्रियाऽतिपत्तौ","3.3.140::भूते च","3.3.141::वोताप्योः","3.3.142::गर्हायां लडपिजात्वोः","3.3.143::विभाषा कथमि लिङ् च","3.3.144::किंवृत्ते लिङ्लृटौ","3.3.145::अनवकॢप्त्यमर्षयोरकिंवृत्ते अपि","3.3.146::किंकिलास्त्यर्थेषु लृट्","3.3.147::जातुयदोर्लिङ्","3.3.148::यच्चयत्रयोः","3.3.149::गर्हायां च","3.3.150::चित्रीकरणे च","3.3.151::शेषे लृडयदौ","3.3.152::उताप्योः समर्थयोर्लिङ्","3.3.153::कामप्रवेदनेऽकच्चिति","3.3.154::सम्भवानेऽलमिति चेत्‌ सिद्धाप्रयोगे","3.3.155::विभाषा धातौ सम्भावनवचनेऽयदि","3.3.156::हेतुहेतुमतोर्लिङ्","3.3.157::इच्छार्थेषु लिङ्लोटौ","3.3.158::समानकर्तृकेषु तुमुन्","3.3.159::लिङ् च","3.3.160::इच्छार्थेभ्यो विभाषा वर्तमाने","3.3.161::विधिनिमन्‍त्रणामन्‍त्रणाधीष्‍टसंप्रश्‍नप्रार्थनेषु लिङ्","3.3.162::लोट् च","3.3.163::प्रैषातिसर्गप्राप्तकालेषु कृत्याश्च","3.3.164::लिङ् चोर्ध्वमौहूर्तिके","3.3.165::स्मे लोट्","3.3.166::अधीष्टे च","3.3.167::कालसमयवेलासु तुमुन्","3.3.168::लिङ् यदि","3.3.169::अर्हे कृत्यतृचश्च","3.3.170::आवश्यकाधमर्ण्ययोर्णिनिः","3.3.171::कृत्याश्च","3.3.172::शकि लिङ् च","3.3.173::आशिषि लिङ्लोटौ","3.3.174::क्तिच्क्तौ च संज्ञायाम्","3.3.175::माङि लुङ्","3.3.176::स्मोत्तरे लङ् च","3.4.1::धातुसम्बन्धे प्रत्ययाः","3.4.2::क्रियासमभिहारे लोट्; लोटो हिस्वौ; वा च तध्वमोः","3.4.3::समुच्चयेऽन्यतरस्याम्","3.4.4::यथाविध्यनुप्रयोगः पूर्वस्मिन्","3.4.5::समुच्चये सामान्यवचनस्य","3.4.6::छन्दसि लुङ्लङ्लिटः","3.4.7::लिङर्थे लेट्","3.4.8::उपसंवादाशङ्कयोश्च","3.4.9::तुमर्थे सेसेनसेअसेन्क्सेकसेनध्यैअध्यैन्कध्यैकध्यैन्शध्यैशध्यैन्तवैतवेङ्तवेनः","3.4.10::प्रयै रोहिष्यै अव्यथिष्यै","3.4.11::दृशे विख्ये च","3.4.12::शकि णमुल्कमुलौ","3.4.13::ईश्वरे तोसुन्कसुनौ","3.4.14::कृत्यार्थे तवैकेन्केन्यत्वनः","3.4.15::अवचक्षे च","3.4.16::भावलक्षणे स्थेण्कृञ्वदिचरिहुतमिजनिभ्यस्तोसुन्","3.4.17::सृपितृदोः कसुन्","3.4.18::अलङ्खल्वोः प्रतिषेधयोः प्राचां क्त्वा","3.4.19::उदीचां माङो व्यतीहारे","3.4.20::परावरयोगे च","3.4.21::समानकर्तृकयोः पूर्वकाले","3.4.22::आभीक्ष्ण्ये णमुल् च","3.4.23::न यद्यनाकाङ्क्षे","3.4.24::विभाषाऽग्रेप्रथमपूर्वेषु","3.4.25::कर्मण्याक्रोशे कृञः खमुञ्","3.4.26::स्वादुमि णमुल्","3.4.27::अन्यथैवंकथमित्थंसु सिद्धाप्रयोगश्चेत्‌","3.4.28::यथातथयोरसूयाप्रतिवचने","3.4.29::कर्मणि दृशिविदोः साकल्ये","3.4.30::यावति विन्दजीवोः","3.4.31::चर्मोदरयोः पूरेः","3.4.32::वर्षप्रमाण ऊलोपश्चास्यान्यतरस्याम्","3.4.33::चेले क्नोपेः","3.4.34::निमूलसमूलयोः कषः","3.4.35::शुष्कचूर्णरूक्षेषु पिषः","3.4.36::समूलाकृतजीवेषु हन्कृञ्ग्रहः","3.4.37::करणे हनः","3.4.38::स्नेहने पिषः","3.4.39::हस्ते वर्त्तिग्रहोः","3.4.40::स्वे पुषः","3.4.41::अधिकरणे बन्धः","3.4.42::संज्ञायाम्","3.4.43::कर्त्रोर्जीवपुरुषयोर्नशिवहोः","3.4.44::ऊर्ध्वे शुषिपूरोः","3.4.45::उपमाने कर्मणि च","3.4.46::कषादिषु यथाविध्यनुप्रयोगः","3.4.47::उपदंशस्तृतीयायाम्","3.4.48::हिंसार्थानां च समानकर्मकाणाम्","3.4.49::सप्तम्यां चोपपीडरुधकर्षः","3.4.50::समासत्तौ","3.4.51::प्रमाणे च","3.4.52::अपादाने परीप्सायाम्","3.4.53::द्वितीयायां च","3.4.54::स्वाङ्गेऽध्रुवे","3.4.55::परिक्लिश्यमाने च","3.4.56::विशिपतिपदिस्कन्दां व्याप्यमानासेव्यमानयोः","3.4.57::अस्यतितृषोः क्रियाऽन्तरे कालेषु","3.4.58::नाम्न्यादिशिग्रहोः","3.4.59::अव्ययेऽयथाभिप्रेताख्याने कृञः क्त्वाणमुलौ","3.4.60::तिर्यच्यपवर्गे","3.4.61::स्वाङ्गे तस्प्रत्यये कृभ्वोः","3.4.62::नाधाऽर्थप्रत्यये च्व्यर्थे","3.4.63::तूष्णीमि भुवः","3.4.64::अन्वच्यानुलोम्ये","3.4.65::'शकधृषज्ञाग्लाघटरभलभक्रमसहार्हास्त्यर्थेषु तुमुन्","3.4.66::पर्याप्तिवचनेष्वलमर्थेषु","3.4.67::कर्तरि कृत्‌","3.4.68::भव्यगेयप्रवचनीयोपस्थानीयजन्याप्लाव्यापात्या वा","3.4.69::लः कर्मणि च भावे चाकर्मकेभ्यः.","3.4.70::तयोरेव कृत्यक्तखलर्थाः","3.4.71::अदिकर्मणि क्तः कर्तरि च","3.4.72::गत्यर्थाकर्मकश्लिषशीङ्स्थाऽऽसवसजनरुहजीर्यतिभ्यश्च","3.4.73::दाशगोघ्नौ सम्प्रदाने","3.4.74::भीमादयोऽपादाने","3.4.75::ताभ्यामन्यत्रोणादयः","3.4.76::क्तोऽधिकरणे च ध्रौव्यगतिप्रत्यवसानार्थेभ्यः","3.4.77:अधिकारः:लस्य","3.4.78::तिप्तस्झिसिप्थस्थमिब्वस्मस् तातांझथासाथांध्वमिड्वहिमहिङ्","3.4.79::टित आत्मनेपदानां टेरे","3.4.80::थासस्से","3.4.81::लिटस्तझयोरेशिरेच्","3.4.82::परस्मैपदानां णलतुसुस्थलथुसणल्वमाः","3.4.83::विदो लटो वा","3.4.84::ब्रुवः पञ्चानामादित आहो ब्रुवः","3.4.85:अतिदेशः:लोटो लङ्वत्‌","3.4.86::एरुः","3.4.87:अतिदेशः:सेर्ह्यपिच्च","3.4.88::वा छन्दसि","3.4.89::मेर्निः","3.4.90::आमेतः","3.4.91::सवाभ्यां वामौ","3.4.92:अतिदेशः:आडुत्तमस्य पिच्च","3.4.93::एत ऐ","3.4.94::लेटोऽडाटौ","3.4.95::आत ऐ","3.4.96::वैतोऽन्यत्र","3.4.97::इतश्च लोपः परस्मैपदेषु","3.4.98::स उत्तमस्य","3.4.99::नित्यं ङितः","3.4.100::इतश्च","3.4.101::तस्थस्थमिपां तांतंतामः","3.4.102::लिङस्सीयुट्","3.4.103::यासुट् परस्मैपदेषूदात्तो ङिच्च","3.4.104::किदाशिषि","3.4.105::झस्य रन्","3.4.106::इटोऽत्‌","3.4.107::सुट् तिथोः","3.4.108::झेर्जुस्","3.4.109::सिजभ्यस्तविदिभ्यः च","3.4.110::आतः","3.4.111::लङः शाकटायनस्यैव","3.4.112::द्विषश्च","3.4.113:संज्ञा:तिङ्शित्सार्वधातुकम्","3.4.114:संज्ञा:आर्द्धधातुकं शेषः","3.4.115:संज्ञा:लिट् च","3.4.116:संज्ञा:लिङाशिषि","3.4.117:संज्ञा:छन्दस्युभयथा","4.1.1:अधिकारः:ङ्याप्प्रातिपदिकात्‌","4.1.2::स्वौजसमौट्छष्टाभ्याम्भिस्ङेभ्याम्भ्यस्ङसिभ्याम्भ्यस्ङसोसाम्ङ्योस्सुप्‌","4.1.3:अधिकारः:स्त्रियाम्","4.1.4::अजाद्यतष्टाप्‌","4.1.5::ऋन्नेभ्यो ङीप्‌","4.1.6::उगितश्च","4.1.7::वनो र च","4.1.8::पादोऽन्यतरस्याम्","4.1.9::टाबृचि","4.1.10::न षट्स्वस्रादिभ्यः","4.1.11::मनः","4.1.12::अनो बहुव्रीहेः","4.1.13::डाबुभाभ्यामन्यतरस्याम्‌","4.1.14:अधिकारः:अनुपसर्जनात्‌","4.1.15::टिड्ढाणञ्द्वयसज्दघ्नञ्मात्रच्तयप्ठक्ठञ्कञ्क्वरपः","4.1.16::यञश्च","4.1.17::प्राचां ष्फ तद्धितः","4.1.18::सर्वत्र लोहितादिकतान्तेभ्यः","4.1.19::कौरव्यमाण्डूकाभ्यां च","4.1.20::वयसि प्रथमे","4.1.21::द्विगोः","4.1.22::अपरिमाणबिस्ताचितकम्बल्येभ्यो न तद्धितलुकि","4.1.23::काण्डान्तात्‌ क्षेत्रे","4.1.24::पुरुषात्‌ प्रमाणेऽन्यतरस्याम्","4.1.25::बहुव्रीहेरूधसो ङीष्।","4.1.26::संख्याऽव्ययादेर्ङीप्‌","4.1.27::दामहायनान्ताच्च","4.1.28::अन उपधालोपिनोन्यतरस्याम्","4.1.29::नित्यं संज्ञाछन्दसोः","4.1.30::केवलमामकभागधेयपापापरसमानार्यकृत-सुमङ्गलभेषजाच्च","4.1.31::रात्रेश्चाजसौ","4.1.32::अन्तर्वत्पतिवतोर्नुक्","4.1.33::पत्युर्नो यज्ञसंयोगे","4.1.34::विभाषा सपूर्वस्य","4.1.35::नित्यं सपत्न्य्आदिषु","4.1.36::पूतक्रतोरै च","4.1.37::वृषाकप्यग्निकुसितकुसीदानामुदात्तः","4.1.38::मनोरौ वा","4.1.39::वर्णादनुदात्तात्तोपधात्तो नः","4.1.40::अन्यतो ङीष्।","4.1.41::षिद्गौरादिभ्यश्च","4.1.42::जानपदकुण्डगोणस्थलभाजनागकालनीलकुशकामुककबराद्वृत्त्यमत्रावपनाकृत्रिमाश्राणास्थौल्यवर्णानाच्छादनायोविकारमैथुनेच्छाकेशवेशेषु","4.1.43::शोणात्‌ प्राचाम्","4.1.44::वोतो गुणवचनात्‌","4.1.45::बह्वादिभ्यश्च","4.1.46::नित्यं छन्दसि","4.1.47::भुवश्च","4.1.48::पुंयोगादाख्यायाम्","4.1.49::इन्द्रवरुणभवशर्वरुद्रमृडहिमारण्ययवयवनमातुलाचार्याणामानुक्","4.1.50::क्रीतात्‌ करणपूर्वात्‌","4.1.51::क्तादल्पाख्यायाम्","4.1.52::बहुव्रीहेश्चान्तोदात्तात्‌","4.1.53::अस्वाङ्गपूर्वपदाद्वा","4.1.54::स्वाङ्गाच्चोपसर्जनादसंयोगोपधात्‌","4.1.55::नासिकोदरौष्ठजङ्घादन्तकर्णशृङ्गाच्च","4.1.56::न क्रोडादिबह्वचः","4.1.57::सहनञ्विद्यमानपूर्वाच्च","4.1.58::नखमुखात्‌ संज्ञायाम्","4.1.59::दीर्घजिह्वी च च्छन्दसि","4.1.60::दिक्पूर्वपदान्ङीप्‌","4.1.61::वाहः","4.1.62::सख्यशिश्वीति भाषायाम्","4.1.63::जातेरस्त्रीविषयादयोपधात्‌","4.1.64::पाककर्णपर्णपुष्पफलमूलबालोत्तरपदाच्च","4.1.65::इतो मनुष्यजातेः","4.1.66::ऊङुतः","4.1.67::बाह्वन्तात्‌ संज्ञायाम्","4.1.68::पङ्गोश्च","4.1.69::ऊरूत्तरपदादौपम्ये","4.1.70::संहितशफलक्षणवामादेश्च","4.1.71::कद्रुकमण्डल्वोश्छन्दसि","4.1.72::संज्ञायाम्","4.1.73::शार्ङ्गरवाद्यञो ङीन्","4.1.74::यङश्चाप्‌","4.1.75::आवट्याच्च","4.1.76:संज्ञा; अधिकारः:तद्धिताः","4.1.77::यूनस्तिः","4.1.78::अणिञोरनार्षयोर्गुरूपोत्तमयोः ष्यङ् गोत्रे","4.1.79::गोत्रावयवात्‌","4.1.80::क्रौड्यादिभ्यश्च","4.1.81::दैवयज्ञिशौचिवृक्षिसात्यमुग्रिकाण्ठेविद्धिभ्योऽन्यतरस्याम्","4.1.82:अधिकारः:समर्थानां प्रथमाद्वा","4.1.83:अधिकारः:प्राग्दीव्यतोऽण्","4.1.84::अश्वपत्यादिभ्यश्च","4.1.85::दित्यदित्यादित्यपत्युत्तरपदाण्ण्यः","4.1.86::उत्सादिभ्योऽञ्","4.1.87::स्त्रीपुंसाभ्यां नञ्स्नञौ भवनात्‌","4.1.88::द्विगोर्लुगनपत्ये","4.1.89::गोत्रेऽलुगचि","4.1.90::यूनि लुक्","4.1.91::फक्फिञोरन्यतरस्याम्","4.1.92:अधिकारः:तस्यापत्यम्","4.1.93::एको गोत्रे","4.1.94::गोत्राद्यून्यस्त्रियाम्","4.1.95::अत इञ्","4.1.96::बाह्वादिभ्यश्च","4.1.97::सुधातुरकङ् च","4.1.98::गोत्रे कुञ्जादिभ्यश्च्फञ्","4.1.99::नडादिभ्यः फक्","4.1.100::हरितादिभ्योऽञः","4.1.101::यञिञोश्च","4.1.102::शरद्वच्छुनकदर्भाद्भृगुवत्साग्रायणेषु","4.1.103::द्रोणपर्वतजीवन्तादन्यतरयाम्","4.1.104::अनृष्यानन्तर्ये बिदादिभ्योऽञ्","4.1.105::गर्गादिभ्यो यञ्","4.1.106::मधुबभ्र्वोर्ब्राह्मणकौशिकयोः","4.1.107::कपिबोधादाङ्गिरसे","4.1.108::वतण्डाच्च","4.1.109::लुक् स्त्रियाम्","4.1.110::अश्वादिभ्यः फञ्","4.1.111::भर्गात्‌ त्रैगर्ते","4.1.112::शिवादिभ्योऽण्","4.1.113::अवृद्धाभ्यो नदीमानुषीभ्यस्तन्नामिकाभ्यः","4.1.114::ऋष्यन्धकवृष्णिकुरुभ्यश्च","4.1.115::मातुरुत्‌ संख्यासम्भद्रपूर्वायाः","4.1.116::कन्यायाः कनीन च","4.1.117::विकर्णशुङ्गच्छगलाद्वत्सभरद्वाजात्रिषु","4.1.118::पीलाया वा","4.1.119::ढक् च मण्डूकात्‌","4.1.120::स्त्रीभ्यो ढक्","4.1.121::द्व्यचः","4.1.122::इतश्चानिञः","4.1.123::शुभ्रादिभ्यश्च","4.1.124::विकर्णकुषीतकात्‌ काश्यपे","4.1.125::भ्रुवो वुक् च","4.1.126::कल्याण्यादीनामिनङ्","4.1.127::कुलटाया वा","4.1.128::चटकाया ऐरक्","4.1.129::गोधाया ढ्रक्","4.1.130::आरगुदीचाम्","4.1.131::क्षुद्राभ्यो वा","4.1.132::पितृष्वसुश्छण्","4.1.133::ढकि लोपः","4.1.134::मातृष्वसुश्च","4.1.135::चतुष्पाद्भ्यो ढञ्","4.1.136::गृष्ट्यादिभ्यश्च","4.1.137::राजश्वशुराद्यत्‌","4.1.138::क्षत्राद्घः","4.1.139::कुलात्‌ खः","4.1.140::अपूर्वपदादन्यतरस्यां यड्ढकञौ","4.1.141::महाकुलादञ्खञौ","4.1.142::दुष्कुलाड्ढक्","4.1.143::स्वसुश्छः","4.1.144::भ्रातुर्व्यच्च","4.1.145::व्यन् सपत्ने","4.1.146::रेवत्यादिभ्यष्ठक्","4.1.147::गोत्रस्त्रियाः कुत्सने ण च","4.1.148::वृद्धाट्ठक् सौवीरेषु बहुलम्","4.1.149::फेश्छ च","4.1.150::फाण्टाहृतिमिमताभ्यां णफिञौ","4.1.151::कुर्वादिभ्यो ण्यः","4.1.152::सेनान्तलक्षणकारिभ्यश्च","4.1.153::उदीचामिञ्","4.1.154::तिकादिभ्यः फिञ्","4.1.155::कौसल्यकार्मार्याभ्यां च","4.1.156::अणो द्व्यचः","4.1.157::उदीचां वृद्धादगोत्रात्‌","4.1.158::वाकिनादीनां कुक् च","4.1.159::पुत्रान्तादन्यतरस्याम्","4.1.160::प्राचामवृद्धात्‌ फिन् बहुलम्‌","4.1.161::मनोर्जातावञ्यतौ षुक् च","4.1.162:संज्ञा:अपत्यं पौत्रप्रभृति गोत्रम्‌","4.1.163:संज्ञा:जीवति तु वंश्ये युवा","4.1.164:संज्ञा:भ्रातरि च ज्यायसि","4.1.165:संज्ञा:वाऽन्यस्मिन् सपिण्डे स्थविरतरे जीवति","4.1.166::वृद्धस्य च पूजायाम्","4.1.167::यूनश्च कुत्सायाम्","4.1.168::जनपदशब्दात्‌ क्षत्रियादञ्","4.1.169::साल्वेयगान्धारिभ्यां च","4.1.170::द्व्यञ्मगधकलिङ्गसूरमसादण्","4.1.171::वृद्धेत्कोसलाजादाञ्ञ्यङ्","4.1.172::कुरुणादिभ्यो ण्यः","4.1.173::साल्वावयवप्रत्यग्रथकलकूटाश्मकादिञ्","4.1.174:संज्ञा:ते तद्राजाः","4.1.175::कम्बोजाल्लुक्","4.1.176::स्त्रियामवन्तिकुन्तिकुरुभ्यश्च","4.1.177::अतश्च","4.1.178::न प्राच्यभर्गादियौधेयादिभ्यः","4.2.1::तेन रक्तं रागात्‌","4.2.2::लाक्षारोचना{शकलकर्दमा}ट्ठक्","4.2.3::नक्षत्रेण युक्तः कालः","4.2.4::लुबविशेषे","4.2.5::संज्ञायां श्रवणाश्वत्थाभ्याम्‌","4.2.6::द्वंद्वाच्छः","4.2.7::दृष्ट्अं साम","4.2.8::कलेर्ढक्","4.2.9::वामदेवाड्ड्यड्ड्यौ","4.2.10::परिवृतो रथः","4.2.11::पाण्डुकम्बलादिनिः","4.2.12::द्वैपवैयाघ्रादञ्","4.2.13::कौमारापूर्ववचने","4.2.14::तत्रोद्धृतममत्रेभ्यः","4.2.15::स्थण्डिलाच्छयितरि व्रते","4.2.16::संस्कृतं भक्षाः","4.2.17::शूलोखाद्यत्‌","4.2.18::दध्नष्ठक्","4.2.19::उदश्वितोऽन्यतरस्याम्","4.2.20::क्षीराड्ढञ्","4.2.21::साऽस्मिन् पौर्णमासीति {संज्ञायाम्}","4.2.22::आग्रहायण्यश्वत्थाट्ठक्","4.2.23::विभाषा फाल्गुनीश्रवणाकार्त्तिकीचैत्रीभ्यः","4.2.24::साऽस्य देवता","4.2.25::कस्येत्‌","4.2.26::शुक्राद्घन्","4.2.27::अपोनप्त्रपान्नप्तृभ्यां घः","4.2.28::छ च","4.2.29::महेन्द्राद्घाणौ च","4.2.30::सोमाट्ट्यण्","4.2.31::वाय्वृतुपित्रुषसो यत्‌","4.2.32::द्यावापृथिवीशुनासीरमरुत्वदग्नीषोमवास्तोष्पतिगृहमेधाच्छ च","4.2.33::अग्नेर्ढक्","4.2.34:अतिदेशः:कालेभ्यो भववत्‌","4.2.35::महाराजप्रोष्ठपदाट्ठञ्","4.2.36::पितृव्यमातुलमातामहपितामहाः","4.2.37::तस्य समूहः","4.2.38::भिक्षाऽऽदिभ्योऽण्","4.2.39::गोत्रोक्षोष्ट्रोरभ्रराजराजन्यराजपुत्रवत्समनुष्याजाद्वुञ्","4.2.40::केदाराद्यञ् च","4.2.41::ठञ् कवचिनश्च","4.2.42::ब्राह्मणमाणववाडवाद्यन्","4.2.43::ग्रामजनबन्धुसहायेभ्यः तल्","4.2.44::अनुदात्तादेरञ्","4.2.45::खण्डिकादिभ्यश्च","4.2.46:अतिदेशः:चरणेभ्यो धर्मवत्‌","4.2.47::अचित्तहस्तिधेनोष्ठक्","4.2.48::केशाश्वाभ्यां यञ्छावन्यतरस्याम्","4.2.49::पाशादिभ्यो यः","4.2.50::खलगोरथात्‌","4.2.51::इनित्रकट्यचश्च","4.2.52::विषयो देशे","4.2.53::राजन्यादिभ्यो वुञ्","4.2.54::भौरिक्याद्यैषुकार्यादिभ्यो विधल्भक्तलौ","4.2.55::सोऽस्यादिरिति च्छन्दसः प्रगाथेषु","4.2.56::संग्रामे प्रयोजनयोद्धृभ्यः","4.2.57::तदस्यां प्रहरणमिति क्रीडायाम् णः","4.2.58::घञः साऽस्यां क्रियेति ञः","4.2.59::तदधीते तद्वेद","4.2.60::क्रतूक्थादिसूत्रान्ताट्ठक्","4.2.61::क्रमादिभ्यो वुन्","4.2.62::अनुब्राह्मणादिनिः","4.2.63::वसन्तादिभ्यष्ठक्","4.2.64::प्रोक्ताल्लुक्","4.2.65::सूत्राच्च कोपधात्‌","4.2.66::छन्दोब्राह्मणानि च तद्विषयाणि","4.2.67::तदस्मिन्नस्तीति देशे तन्नाम्नि","4.2.68::तेन निर्वृत्तम्","4.2.69::तस्य निवासः","4.2.70::अदूरभवश्च","4.2.71::ओरञ्","4.2.72::मतोश्च बह्वजङ्गात्‌","4.2.73::बह्वचः कूपेषु","4.2.74::उदक् च विपाशः","4.2.75::संकलादिभ्यश्च","4.2.76::स्त्रीषु सौवीरसाल्वप्राक्षु","4.2.77::सुवास्त्वादिभ्योऽण्","4.2.78::रोणी","4.2.79::कोपधाच्च","4.2.80::वुञ्छण्कठजिलशेनिरढञ्ण्ययफक्फिञिञ्ञ्यकक्ठकोऽरीहणकृशाश्वर्श्यकुमुदकाशतृणप्रेक्षाऽश्मसखिसंकाशबलपक्षकर्णसुतंगमप्रगदिन्वराहकुमुदादिभ्यः","4.2.81::जनपदे लुप्‌","4.2.82::वरणादिभ्यश्च","4.2.83::शर्कराया वा","4.2.84::ठक्छौ च","4.2.85::नद्यां मतुप्‌","4.2.86::मध्वादिभ्यश्च","4.2.87::कुमुदनडवेतसेभ्यो ड्मतुप्‌","4.2.88::नडशादाड्ड्वलच्","4.2.89::शिखाया वलच्","4.2.90::उत्करादिभ्यश्छः","4.2.91::नडादीनां कुक् च","4.2.92::शेषे","4.2.93::राष्ट्रावारपाराद्घखौ","4.2.94::ग्रामाद्यखञौ","4.2.95::कत्त्र्यादिभ्यो ढकञ्","4.2.96::कुलकुक्षिग्रीवाभ्यः श्वास्यलंकारेषु","4.2.97::नद्यादिभ्यो ढक्","4.2.98::दक्षिणापश्चात्पुरसस्त्यक्","4.2.99::कापिश्याः ष्फक्","4.2.100::रंकोरमनुष्येऽण् च","4.2.101::द्युप्रागपागुदक्प्रतीचो यत्‌","4.2.102::कन्थायाष्ठक्","4.2.103::वर्णौ वुक्","4.2.104::अव्ययात्त्यप्‌","4.2.105::ऐषमोह्यःश्वसोऽन्यतरस्याम्","4.2.106::तीररूप्योत्तरपदादञ्ञौ","4.2.107::दिक्पूर्वपदादसंज्ञायां ञः","4.2.108::मद्रेभ्योऽञ्","4.2.109::उदीच्यग्रामाच्च बह्वचोऽन्तोदात्तात्‌","4.2.110::प्रस्थोत्तरपदपलद्यादिकोपधादण्","4.2.111::कण्वादिभ्यो गोत्रे","4.2.112::इञश्च","4.2.113::न द्व्यचः प्राच्यभरतेषु","4.2.114::वृद्धाच्छः","4.2.115::भवतष्ठक्छसौ","4.2.116::काश्यादिभ्यष्ठञ्ञिठौ","4.2.117::वाहीकग्रामेभ्यश्च","4.2.118::विभाषोशीनरेषु","4.2.119::ओर्देशे ठञ्","4.2.120::वृद्धात्‌ प्राचाम्","4.2.121::धन्वयोपधाद्वुञ्","4.2.122::प्रस्थपुरवहान्ताच्च","4.2.123::रोपधेतोः प्राचाम्","4.2.124::जनपदतदवध्योश्च","4.2.125::अवृद्धादपि बहुवचनविषयात्‌","4.2.126::क्अच्छाग्निवक्त्रगर्त्तोत्तरपदात्‌","4.2.127::धूमादिभ्यश्च","4.2.128::नगरात्‌ कुत्सनप्रावीण्ययोः","4.2.129::अरण्यान्मनुष्ये","4.2.130::विभाषा कुरुयुगन्धराभ्याम्","4.2.131::मद्रवृज्योः कन्","4.2.132::कोपधादण्","4.2.133::कच्छादिभ्यश्च","4.2.134::मनुष्यतत्स्थयोर्वुञ्","4.2.135::अपदातौ साल्वात्‌","4.2.136::गोयवाग्वोश्च","4.2.137::गर्तोत्तरपदाच्छः","4.2.138::गहादिभ्यश्च","4.2.139::प्राचां कटादेः","4.2.140::राज्ञः क च","4.2.141::वृद्धादकेकान्तखोपधात्‌","4.2.142::कन्थापलदनगरग्रामह्रदोत्तरपदात्‌","4.2.143::पर्वताच्च","4.2.144::विभाषाऽमनुष्ये","4.2.145::कृकणपर्णाद्भारद्वाजे","4.3.1::युष्मदस्मदोरन्यतरस्यां खञ् च","4.3.2::तस्मिन् नणि च युष्माकास्माकौ","4.3.3::तवकममकावेकवचने","4.3.4::अर्धाद्यत्‌","4.3.5::परावराधमोत्तमपूर्वाच्च","4.3.6::दिक्पूर्वपदाट्ठञ् च","4.3.7::ग्रामजनपदैकदेशादञ्ठञौ","4.3.8::मध्यान्मः","4.3.9::अ साम्प्रतिके","4.3.10::द्वीपादनुसमुद्रं यञ्","4.3.11::कालाट्ठञ्","4.3.12::श्राद्धे शरदः","4.3.13::विभाषा रोगातपयोः","4.3.14::निशाप्रदोषाभ्यां च","4.3.15::श्वसस्तुट् च","4.3.16::संधिवेलाऽऽद्यृतुनक्षत्रेभ्योऽण्","4.3.17::प्रावृष एण्यः","4.3.18::वर्षाभ्यष्ठक्","4.3.19::छन्दसि ठञ्","4.3.20::वसन्ताच्च","4.3.21::हेमन्ताच्च","4.3.22::सर्वत्राण् च तलोपश्च","4.3.23::सायंचिरम्प्राह्णेप्रगेऽव्ययेभ्यष्ट्युट्युलौ तुट् च","4.3.24::विभाषा पूर्वाह्णापराह्णाभ्याम्","4.3.25::तत्र जातः","4.3.26::प्रावृषष्ठप्‌","4.3.27::संज्ञायां शरदो वुञ्","4.3.28::पूर्वाह्णापराह्णार्द्रामूलप्रदोषावस्कराद्वुन्","4.3.29::पथः पन्थ च","4.3.30::अमावास्याया वा","4.3.31::अ च","4.3.32::सिन्ध्वपकराभ्यां कन्","4.3.33::अणञौ च","4.3.34::श्रविष्ठाफल्गुन्यनुराधास्वातितिष्यपुनर्वसुहस्तविशाखाऽषाढाबहुलाल्लुक्","4.3.35::स्थानान्तगोशालखरशालाच्च","4.3.36::वत्सशालाऽभिजिदश्वयुक्छतभिषजो वा","4.3.37::नक्षत्रेभ्यो बहुलम्","4.3.38::कृतलब्धक्रीतकुशलाः","4.3.39::प्रायभवः","4.3.40::उपजानूपकर्णोपनीवेष्ठक्","4.3.41::संभूते","4.3.42::कोशाड्ढञ्","4.3.43::कालात्‌ साधुपुष्प्यत्पच्यमानेषु","4.3.44::उप्ते च","4.3.45::आश्वयुज्या वुञ्","4.3.46::ग्रीष्मवसन्तादन्यतरस्याम्","4.3.47::देयमृणे","4.3.48::कलाप्यश्वत्थयवबुसाद्वुन्","4.3.49::ग्रीष्मावरसमाद्वुञ्","4.3.50::संवत्सराग्रहायणीभ्यां ठञ् च","4.3.51::व्याहरति मृगः","4.3.52::तदस्य सोढम्","4.3.53::तत्र भवः","4.3.54::दिगादिभ्यो यत्‌","4.3.55::शरीरावयवाच्च","4.3.56::दृतिकुक्षिकलशिवस्त्यस्त्यहेर्ढञ्","4.3.57::ग्रीवाभ्योऽण् च","4.3.58::गम्भीराञ्ञ्यः","4.3.59::अव्ययीभावाच्च","4.3.60::अन्तःपूर्वपदाट्ठञ्","4.3.61::ग्रामात्‌ पर्यनुपूर्वात्‌","4.3.62::जिह्वामूलाङ्गुलेश्छः","4.3.63::वर्गान्ताच्च","4.3.64::अशब्दे यत्खावन्यतरस्याम्","4.3.65::कर्णललाटात्‌ कनलंकारे","4.3.66::तस्य व्याख्यान इति च व्याख्यातव्यनाम्नः","4.3.67::बह्वचोऽन्तोदात्ताट्ठञ्","4.3.68::क्रतुयज्ञेभ्यश्च","4.3.69::अध्यायेष्वेवर्षेः","4.3.70::पौरोडाशपुरोडाशात् ष्ठन्","4.3.71::छन्दसो यदणौ","4.3.72::द्व्यजृद्ब्राह्मणर्क्प्रथमाध्वरपुरश्चरणनामाख्याताट्ठक्","4.3.73::अणृगयनादिभ्यः","4.3.74::तत आगतः","4.3.75::ठगायस्थानेभ्यः","4.3.76::शुण्डिकादिभ्योऽण्","4.3.77::विद्यायोनिसंबन्धेभ्यो वुञ्","4.3.78::ऋतष्ठञ्","4.3.79::पितुर्यच्च","4.3.80::गोत्रादङ्कवत्‌","4.3.81::हेतुमनुष्येभ्योऽन्यतरस्यां रूप्यः","4.3.82::मयट् च","4.3.83::प्रभवति","4.3.84::विदूराञ्ञ्यः","4.3.85::तद्गच्छति पथिदूतयोः","4.3.86::अभिनिष्क्रामति द्वारम्","4.3.87::अधिकृत्य कृते ग्रन्थे","4.3.88::शिशुक्रन्दयमसभद्वंद्वेन्द्रजननादिभ्यश्छः","4.3.89::सोऽस्य निवासः","4.3.90::अभिजनश्च","4.3.91::आयुधजीविभ्यश्छः पर्वते","4.3.92::शण्डिकादिभ्यो ञ्यः","4.3.93::सिन्धुतक्षशिलाऽऽदिभ्योऽणञौ","4.3.94::तूदीशलातुरवर्मतीकूचवाराड्ढक्छण्ढञ्यकः","4.3.95::भक्तिः","4.3.96::अचित्ताददेशकालाट्ठक्","4.3.97::महाराजाट्ठञ्","4.3.98::वासुदेवार्जुनाभ्यां वुन्","4.3.99::गोत्रक्षत्रियाख्येभ्यो बहुलं वुञ्","4.3.100::जनपदिनां जनपदवत्‌ सर्वं जनपदेन समानशब्दानां बहुवचने","4.3.101::तेन प्रोक्तम्","4.3.102::तित्तिरिवरतन्तुखण्डिकोखाच्छण्","4.3.103::काश्यपकौशिकाभ्यामृषिभ्यां णिनिः","4.3.104::कलापिवैशम्पायनान्तेवासिभ्यश्च","4.3.105::पुराणप्रोक्तेषु ब्राह्मणकल्पेषु","4.3.106::शौनकादिभ्यश्छन्दसि","4.3.107::कठचरकाल्लुक्","4.3.108::कलापिनोऽण्","4.3.109::छगलिनो ढिनुक्","4.3.110::पाराशर्यशिलालिभ्यां भिक्षुनटसूत्रयोः","4.3.111::कर्मन्दकृशाश्वादिनिः","4.3.112::तेनैकदिक्","4.3.113::तसिश्च","4.3.114::उरसो यच्च","4.3.115::उपज्ञाते","4.3.116::कृते ग्रन्थे","4.3.117::संज्ञायाम्","4.3.118::कुलालादिभ्यो वुञ्","4.3.119::क्षुद्राभ्रमरवटरपादपादञ्","4.3.120::तस्येदम्","4.3.121::रथाद्यत्‌","4.3.122::पत्त्रपूर्वादञ्","4.3.123::पत्त्राध्वर्युपरिषदश्च","4.3.124::हलसीराट्ठक्","4.3.125::द्वंद्वाद्वुन् वैरमैथुनिकयोः","4.3.126::गोत्रचरणाद्वुञ्","4.3.127::संघाङ्कलक्षणेष्वञ्यञिञामण्","4.3.128::शाकलाद्वा","4.3.129::छन्दोगौक्थिकयाज्ञिकबह्वृचनटाञ्ञ्यः","4.3.130::न दण्डमाणवान्तेवासिषु","4.3.131::रैवतिकादिभ्यश्छः","4.3.132::कौपिञ्जलहास्तिपदादण्","4.3.133::आथर्वणिकस्येकलोपश्च","4.3.134::तस्य विकारः","4.3.135::अवयवे च प्राण्योषधिवृक्षेभ्यः","4.3.136::बिल्वादिभ्योऽण्","4.3.137::कोपधाच्च","4.3.138::त्रपुजतुनोः षुक्","4.3.139::ओरञ्","4.3.140::अनुदात्तादेश्च","4.3.141::पलाशादिभ्यो वा","4.3.142::शम्याष्ट्लञ्","4.3.143::मयड्वैतयोर्भाषायामभक्ष्याच्छादनयोः","4.3.144::नित्यं वृद्धशरादिभ्यः","4.3.145::गोश्च पुरीषे","4.3.146::पिष्टाच्च","4.3.147::संज्ञायां कन्","4.3.148::व्रीहेः पुरोडाशे","4.3.149::असंज्ञायां तिलयवाभ्याम्‌","4.3.150::द्व्यचश्छन्दसि","4.3.151::नोत्वद्वर्ध्रबिल्वात्‌","4.3.152::तालादिभ्योऽण्","4.3.153::जातरूपेभ्यः परिमाणे","4.3.154::प्राणिरजतादिभ्योऽञ्","4.3.155::ञितश्च तत्प्रत्ययात्‌","4.3.156::क्रीतवत्‌ परिमाणात्‌","4.3.157::उष्ट्राद्वुञ्","4.3.158::उमोर्णयोर्वा","4.3.159::एण्या ढञ्","4.3.160::गोपयसोर्यत्‌","4.3.161::द्रोश्च","4.3.162::माने वयः","4.3.163::फले लुक्","4.3.164::प्लक्षादिभ्योऽण्","4.3.165::जम्ब्वा वा","4.3.166::लुप् च","4.3.167::हरीतक्यादिभ्यश्च","4.3.168::कंसीयपरशव्ययोर्यञञौ लुक् च","4.4.1:अधिकारः:प्राग्वहतेष्ठक्","4.4.2::तेन दीव्यति खनति जयति जितम्","4.4.3::संस्कृतम्","4.4.4::कुलत्थकोपधादण्","4.4.5::तरति","4.4.6::गोपुच्छाट्ठञ्","4.4.7::नौद्व्यचष्ठन्","4.4.8::चरति","4.4.9::आकर्षात् ष्ठल्","4.4.10::पर्पादिभ्यः ष्ठन्","4.4.11::श्वगणाट्ठञ्च","4.4.12::वेतनादिभ्यो जीवति","4.4.13::वस्नक्रयविक्रयाट्ठन्","4.4.14::आयुधाच्छ च","4.4.15::हरत्युत्सङ्गादिभ्यः","4.4.16::भस्त्राऽऽदिभ्यः ष्ठन्","4.4.17::विभाषा विवधवीवधात्‌","4.4.18::अण् कुटिलिकायाः","4.4.19::निर्वृत्तेऽक्षद्यूतादिभ्यः","4.4.20::क्त्रेर्मम् नित्यं","4.4.21::अपमित्ययाचिताभ्यां कक्कनौ","4.4.22::संसृष्टे","4.4.23::चूर्णादिनिः","4.4.24::लवणाल्लुक्","4.4.25::मुद्गादण्","4.4.26::व्यञ्जनैरुपसिक्ते","4.4.27::ओजस्सहोऽम्भसा वर्तते","4.4.28::तत् प्रत्यनुपूर्वमीपलोमकूलम्","4.4.29::परिमुखं च","4.4.30::प्रयच्छति गर्ह्यम्","4.4.31::कुसीददशैकादशात्‌ ष्ठन्ष्ठचौ","4.4.32::उञ्छति","4.4.33::रक्षति","4.4.34::शब्ददर्दुरं करोति","4.4.35::पक्षिमत्स्यमृगान् हन्ति","4.4.36::परिपन्थं च तिष्ठति","4.4.37::माथोत्तरपदपदव्यनुपदं धावति","4.4.38::आक्रन्दाट्ठञ्च","4.4.39::पदोत्तरपदं गृह्णाति","4.4.40::प्रतिकण्ठार्थललामं च","4.4.41::धर्मं चरति","4.4.42::प्रतिपथमेति ठंश्च","4.4.43::समवायान् समवैति","4.4.44::परिषदो ण्यः","4.4.45::सेनाया वा","4.4.46::संज्ञायां ललाटकुक्कुट्यौ पश्यति","4.4.47::तस्य धर्म्यम्","4.4.48::अण् महिष्यादिभ्यः","4.4.49::ऋतोऽञ्","4.4.50::अवक्रयः","4.4.51::तदस्य पण्यम्","4.4.52::लवणाट्ठञ्","4.4.53::किशरादिभ्यः ष्ठन्","4.4.54::शलालुनोऽन्यतरस्याम्","4.4.55::शिल्पम्‌","4.4.56::मड्डुकझर्झरादणन्यतरस्याम्","4.4.57::प्रहरणम्","4.4.58::परश्वधाट्ठञ्च","4.4.59::शक्तियष्ट्योरीकक्","4.4.60::अस्तिनास्तिदिष्टं मतिः","4.4.61::शीलम्","4.4.62::छत्रादिभ्यो णः","4.4.63::कर्माध्ययने वृत्तम्","4.4.64::बह्वच्पूर्वपदाट्ठच्","4.4.65::हितं भक्षाः","4.4.66::तदस्मै दीयते नियुक्तम्","4.4.67::श्राणामांसौदनाट्टिठन्","4.4.68::भक्तादणन्यतरस्याम्","4.4.69::तत्र नियुक्तः","4.4.70::अगारान्ताट्ठन्","4.4.71::अध्यायिन्यदेशकालात्‌","4.4.72::कठिनान्तप्रस्तारसंस्थानेषु व्यवहरति","4.4.73::निकटे वसति","4.4.74::आवसथात् ष्ठल्","4.4.75:अधिकारः:प्राग्घिताद्यत्‌","4.4.76::तद्वहति रथयुगप्रासङ्गम्","4.4.77::धुरो यड्ढकौ","4.4.78::खः सर्वधुरात्‌","4.4.79::एकधुराल्लुक् च","4.4.80::शकटादण्","4.4.81::हलसीराट्ठक्","4.4.82::संज्ञायां जन्याः","4.4.83::विध्यत्यधनुषा","4.4.84::धनगणं लब्धा","4.4.85::अन्नाण्णः","4.4.86::वशं गतः","4.4.87::पदमस्मिन् दृश्यम्‌","4.4.88::मूलमस्याबर्हि","4.4.89::संज्ञायां धेनुष्या","4.4.90::गृहपतिना संयुक्ते ञ्यः","4.4.91::नौवयोधर्मविषमूलमूलसीतातुलाभ्यस्तार्यतुल्यप्राप्यवध्यानाम्यसमसमितसम्मितेषु","4.4.92::धर्मपथ्यर्थन्यायादनपेते","4.4.93::छन्दसो निर्मिते","4.4.94::उरसोऽण् च","4.4.95::हृदयस्य प्रियः","4.4.96::बन्धने चर्षौ","4.4.97::मतजनहलात्‌ करणजल्पकर्षेषु","4.4.98::तत्र साधुः","4.4.99::प्रतिजनादिभ्यः खञ्","4.4.100::भक्ताण्णः","4.4.101::परिषदो ण्यः","4.4.102::कथाऽऽदिभ्यष्ठक्","4.4.103::गुडादिभ्यष्ठञ्","4.4.104::पथ्यतिथिवसतिस्वपतेर्ढञ्","4.4.105::सभाया यः","4.4.106::ढश्छन्दसि","4.4.107::समानतीर्थे वासी","4.4.108::समानोदरे शयित ओ चोदात्तः","4.4.109::सोदराद्यः","4.4.110::भवे छन्दसि","4.4.111::पाथोनदीभ्यां ड्यण्","4.4.112::वेशन्तहिमवद्भ्यामण्","4.4.113::स्रोतसो विभाषा ड्यड्ड्यौ","4.4.114::सगर्भसयूथसनुताद्यन्","4.4.115::तुग्राद्घन्","4.4.116::अग्राद्यत्‌","4.4.117::घच्छौ च","4.4.118::समुद्राभ्राद्घः","4.4.119::बर्हिषि दत्तम्","4.4.120::दूतस्य भागकर्मणी","4.4.121::रक्षोयातूनां हननी","4.4.122::रेवतीजगतीहविष्याभ्यः प्रशस्ये","4.4.123::असुरस्य स्वम्","4.4.124::मायायामण्","4.4.125::तद्वानासामुपधानो मन्त्र इतीष्टकासु लुक् च मतोः","4.4.126::अश्विमानण्","4.4.127::वयस्यासु मूर्ध्नो मतुप्‌","4.4.128::मत्वर्थे मासतन्वोः","4.4.129::मधोर्ञ च","4.4.130::ओजसोऽहनि यत्खौ","4.4.131::वेशोयशआदेर्भगाद्यल्","4.4.132::ख च","4.4.133::पूर्वैः कृतमिनियौ च","4.4.134::अद्भिः संस्कृतम्","4.4.135::सहस्रेण संमितौ घः","4.4.136::मतौ च","4.4.137::सोममर्हति यः","4.4.138::मये च","4.4.139::मधोः","4.4.140::वसोः समूहे च","4.4.141::नक्षत्राद्घः","4.4.142::सर्वदेवात्‌ तातिल्","4.4.143::शिवशमरिष्टस्य करे","4.4.144::भावे च","5.1.1:अधिकारः:प्राक् क्रीताच्छः","5.1.2::उगवादिभ्योऽत्‌","5.1.3::कम्बलाच्च संज्ञायाम्","5.1.4::विभाषा हविरपूपादिभ्यः","5.1.5::तस्मै हितम्","5.1.6::शरीरावयवाद्यत्‌","5.1.7::खलयवमाषतिलवृषब्रह्मणश्च","5.1.8::अजाविभ्यां थ्यन्","5.1.9::आत्मन्विश्वजनभोगोत्तरपदात्‌ खः","5.1.10::सर्वपुरुषाभ्यां णढञौ","5.1.11::माणवचरकाभ्यां खञ्","5.1.12::तदर्थं विकृतेः प्रकृतौ","5.1.13::छदिरुपधिबलेः ढञ्","5.1.14::ऋषभोपानहोर्ञ्यः","5.1.15::चर्म्मणोऽञ्","5.1.16::तदस्य तदस्मिन् स्यादिति","5.1.17::परिखाया ढञ्","5.1.18:अधिकारः:प्राग्वतेष्ठञ्","5.1.19:अधिकारः:आर्हादगोपुच्छसंख्यापरिमाणाट्ठक्","5.1.20::असमासे निष्कादिभ्यः","5.1.21::शताच्च ठन्यतावशते","5.1.22::संख्याया अतिशदन्तायाः कन्","5.1.23::वतोरिड्वा","5.1.24::विंशतित्रिंशद्भ्यां ड्वुन्नसंज्ञायाम्‌","5.1.25::कंसाट्टिठन्","5.1.26::शूर्पादञन्यतरस्याम्","5.1.27::शतमानविंशतिकसहस्रवसनादण्","5.1.28::अध्यर्धपूर्वद्विगोर्लुगसंज्ञायाम्","5.1.29::विभाषा कार्षापणसहस्राभ्याम्","5.1.30::द्वित्रिपूर्वान्निष्कात्‌","5.1.31::बिस्ताच्च","5.1.32::विंशतिकात्‌ खः","5.1.33::खार्या ईकन्","5.1.34::पणपादमाषशतादत्‌","5.1.35::शाणाद्वा","5.1.36::द्वित्रिपूर्वादण् च","5.1.37::तेन क्रीतम्","5.1.38::तस्य निमित्तं संयोगोत्पातौ","5.1.39::गोद्व्यचोरसंख्यापरिमाणाश्वादेर्यत्‌","5.1.40::पुत्राच्छ च","5.1.41::सर्वभूमिपृथिवीभ्यामणञौ","5.1.42::तस्येश्वरः","5.1.43::तत्र विदित इति च","5.1.44::लोकसर्वलोकाट्ठञ्","5.1.45::तस्य वापः","5.1.46::पात्रात् ष्ठन्","5.1.47::तदस्मिन् वृद्ध्यायलाभशुल्कोपदा दीयते","5.1.48::पूरणार्धाट्ठन्","5.1.49::भागाद्यच्च","5.1.50::तद्धरति वहत्यावहति भाराद्वंशादिभ्यः","5.1.51::वस्नद्रव्याभ्यां ठन्कनौ","5.1.52::सम्भवत्यवहरति पचति","5.1.53::आढकाचितपात्रात्‌ खोऽन्यतरयाम्","5.1.54::द्विगोष्ठंश्च","5.1.55::कुलिजाल्लुक्खौ च","5.1.56::सोऽस्यांशवस्नभृतयः","5.1.57::तदस्य परिमाणम्","5.1.58::संख्यायाः संज्ञासंघसूत्राध्ययनेषु","5.1.59::पङ्क्तिविंशतित्रिंशत्चत्वारिंशत्पञ्चाशत्षष्टिसप्तत्यशीतिनवतिशतम्","5.1.60::पञ्चद्दशतौ वर्गे वा","5.1.61::सप्तनोऽञ् छन्दसि","5.1.62::त्रिंशच्चत्वारिंशतोर्ब्राह्मणे संज्ञायां डण्","5.1.63::तद् अर्हति","5.1.64::छेदादिभ्यो नित्यम्","5.1.65::शीर्षच्छेदाद्यच्च","5.1.66::दण्डादिभ्यः","5.1.67::छन्दसि च","5.1.68::पात्राद्घंश्च","5.1.69::कडङ्गरदक्षिणाच्छ च","5.1.70::स्थालीबिलात्‌","5.1.71::यज्ञर्त्विग्भ्यां घखञौ","5.1.72::पारायणतुरायणचान्द्रायणं वर्तयति","5.1.73::संशयमापन्नः","5.1.74::योजनं गच्छति","5.1.75::पथः ष्कन्","5.1.76::पन्थो ण नित्यम्","5.1.77::उत्तरपथेनाहृतं च","5.1.78:अधिकारः:कालात्‌","5.1.79::तेन निर्वृत्तम्","5.1.80::तमधीष्टो भृतो भूतो भावी","5.1.81::मासाद्वयसि यत्खञौ","5.1.82::द्विगोर्यप्‌","5.1.83::षण्मासाण्ण्यच्च","5.1.84::अवयसि ठंश्च","5.1.85::समायाः खः","5.1.86::द्विगोर्वा","5.1.87::रात्र्यहस्संवत्सराच्च","5.1.88::वर्षाल्लुक् च","5.1.89::चित्तवति नित्यम्","5.1.90::षष्टिकाः षष्टिरात्रेण पच्यन्ते","5.1.91::वत्सरान्ताच्छश्छन्दसि","5.1.92::सम्परिपूर्वात्‌ ख च","5.1.93::तेन परिजय्यलभ्यकार्यसुकरम्","5.1.94::तदस्य ब्रह्मचर्यम्","5.1.95::तस्य च दक्षिणा यज्ञाख्येभ्यः","5.1.96::तत्र च दीयते कार्यं भववत्‌","5.1.97::व्युष्टादिभ्योऽण्","5.1.98::तेन यथाकथाचहस्ताभ्यां णयतौ","5.1.99::सम्पादिनि","5.1.100::कर्मवेषाद्यत्","5.1.101::तस्मै प्रभवति संतापादिभ्यः","5.1.102::योगाद्यच्च","5.1.103::कर्मण उकञ्","5.1.104::समयस्तदस्य प्राप्तम्","5.1.105::ऋतोरण्","5.1.106::छन्दसि घस्","5.1.107::कालाद्यत्‌","5.1.108::प्रकृष्टे ठञ्","5.1.109::प्रयोजनम्","5.1.110::विशाखाऽऽषाढादण् मन्थदण्डयोः","5.1.111::अनुप्रवचनादिभ्यश्छः","5.1.112::समापनात्‌ सपूर्वपदात्‌","5.1.113::ऐकागारिकट् चौरे","5.1.114::आकालिकडाद्यन्तवचने","5.1.115::तेन तुल्यं क्रिया चेद्वतिः","5.1.116::तत्र तस्येव","5.1.117::तदर्हम्","5.1.118::उपसर्गाच्छन्दसि धात्वर्थे","5.1.119::तस्य भावस्त्वतलौ","5.1.120:अधिकारः:आ च त्वात्‌","5.1.121::न नञ्पूर्वात्तत्पुरुषादचतुरसंगतलवणवटयुधकतरसलसेभ्यः","5.1.122::पृथ्वादिभ्य इमनिज्वा","5.1.123::वर्णदृढादिभ्यः ष्यञ् च","5.1.124::गुणवचनब्राह्मणादिभ्यः कर्मणि च","5.1.125::स्तेनाद्यन्नलोपश्च","5.1.126::सख्युर्यः","5.1.127::कपिज्ञात्योर्ढक्","5.1.128::पत्यन्तपुरोहितादिभ्यो यक्","5.1.129::प्राणभृज्जातिवयोवचनोद्गात्रादिभ्योऽञ्","5.1.130::हायनान्तयुवादिभ्योऽण्","5.1.131::इगन्ताच्च लघुपूर्वात्‌","5.1.132::योपधाद्गुरूपोत्तमाद्वुञ्","5.1.133::द्वंद्वमनोज्ञादिभ्यश्च","5.1.134::गोत्रचरणाच्श्लाघाऽत्याकारतदवेतेषु","5.1.135::होत्राभ्यश्छः","5.1.136::ब्रह्मणस्त्वः","5.2.1::धान्यानां भवने क्षेत्रे खञ्","5.2.2::व्रीहिशाल्योर्ढक्","5.2.3::यवयवकषष्टिकादत्‌","5.2.4::विभाषा तिलमाषोमाभङ्गाऽणुभ्यः","5.2.5::सर्वचर्मणः कृतः खखञौ","5.2.6::यथामुखसंमुखस्य दर्शनः खः","5.2.7::तत्सर्वादेः पथ्यङ्गकर्मपत्रपात्रं व्याप्नोति","5.2.8::आप्रपदं प्राप्नोति","5.2.9::अनुपदसर्वान्नायानयं बद्धाभक्षयतिनेयेषु","5.2.10::परोवरपरम्परपुत्रपौत्रमनुभवति","5.2.11::अवारपारात्यन्तानुकामं गामी","5.2.12::समांसमां विजायते","5.2.13::अद्यश्वीनाऽवष्टब्धे","5.2.14::आगवीनः","5.2.15::अनुग्वलंगामी","5.2.16::अध्वनो यत्खौ","5.2.17::अभ्यमित्राच्छ च","5.2.18::गोष्ठात्‌ खञ् भूतपूर्वे","5.2.19::अश्वस्यैकाहगमः","5.2.20::शालीनकौपीने अधृष्टाकार्ययोः","5.2.21::व्रातेन जीवति","5.2.22::साप्तपदीनं सख्यम्","5.2.23::हैयंगवीनं संज्ञायाम्","5.2.24::तस्य पाकमूले पील्वदिकर्णादिभ्यः कुणब्जाहचौ","5.2.25::पक्षात्तिः","5.2.26::तेन वित्तश्चुञ्चुप्चणपौ","5.2.27::विनञ्भ्यां नानाञौ नसह","5.2.28::वेः शालच्छङ्कटचौ","5.2.29::सम्प्रोदश्च कटच्","5.2.30::अवात्‌ कुटारच्च","5.2.31::नते नासिकायाः संज्ञायां टीटञ्नाटज्भ्राटचः","5.2.32::नेर्बिडज्बिरीसचौ","5.2.33::इनच्पिटच्चिकचि च","5.2.34::उपाधिभ्यां त्यकन्नासन्नारूढयोः","5.2.35::कर्मणि घटोऽठच्","5.2.36::तदस्य संजातं तारकाऽऽदिभ्य इतच्","5.2.37::प्रमाणे द्वयसज्दघ्नञ्मात्रचः","5.2.38::पुरुषहस्तिभ्यामण् च","5.2.39::यद्तदेतेभ्यः परिमाणे वतुप्‌","5.2.40::किमिदंभ्यां वो घः","5.2.41::किमः संख्यापरिमाणे डति च","5.2.42::संख्याया अवयवे तयप्‌","5.2.43::द्वित्रिभ्यां तयस्यायज्वा","5.2.44::उभादुदात्तो नित्यम्","5.2.45::तदस्मिन्नधिकमिति दशान्ताड्डः","5.2.46::शदन्तविंशतेश्च","5.2.47::संख्याया गुणस्य निमाने मयट्","5.2.48::तस्य पूरणे डट्","5.2.49::नान्तादसंख्याऽऽदेर्मट्","5.2.50::थट् च च्छन्दसि","5.2.51::षट्कतिकतिपयचतुरां थुक्","5.2.52::बहुपूगगणसंघस्य तिथुक्","5.2.53::वतोरिथुक्","5.2.54::द्वेस्तीयः","5.2.55::त्रेः सम्प्रसारणम् च","5.2.56::विंशत्यादिभ्यस्तमडन्यतरस्याम्","5.2.57::नित्यं शतादिमासार्धमाससंवत्सराच्च","5.2.58::षष्ट्यादेश्चासंख्याऽऽदेः","5.2.59::मतौ च्छः सूक्तसाम्नोः","5.2.60::अध्यायानुवाकयोर्लुक्","5.2.61::विमुक्तादिभ्योऽण्","5.2.62::गोषदादिभ्यो वुन्","5.2.63::तत्र कुशलः पथः","5.2.64::आकर्षादिभ्यः कन्","5.2.65::धनहिरण्यात्‌ कामे","5.2.66::स्वाङ्गेभ्यः प्रसिते","5.2.67::उदराट्ठगाद्यूने","5.2.68::सस्येन परिजातः","5.2.69::अंशं हारी","5.2.70::तन्त्रादचिरापहृते","5.2.71::ब्राह्मणकोष्णिके संज्ञायाम्","5.2.72::शीतोष्णाभ्यां कारिणि","5.2.73::अधिकम्","5.2.74::अनुकाभिकाभीकः कमिता","5.2.75::पार्श्वेनान्विच्छति","5.2.76::अयःशूलदण्डाजिनाभ्यां ठक्ठञौ","5.2.77::तावतिथं ग्रहणमिति लुग्वा","5.2.78::स एषां ग्रामणीः","5.2.79::शृङ्खलमस्य बन्धनं करभे","5.2.80::उत्क उन्मनाः","5.2.81::कालप्रयोजनाद्रोगे","5.2.82::तदस्मिन्नन्नं प्राये संज्ञायाम्‌","5.2.83::कुल्माषादञ्","5.2.84::श्रोत्रियंश्छन्दोऽधीते","5.2.85::श्राद्धमनेन भुक्तमिनिठनौ","5.2.86::पूर्वादिनिः","5.2.87::सपूर्वाच्च","5.2.88::इष्टादिभ्यश्च","5.2.89::छन्दसि परिपन्थिपरिपरिणौ पर्यवस्थातरि","5.2.90::अनुपद्यन्वेष्टा","5.2.91::साक्षाद्द्रष्टरि संज्ञायाम्","5.2.92::क्षेत्रियच् परक्षेत्रे चिकित्स्यः","5.2.93::'इन्द्रियमिन्द्रलिंगमिन्द्रदृष्टमिन्द्रसृष्टमिन्द्रजुष्टम्इन्द्रदत्तमिति वा","5.2.94::तदस्यास्त्यस्मिन्निति मतुप्‌","5.2.95::रसादिभ्यश्च","5.2.96::प्राणिस्थादातो लजन्यतरस्याम्","5.2.97::सिध्मादिभ्यश्च","5.2.98::वत्सांसाभ्यां कामबले","5.2.99::फेनादिलच् च","5.2.100::लोमादिपामादिपिच्छादिभ्यः शनेलचः","5.2.101::प्रज्ञाश्रद्धाऽर्चावृत्तिभ्यो णः","5.2.102::तपःसहस्राभ्यां विनीनी","5.2.103::अण् च","5.2.104::सिकताशर्कराभ्यां च","5.2.105::देशे लुबिलचौ च","5.2.106::दन्त उन्नत उरच्","5.2.107::ऊषसुषिमुष्कमधो रः","5.2.108::द्युद्रुभ्यां मः","5.2.109::केशाद्वोऽन्यतरस्याम्","5.2.110::गाण्ड्यजगात्‌ संज्ञायाम्","5.2.111::काण्डाण्डादीरन्नीरचौ","5.2.112::रजःकृष्यासुतिपरिषदो वलच्","5.2.113::दन्तशिखात्‌ संज्ञायाम्","5.2.114::ज्योत्स्नातमिस्राशृङ्गिणोजस्विन्नूर्जस्वलगोमिन्मलिनमलीमसाः","5.2.115::अत इनिठनौ","5.2.116::व्रीह्यादिभ्यश्च","5.2.117::तुन्दादिभ्य इलच् च","5.2.118::एकगोपूर्वाट्ठञ् नित्यम्","5.2.119::शतसहस्रान्ताच्च निष्कात्‌","5.2.120::रूपादाहतप्रशंसयोरप्‌","5.2.121::अस्मायामेधास्रजो विनिः","5.2.122::बहुलं छन्दसि","5.2.123::ऊर्णाया युस्","5.2.124::वाचो ग्मिनिः","5.2.125::आलजाटचौ बहुभाषिणि","5.2.126::स्वामिन्नैश्वर्ये","5.2.127::अर्शआदिभ्योऽच्","5.2.128::द्वंद्वोपतापगर्ह्यात्‌ प्राणिस्थादिनिः","5.2.129::वातातिसाराभ्यां कुक् च","5.2.130::वयसि पूरणात्‌","5.2.131::सुखादिभ्यश्च","5.2.132::धर्मशीलवर्णान्ताच्च","5.2.133::हस्ताज्जातौ","5.2.134::वर्णाद्ब्रह्मचारिणि","5.2.135::पुष्करादिभ्यो देशे","5.2.136::बलादिभ्यो मतुबन्यतरस्याम्","5.2.137::संज्ञायां मन्माभ्याम्.ह्","5.2.138::कंशंभ्यां बभयुस्तितुतयसः","5.2.139::तुन्दिवलिवटेर्भः","5.2.140::अहंशुभमोर्युस्","5.3.1:संज्ञा:प्राग्दिशो विभक्तिः","5.3.2:अधिकारः:किंसर्वनामबहुभ्योऽद्व्यादिभ्यः","5.3.3::इदम इश्","5.3.4::एतेतौ रथोः","5.3.5::एतदोऽश्","5.3.6::सर्वस्य सोऽन्यतरस्यां दि","5.3.7::पञ्चम्यास्तसिल्","5.3.8::तसेश्च","5.3.9::पर्यभिभ्यां च","5.3.10::सप्तम्यास्त्रल्","5.3.11::इदमो हः","5.3.12::किमोऽत्‌","5.3.13::वा ह च च्छन्दसि","5.3.14::इतराभ्योऽपि दृश्यन्ते","5.3.15::सर्वैकान्यकिंयत्तदः काले दा","5.3.16::इदमो र्हिल्","5.3.17::अधुना","5.3.18::दानीं च","5.3.19::तदो दा च","5.3.20::तयोर्दार्हिलौ च च्छन्दसि","5.3.21::अनद्यतने र्हिलन्यतरस्याम्","5.3.22::सद्यःपरुत्परार्यैषमःपरेद्यव्यद्यपूर्वेद्युरन्येद्युरन्यतरेद्युरितरेद्युरपरेद्युरधरेद्युरुभयेद्युरुत्तरेद्युः","5.3.23::प्रकारवचने थाल्","5.3.24::इदमस्थमुः","5.3.25::किमश्च","5.3.26::था हेतौ च च्छन्दसि","5.3.27::दिक्‌शब्देभ्यः सप्तमीपञ्चमीप्रथमाभ्यो दिग्देशकालेष्वस्तातिः","5.3.28::दक्षिणोत्तराभ्यामतसुच्","5.3.29::विभाषा परावराभ्याम्","5.3.30::अञ्चेर्लुक्","5.3.31::उपर्युपरिष्टात्‌","5.3.32::पश्चात्‌","5.3.33::पश्च पश्चा च च्छन्दसि","5.3.34::उत्तराधरदक्षिणादातिः","5.3.35::एनबन्यतरस्यामदूरेऽपञ्चम्याः","5.3.36::दक्षिणादाच्","5.3.37::आहि च दूरे","5.3.38::उत्तराच्च","5.3.39::पूर्वाधरावराणामसि पुरधवश्चैषाम्‌","5.3.40::अस्ताति च","5.3.41::विभाषाऽवरस्य","5.3.42::संख्याया विधाऽर्थे धा","5.3.43::अधिकरणविचाले च","5.3.44::एकाद्धो ध्यमुञन्यारयाम्","5.3.45::द्वित्र्योश्च धमुञ्","5.3.46::एधाच्च","5.3.47::याप्ये पाशप्‌","5.3.48::पूरणाद्भागे तीयादन्","5.3.49::प्रागेकादशभ्योऽच्छन्दसि","5.3.50::षष्ठाष्टमाभ्यां ञ च","5.3.51::मानपश्वङ्गयोः कन्लुकौ च","5.3.52::एकादाकिनिच्चासहाये","5.3.53::भूतपूर्वे चरट्","5.3.54::षष्ठ्या रूप्य च","5.3.55::अतिशायने तमबिष्ठनौ","5.3.56::तिङश्च","5.3.57::द्विवचनविभज्योपपदे तरबीयसुनौ","5.3.58::अजादी गुणवचनादेव","5.3.59::तुश्छन्दसि","5.3.60::प्रशस्यस्य श्रः","5.3.61::ज्य च","5.3.62::वृद्धस्य च","5.3.63::अन्तिकबाढयोर्नेदसाधौ","5.3.64::युवाल्पयोः कनन्यतरस्याम्","5.3.65::विन्मतोर्लुक्","5.3.66::प्रशंसायां रूपप्‌","5.3.67::ईषदसमाप्तौ कल्पब्देश्यदेशीयरः","5.3.68::विभाषा सुपो बहुच् पुरस्तात्तु","5.3.69::प्रकारवचने जातीयर्।","5.3.70:अधिकारः:प्रागिवात्कः","5.3.71::अव्ययसर्वनाम्नामकच् प्राक् टेः","5.3.72::कस्य च दः","5.3.73::अज्ञाते","5.3.74::कुत्सिते","5.3.75::संज्ञायां कन्","5.3.76::अनुकम्पायाम्","5.3.77::नीतौ च तद्युक्तात्‌","5.3.78::बह्वचो मनुष्यनाम्नष्ठज्वा","5.3.79::घनिलचौ च","5.3.80::प्राचामुपादेरडज्वुचौ च","5.3.81::जातिनाम्नः कन्","5.3.82::अजिनान्तस्योत्तरपदलोपश्च","5.3.83::ठाजादावूर्ध्वं द्वितीयादचः","5.3.84::शेवलसुपरिविशालवरुणार्यमादीनां तृतीयात्‌","5.3.85::अल्पे","5.3.86::ह्रस्वे","5.3.87::संज्ञायां कन्","5.3.88::कुटीशमीशुण्डाभ्यो रः","5.3.89::कुत्वा डुपच्","5.3.90::कासूगोणीभ्यां ष्टरच्","5.3.91::वत्सोक्षाश्वर्षभेभ्यश्च तनुत्वे","5.3.92::किंयत्तदो निर्द्धारणे द्वयोरेकस्य डतरच्","5.3.93::वा बहूनां जातिपरिप्रश्ने डतमच्","5.3.94::एकाच्च प्राचाम्","5.3.95::अवक्षेपणे कन्","5.3.96::इवे प्रतिकृतौ","5.3.97::संज्ञायां च","5.3.98::लुम्मनुष्ये","5.3.99::जीविकाऽर्थे चापण्ये","5.3.100::देवपथादिभ्यश्च","5.3.101::वस्तेर्ढञ्","5.3.102::शिलाया ढः","5.3.103::शाखाऽऽदिभ्यो यत्‌","5.3.104::द्रव्यं च भव्ये","5.3.105::कुशाग्राच्छः","5.3.106::समासाच्च तद्विषयात्‌","5.3.107::शर्कराऽऽदिभ्योऽण्","5.3.108::अङ्गुल्यादिभ्यष्ठक्","5.3.109::एकशालायाष्ठजन्यतरस्याम्","5.3.110::कर्कलोहितादीकक्","5.3.111::प्रत्नपूर्वविश्वेमात्थाल् छन्दसि","5.3.112::पूगाञ्ञ्योऽग्रामणीपूर्वात्‌","5.3.113::व्रातच्फञोरस्त्रियाम्","5.3.114::आयुधजीविसंघाञ्ञ्यड्वाहीकेष्वब्राह्मणराजन्यात्‌","5.3.115::वृकाट्टेण्यण्","5.3.116::दामन्यादित्रिगर्तषष्ठाच्छः","5.3.117::पर्श्वादियौधेयादिभ्यामणञौ","5.3.118::'अभिजिद्विदभृच्छालावच्छिखावच्छमीवदूर्णावच्छ्रुमदणो यञ्","5.3.119:संज्ञा:ञ्य्आदयस्तद्राजाः","5.4.1::पादशतस्य संख्याऽऽदेर्वीप्सायां वुन् लोपश्च","5.4.2::दण्डव्यवसर्गयोश्च","5.4.3::स्थूलादिभ्यः प्रकारवचने कन्","5.4.4::अनत्यन्तगतौ क्तात्‌","5.4.5::न सामिवचने","5.4.6::बृहत्या आच्छादने","5.4.7::अषडक्षाशितङ्ग्वलंकर्मालम्पुरुषाध्युत्तरपदात्‌ खः","5.4.8::विभाषा अञ्चेरदिक्स्त्रियाम्","5.4.9::जात्यन्ताच्छ बन्धुनि","5.4.10::स्थानान्ताद्विभाषा सस्थानेनेति चेत्‌","5.4.11::किमेत्तिङव्ययघादाम्वद्रव्यप्रकर्षे","5.4.12::अमु च च्छन्दसि","5.4.13::अनुगादिनष्ठक्","5.4.14::णचः स्त्रियामञ्","5.4.15::अणिनुणः","5.4.16::विसारिणो मत्स्ये","5.4.17::संख्यायाः क्रियाऽभ्यावृत्तिगणने कृत्वसुच्","5.4.18::द्वित्रिचतुर्भ्यः सुच्","5.4.19::एकस्य सकृच्च","5.4.20::विभाषा बहोर्धाऽविप्रकृष्टकाले","5.4.21::तत्प्रकृतवचने मयट्","5.4.22:अतिदेशः:समूहवच्च बहुषु","5.4.23::अनन्तावसथेतिहभेषजाञ्ञ्यः","5.4.24::देवतान्तात्तादर्थ्ये यत्‌","5.4.25::पादार्घाभ्यां च","5.4.26::अतिथेर्ञ्यः","5.4.27::देवात्तल्","5.4.28::अवेः कः","5.4.29::यावादिभ्यः कन्","5.4.30::लोहितान्मणौ","5.4.31::वर्णे चानित्ये","5.4.32::रक्ते","5.4.33::कालाच्च","5.4.34::विनयादिभ्यष्ठक्","5.4.35::वाचो व्याहृतार्थायाम्","5.4.36::तद्युक्तात्‌ कर्मणोऽण्","5.4.37::ओषधेरजातौ","5.4.38::प्रज्ञादिभ्यश्च","5.4.39::मृदस्तिकन्","5.4.40::सस्नौ प्रशंसायाम्","5.4.41::वृकज्येष्ठाभ्यां तिल्तातिलौ च च्छन्दसि","5.4.42::बह्वल्पार्थाच्छस् कारकादन्यतरस्याम्","5.4.43::संख्यैकवचनाच्च वीप्सायाम्","5.4.44::प्रतियोगे पञ्चम्यास्तसिः","5.4.45::अपादाने चाहीयरुहोः","5.4.46::अतिग्रहाव्यथनक्षेपेष्वकर्तरि तृतीयायाः","5.4.47::हीयमानपापयोगाच्च","5.4.48::षष्ठ्या व्याश्रये","5.4.49::रोगाच्चापनयने","5.4.50::अभूततद्भावे कृभ्वस्तियोगे सम्पद्यकर्तरि च्विः","5.4.51::अरुर्मनश्चक्षुश्चेतोरहोरजसां लोपश्च","5.4.52::विभाषा साति कार्त्स्न्ये","5.4.53::अभिविधौ सम्पदा च","5.4.54::तदधीनवचने","5.4.55::देये त्रा च","5.4.56::देवमनुष्यपुरुषमर्त्येभ्यो द्वितीयासप्तम्योर्बहुलम्","5.4.57::अव्यक्तानुकरणाद्द्व्यजवरार्धादनितौ डाच्","5.4.58::कृञो द्वितीयतृतीयशम्बबीजात्‌ कृषौ","5.4.59::संख्यायाश्च गुणान्तायाः","5.4.60::समयाच्च यापनायाम्","5.4.61::सपत्त्रनिष्पत्रादतिव्यथने","5.4.62::निष्कुलान्निष्कोषणे","5.4.63::सुखप्रियादानुलोम्ये","5.4.64::दुःखात्‌ प्रातिलोम्ये","5.4.65::शूलात्‌ पाके","5.4.66::सत्यादशपथे","5.4.67::मद्रात्‌ परिवापणे","5.4.68:अधिकारः:समासान्ताः","5.4.69::न पूजनात्‌","5.4.70::किमः क्षेपे","5.4.71::नञस्तत्पुरुषात्‌","5.4.72::पथो विभाषा","5.4.73::बहुव्रीहौ संख्येये डजबहुगणात्‌","5.4.74::ऋक्पूरप्धूःपथामानक्षे","5.4.75::अच्‌ प्रत्यन्ववपूर्वात्‌ सामलोम्नः","5.4.76::अक्ष्णोऽदर्शनात्‌","5.4.77::अचतुरविचतुरसुचतुरस्त्रीपुंसधेन्वनडुहर्क्सामवाङ्मनसाक्षिभ्रुवदारगवोर्वष्ठीवपदष्ठीवनक्तंदिवरत्रिंदिवाहर्दिवसरजसनिःश्रेयसपुरुषायुषद्व्यायुषत्र्यायुषर्ग्यजुषजातोक्षमहोक्षवृद्धोक्षोपशुनगोष्ठश्वाः","5.4.78::ब्रह्महस्तिभ्याम् वर्च्चसः","5.4.79::अवसमन्धेभ्यस्तमसः","5.4.80::श्वसो वसीयःश्रेयसः","5.4.81::अन्ववतप्ताद्रहसः","5.4.82::प्रतेरुरसः सप्तमीस्थात्‌","5.4.83::अनुगवमायामे","5.4.84::द्विस्तावा त्रिस्तावा वेदिः","5.4.85::उपसर्गादध्वनः","5.4.86::तत्पुरुषस्याङ्गुलेः संख्याऽव्ययादेः","5.4.87::अहस्सर्वैकदेशसंख्यातपुण्याच्च रात्रेः","5.4.88::अह्नोऽह्न एतेभ्यः","5.4.89::न संख्याऽऽदेः समाहारे","5.4.90::उत्तमैकाभ्यां च","5.4.91::राजाऽहस्सखिभ्यष्टच्‌","5.4.92::गोरतद्धितलुकि","5.4.93::अग्राख्यायामुरसः","5.4.94::अनोऽश्मायस्सरसाम् जातिसंज्ञयोः","5.4.95::ग्रामकौटाभ्यां च तक्ष्णः","5.4.96::अतेः शुनः","5.4.97::उपमानादप्राणिषु","5.4.98::उत्तरमृगपूर्वाच्च सक्थ्नः","5.4.99::नावो द्विगोः","5.4.100::अर्धाच्च","5.4.101::खार्याः प्राचाम्","5.4.102::द्वित्रिभ्यामञ्जलेः","5.4.103::अनसन्तान्नपुंसकाच्छन्दसि","5.4.104::ब्रह्मणो जानपदाख्यायाम्","5.4.105::कुमहद्भ्यामन्यतरस्याम्‌","5.4.106::द्वंद्वाच्चुदषहान्तात् समाहारे","5.4.107::अव्ययीभावे शरत्प्रभृतिभ्यः","5.4.108::अनश्च","5.4.109::नपुंसकादन्यतर्अस्याम्","5.4.110::नदीपौर्णमास्याग्रहायणीभ्यः","5.4.111::झयः","5.4.112::गिरेश्च सेनकस्य","5.4.113::बहुव्रीहौ सक्थ्यक्ष्णोः स्वाङ्गात्‌ षच्","5.4.114::अङ्गुलेर्दारुणि","5.4.115::द्वित्रिभ्यां ष मूर्ध्नः","5.4.116::अप् पूरणीप्रमाण्योः","5.4.117::अन्तर्बहिर्भ्यां च लोम्नः","5.4.118::अञ्नासिकायाः संज्ञायां नसं चास्थूलात्‌","5.4.119::उपसर्गाच्च","5.4.120::सुप्रातसुश्वसुदिवशारिकुक्षचतुरश्रैणीपदाजपदप्रोष्ठपदाः","5.4.121::नञ्दुःसुभ्यो हलिसक्थ्योरन्यतरस्याम्","5.4.122::नित्यमसिच् प्रजामेधयोः","5.4.123::बहुप्रजाश्छन्दसि","5.4.124::धर्मादनिच् केवलात्‌","5.4.125::जम्भा सुहरिततृणसोमेभ्यः","5.4.126::दक्षिणेर्मा लुब्धयोगे","5.4.127::इच् कर्मव्यतिहारे","5.4.128::द्विदण्ड्यादिभ्यश्च","5.4.129::प्रसम्भ्यां जानुनोर्ज्ञुः","5.4.130::ऊर्ध्वाद्विभाषा","5.4.131::ऊधसोऽनङ्","5.4.132::धनुषश्च","5.4.133::वा संज्ञायाम्","5.4.134::जायाया निङ्","5.4.135::गन्धस्येदुत्पूतिसुसुरभिभ्यः","5.4.136::अल्पाख्यायाम्","5.4.137::उपमानाच्च","5.4.138::पादस्य लोपोऽहस्त्यादिभ्यः","5.4.139::कुम्भपदीषु च","5.4.140::संख्यासुपूर्वस्य","5.4.141::वयसि दन्तस्य दतृ","5.4.142::छन्दसि च","5.4.143::स्त्रियां संज्ञायाम्","5.4.144::विभाषा श्यावारोकाभ्याम्","5.4.145::अग्रान्तशुद्धशुभ्रवृषवराहेभ्यश्च","5.4.146::ककुदस्यावस्थायां लोपः","5.4.147::त्रिककुत् पर्वते","5.4.148::उद्विभ्यां काकुदस्य","5.4.149::पूर्णाद्विभाषा","5.4.150::सुहृद्दुर्हृदौ मित्रामित्रयोः","5.4.151::उरःप्रभृतिभ्यः कप्‌","5.4.152::इनः स्त्रियाम्","5.4.153::नद्यृतश्च","5.4.154::शेषाद्विभाषा","5.4.155::न संज्ञायाम्","5.4.156::ईयसश्च","5.4.157::वन्दिते भ्रातुः","5.4.158::ऋतश्छन्दसि","5.4.159::नाडीतन्त्र्योः स्वाङ्गे","5.4.160::निष्प्रवाणिश्च","6.1.1::एकाचो द्वे प्रथमस्य","6.1.2::अजादेर्द्वितीयस्य","6.1.3::न न्द्राः संयोगादयः","6.1.4:संज्ञा:पूर्वोऽभ्यासः","6.1.5:संज्ञा:उभे अभ्यस्तम्","6.1.6::जक्षित्यादयः षट्","6.1.7::तुजादीनां दीर्घोऽभ्यासस्य","6.1.8::लिटि धातोरनभ्यासस्य","6.1.9::सन्यङोः","6.1.10::श्लौ","6.1.11::चङि","6.1.12::दाश्वान् साह्वान् मीढ्वांश्च","6.1.13::ष्यङः सम्प्रसारणं पुत्रपत्योस्तत्पुरुषे","6.1.14::बन्धुनि बहुव्रीहौ","6.1.15::वचिस्वपियजादीनां किति","6.1.16::ग्रहिज्यावयिव्यधिवष्टिविचतिवृश्चतिपृच्छतिभृज्जतीनां ङिति च","6.1.17::लिट्यभ्यासस्योभयेषाम्","6.1.18::स्वापेश्चङि","6.1.19::स्वपिस्यमिव्येञां यङि","6.1.20::न वशः","6.1.21::चायः की","6.1.22::स्फायः स्फी निष्ठायाम्","6.1.23::स्त्यः प्रपूर्वस्य","6.1.24::द्रवमूर्तिस्पर्शयोः श्यः","6.1.25::प्रतेश्च","6.1.26::विभाषाऽभ्यवपूर्वस्य","6.1.27::शृतं पाके","6.1.28::प्यायः पी","6.1.29::लिड्यङोश्च","6.1.30::विभाषा श्वेः","6.1.31::णौ च संश्चङोः","6.1.32::ह्वः सम्प्रसारणम्","6.1.33::अभ्यस्तस्य च","6.1.34::बहुलं छन्दसि","6.1.35::चायः की","6.1.36::अपस्पृधेथामानृचुरानृहुश्चिच्युषेतित्याजश्राताःश्रितमाशीराशीर्त्तः","6.1.37::न सम्प्रसारणे सम्प्रसारणम्","6.1.38::लिटि वयो यः","6.1.39::वश्चास्यान्यतरस्याम् किति","6.1.40::वेञः","6.1.41::ल्यपि च","6.1.42::ज्यश्च","6.1.43::व्यश्च","6.1.44::विभाषा परेः","6.1.45::आदेच उपदेशेऽशिति","6.1.46::न व्यो लिटि","6.1.47::स्फुरतिस्फुलत्योर्घञि","6.1.48::क्रीङ्जीनां णौ","6.1.49::सिध्यतेरपारलौकिके","6.1.50::मीनातिमिनोतिदीङां ल्यपि च","6.1.51::विभाषा लीयतेः","6.1.52::खिदेश्छन्दसि","6.1.53::अपगुरो णमुलि","6.1.54::चिस्फुरोर्णौ","6.1.55::प्रजने वीयतेः","6.1.56::बिभेतेर्हेतुभये","6.1.57::नित्यं स्मयतेः","6.1.58::सृजिदृशोर्झल्यमकिति","6.1.59::अनुदात्तस्य चर्दुपधस्यान्यतरस्याम्","6.1.60::शीर्षंश्छन्दसि","6.1.61::ये च तद्धिते","6.1.62::अचि शीर्षः","6.1.63::पद्दन्नोमास्हृन्निशसन्यूषन्दोषन्यकञ्छकन्नुदन्नासञ्छस्प्रभृतिषु","6.1.64::धात्वादेः षः सः","6.1.65::णो नः","6.1.66::लोपो व्योर्वलि","6.1.67::वेरपृक्तस्य","6.1.68::हल्ङ्याब्भ्यो दीर्घात्‌ सुतिस्यपृक्तं हल्","6.1.69::एङ्ह्रस्वात्‌ सम्बुद्धेः","6.1.70::शेश्छन्दसि बहुलम्","6.1.71:अधिकारः:ह्रस्वस्य पिति कृति तुक्","6.1.72::संहितायाम्","6.1.73::छे च","6.1.74::आङ्माङोश्च","6.1.75::दीर्घात्‌","6.1.76::पदान्ताद्वा","6.1.77::इको यणचि","6.1.78::एचोऽयवायावः","6.1.79::वान्तो यि प्रत्यये","6.1.80::धातोस्तन्निमित्तस्यैव","6.1.81::क्षय्यजय्यौ शक्यार्थे","6.1.82::क्रय्यस्तदर्थे","6.1.83:अधिकारः:भय्यप्रवय्ये च च्छन्दसि","6.1.84::एकः पूर्वपरयोः","6.1.85:अतिदेशः:अन्तादिवच्च","6.1.86:अतिदेशः:षत्वतुकोरसिद्धः","6.1.87::आद्गुणः","6.1.88::वृद्धिरेचि","6.1.89::एत्येधत्यूठ्सु","6.1.90::आटश्च","6.1.91::उपसर्गादृति धातौ","6.1.92::वा सुप्यापिशलेः","6.1.93::औतोऽम्शसोः","6.1.94::एङि पररूपम्","6.1.95::ओमाङोश्च","6.1.96::उस्यपदान्तात्‌","6.1.97::अतो गुणे","6.1.98::अव्यक्तानुकरणस्यात इतौ","6.1.99::नाम्रेडितस्यान्त्यस्य तु वा","6.1.100::नित्यमाम्रेडिते डाचि","6.1.101::अकः सवर्णे दीर्घः","6.1.102::प्रथमयोः पूर्वसवर्णः","6.1.103::तस्माच्छसो नः पुंसि","6.1.104::नादिचि","6.1.105::दीर्घाज्जसि च","6.1.106::वा छन्दसि","6.1.107::अमि पूर्वः","6.1.108::सम्प्रसारणाच्च","6.1.109::एङः पदान्तादति","6.1.110::ङसिङसोश्च","6.1.111::ऋत उत्‌","6.1.112::ख्यत्यात्‌ परस्य","6.1.113::अतो रोरप्लुतादप्लुते","6.1.114::हशि च","6.1.115::प्रकृत्याऽन्तःपादमव्यपरे","6.1.116::अव्यादवद्यादवक्रमुरव्रतायमवन्त्ववस्युषु च","6.1.117::यजुष्युरः","6.1.118::आपोजुषाणोवृष्णोवर्षिष्ठेऽम्बेऽम्बालेऽम्बिकेपूर्वे","6.1.119::अङ्ग इत्यादौ च","6.1.120::अनुदात्ते च कुधपरे","6.1.121::अवपथासि च","6.1.122::सर्वत्र विभाषा गोः","6.1.123::अवङ् स्फोटायनस्य","6.1.124::इन्द्रे च {नित्यम्}","6.1.125::प्लुतप्रगृह्या अचि नित्यम्","6.1.126::आङोऽनुनासिकश्छन्दसि","6.1.127::इकोऽसवर्णे शाकल्यस्य ह्रस्वश्च","6.1.128::ऋत्यकः","6.1.129:अतिदेशः:अप्लुतवदुपस्थिते","6.1.130::ई३ चाक्रवर्मणस्य","6.1.131::दिव उत्‌","6.1.132::एतत्तदोः सुलोपोऽकोरनञ्समासे हलि","6.1.133:अधिकारः:स्यश्छन्दसि बहुलम्","6.1.134::सोऽचि लोपे चेत्‌ पादपूरणम्","6.1.135::सुट् कात्‌ पूर्वः","6.1.136::अडभ्यासव्यवायेऽपि","6.1.137::सम्पर्युपेभ्यः करोतौ भूषणे","6.1.138::समवाये च","6.1.139::उपात्‌ प्रतियत्नवैकृतवाक्याध्याहारेषु","6.1.140::किरतौ लवने","6.1.141::हिंसायां प्रतेश्च","6.1.142::अपाच्चतुष्पाच्छकुनिष्वालेखने","6.1.143::कुस्तुम्बुरूणि जातिः","6.1.144::अपरस्पराः क्रियासातत्ये","6.1.145::गोष्पदं सेवितासेवितप्रमाणेषु","6.1.146::आस्पदं प्रतिष्ठायाम्‌","6.1.147::आश्चर्यमनित्ये","6.1.148::वर्चस्केऽवस्करः","6.1.149::अपस्करो रथाङ्गम्","6.1.150::विष्किरः शकुनिर्विकरो वा","6.1.151::ह्रस्वाच्चन्द्रोत्तरपदे मन्त्रे","6.1.152::प्रतिष्कशश्च कशेः","6.1.153::प्रस्कण्वहरिश्चन्द्रावृषी","6.1.154::मस्करमस्करिणौ वेणुपरिव्राजकयोः","6.1.155::कास्तीराजस्तुन्दे नगरे","6.1.156::कारस्करो वृक्षः","6.1.157::पारस्करप्रभृतीनि च संज्ञायाम्","6.1.158:परिभाषा:अनुदात्तं पदमेकवर्जम्‌","6.1.159::कर्षात्वतो घञोऽन्त उदात्तः","6.1.160::उञ्छादीनां च","6.1.161::अनुदात्तस्य च यत्रोदात्तलोपः","6.1.162::धातोः","6.1.163::चितः","6.1.164::तद्धितस्य","6.1.165::कितः","6.1.166::तिसृभ्यो जसः","6.1.167::चतुरः शसि","6.1.168::सावेकाचस्तृतीयाऽऽदिविभक्तिः","6.1.169::अन्तोदत्तादुत्तरपदादन्यतरस्यामनित्यसमासे","6.1.170::अञ्चेश्छन्दस्यसर्वनामस्थानम्","6.1.171::ऊडिदम्पदाद्यप्पुम्रैद्युभ्यः","6.1.172::अष्टनो दीर्घात्‌","6.1.173::शतुरनुमो नद्यजादी","6.1.174::उदात्तयणो हल्पूर्वात्‌","6.1.175::नोङ्धात्वोः","6.1.176::ह्रस्वनुड्भ्यां मतुप्‌","6.1.177::नामन्यतरस्याम्‌","6.1.178::ङ्याश्छन्दसि बहुलम्","6.1.179::षट्त्रिचतुर्भ्यो हलादिः","6.1.180::झल्युपोत्तमम्","6.1.181::विभाषा भाषायाम्","6.1.182::न गोश्वन्त्साववर्णराडङ्क्रुङ्कृद्भ्यः","6.1.183::दिवो झल्","6.1.184::नृ चान्यतरस्याम्","6.1.185::तित्स्वरितम्","6.1.186::तास्यनुदात्तेन्ङिददुपदेशाल्लसार्वधातुकमनुदात्तमहन्विङोः","6.1.187::आदिः सिचोऽन्यतरस्याम्","6.1.188::स्वपादिर्हिंसामच्यनिटि","6.1.189::अभ्यस्तानामादिः","6.1.190::अनुदात्ते च","6.1.191::सर्वस्य सुपि","6.1.192::भीह्रीभृहुमदजनधनदरिद्राजागरां प्रत्ययात् पूर्वम् पिति","6.1.193::लिति","6.1.194::आदिर्णमुल्यन्यतरस्याम्","6.1.195::अचः कर्तृयकि","6.1.196::थलि च सेटीडन्तो वा","6.1.197::ञ्णित्यादिर्नित्यम्","6.1.198::आमन्त्रितस्य च","6.1.199::पथिमथोः सर्वनामस्थाने","6.1.200::अन्तश्च तवै युगपत्‌","6.1.201::क्षयो निवासे","6.1.202::जयः करणम्","6.1.203::वृषादीनां च","6.1.204::संज्ञायामुपमानम्‌","6.1.205::निष्ठा च द्व्यजनात्‌","6.1.206::शुष्कधृष्टौ","6.1.207::आशितः कर्ता","6.1.208::रिक्ते विभाषा","6.1.209::जुष्टार्पिते च छन्दसि","6.1.210::नित्यं मन्त्रे","6.1.211::युष्मदस्मदोर्ङसि","6.1.212::ङयि च","6.1.213::यतोऽनावः","6.1.214::ईडवन्दवृशंसदुहां ण्यतः","6.1.215::विभाषा वेण्विन्धानयोः","6.1.216::त्यागरागहासकुहश्वठक्रथानाम्","6.1.217::उपोत्तमं रिति","6.1.218::चङ्यन्यतरस्याम्","6.1.219::मतोः पूर्वमात्‌ संज्ञायां स्त्रियाम्‌","6.1.220::अन्तोऽवत्याः","6.1.221::ईवत्याः","6.1.222::चौ","6.1.223::समासस्य","6.2.1::बहुव्रीहौ प्रकृत्या पूर्वपदम्","6.2.2::तत्पुरुषे तुल्यार्थतृतीयासप्तम्युपमानाव्ययद्वितीयाकृत्याः","6.2.3::वर्णः वर्णेष्वनेते","6.2.4::गाधलवणयोः प्रमाणे","6.2.5::दायाद्यं दायादे","6.2.6::प्रतिबन्धि चिरकृच्छ्रयोः","6.2.7::पदेऽपदेशे","6.2.8::निवाते वातत्राणे","6.2.9::शारदेअनार्तवे","6.2.10::अध्वर्युकषाययोर्जातौ","6.2.11::सदृशप्रतिरूपयोः सादृश्ये","6.2.12::द्विगौ प्रमाणे","6.2.13::गन्तव्यपण्यं वाणिजे","6.2.14::मात्रोपज्ञोपक्रमच्छाये नपुंसके","6.2.15::सुखप्रिययोर्हिते","6.2.16::प्रीतौ च","6.2.17::स्वं स्वामिनि","6.2.18::पत्यावैश्वर्ये","6.2.19::न भूवाक्चिद्दिधिषु","6.2.20::वा भुवनम्","6.2.21::आशङ्काबाधनेदीयस्सु संभावने","6.2.22::पूर्वे भूतपूर्वे","6.2.23::सविधसनीडसमर्यादसवेशसदेशेषु सामीप्ये","6.2.24::विस्पष्टादीनि गुणवचनेषु","6.2.25::श्रज्याऽवमकन्पापवत्सु भावे कर्मधारये","6.2.26::कुमारश्च","6.2.27::आदिः प्रत्येनसि","6.2.28::पूगेष्वन्यतरस्याम्","6.2.29::इगन्तकालकपालभगालशरावेषु द्विगौ","6.2.30::बह्वन्यतरस्याम्","6.2.31::दिष्टिवितस्त्योश्च","6.2.32::सप्तमी सिद्धशुष्कपक्वबन्धेष्वकालात्‌","6.2.33::परिप्रत्युपापा वर्ज्यमानाहोरात्रावयवेषु","6.2.34::राजन्यबहुवचनद्वंद्वेऽन्धकवृष्णिषु","6.2.35::संख्या","6.2.36::आचार्योपसर्जनश्चान्तेवासी","6.2.37::कार्तकौजपादयश्च","6.2.38::महान् व्रीह्यपराह्णगृष्टीष्वासजाबालभारभारतहैलिहिलरौरवप्रवृद्धेषु","6.2.39::क्षुल्लकश्च वैश्वदेवे","6.2.40::उष्ट्रः सादिवाम्योः","6.2.41::गौः सादसादिसारथिषु","6.2.42::कुरुगार्हपतरिक्तगुर्वसूतजरत्यश्लीलदृढरूपापारेवडवातैतिलकद्रूःपण्यकम्बलो दासीभाराणां च","6.2.43::चतुर्थी तदर्थे","6.2.44::अर्थे","6.2.45::क्ते च","6.2.46::कर्मधारयेऽनिष्ठा","6.2.47::अहीने द्वितीया","6.2.48::तृतीया कर्मणि","6.2.49::गतिरनन्तरः","6.2.50::तादौ च निति कृत्यतौ","6.2.51::तवै चान्तश्च युगपत्‌","6.2.52::अनिगन्तोऽञ्चतौ वप्रत्यये","6.2.53::न्यधी च","6.2.54::ईषदन्यतरस्याम्","6.2.55::हिरण्यपरिमाणं धने","6.2.56::प्रथमोऽचिरोपसम्पत्तौ","6.2.57::कतरकतमौ कर्मधारये","6.2.58::आर्यो ब्राह्मणकुमारयोः","6.2.59::राजा च","6.2.60::षष्ठी प्रत्येनसि","6.2.61::क्ते नित्यार्थे","6.2.62::ग्रामः शिल्पिनि","6.2.63::राजा च प्रशंसायाम्","6.2.64:अधिकारः:आदिरुदात्तः","6.2.65::सप्तमीहारिणौ धर्म्येऽहरणे","6.2.66::युक्ते च","6.2.67::विभाषाऽध्यक्षे","6.2.68::पापं च शिल्पिनि","6.2.69::गोत्रान्तेवासिमाणवब्राह्मणेषु क्षेपे","6.2.70::अङ्गानि मैरेये","6.2.71::भक्ताख्यास्तदर्थेषु","6.2.72::गोबिडालसिंहसैन्धवेषूपमाने","6.2.73::अके जीविकाऽर्थे","6.2.74::प्राचां क्रीडायाम्","6.2.75::अणि नियुक्ते","6.2.76::शिल्पिनि चाकृञः","6.2.77::संज्ञायां च","6.2.78::गोतन्तियवं पाले","6.2.79::णिनि","6.2.80::उपमानं शब्दार्थप्रकृतावेव","6.2.81::युक्तारोह्यादयश्च","6.2.82::दीर्घकाशतुषभ्राष्ट्रवटं जे","6.2.83::अन्त्यात्‌ पूर्वं बह्वचः","6.2.84::ग्रामेऽनिवसन्तः","6.2.85::घोषादिषु","6.2.86::छात्र्यादयः शालायाम्","6.2.87::प्रस्थेऽवृद्धमकर्क्यादीनाम्‌","6.2.88::मालाऽऽदीनां च","6.2.89::अमहन्नवं नगरेऽनुदीचाम्","6.2.90::अर्मे चावर्णं द्व्यच्त्र्यच्","6.2.91::न भूताधिकसंजीवमद्राश्मकज्जलम्","6.2.92:अधिकारः:अन्तः","6.2.93::सर्वं गुणकार्त्स्न्ये","6.2.94::संज्ञायां गिरिनिकाययोः","6.2.95::कुमार्यां वयसि","6.2.96::उदकेऽकेवले","6.2.97::द्विगौ क्रतौ","6.2.98::सभायां नपुंसके","6.2.99::पुरे प्राचाम्","6.2.100::अरिष्टगौडपूर्वे च","6.2.101::न हास्तिनफलकमार्देयाः","6.2.102::कुसूलकूपकुम्भशालं बिले","6.2.103::दिक्‌शब्दा ग्रामजनपदाख्यानचानराटेषु","6.2.104::आचार्योपसर्जनश्चान्तेवासिनि","6.2.105::उत्तरपदवृद्धौ सर्वं च","6.2.106::बहुव्रीहौ विश्वं संज्ञयाम्","6.2.107::उदराश्वेषुषु","6.2.108::क्षेपे","6.2.109::नदी बन्धुनि","6.2.110::निष्ठोपसर्गपूर्वमन्यतरस्याम्‌","6.2.111:अधिकारः:उत्तरपदादिः","6.2.112::कर्णो वर्णलक्षणात्‌","6.2.113::संज्ञौपम्ययोश्च","6.2.114::कण्ठपृष्ठग्रीवाजंघं च","6.2.115::शृङ्गमवस्थायां च","6.2.116::नञो जरमरमित्रमृताः","6.2.117::सोर्मनसी अलोमोषसी","6.2.118::क्रत्वादयश्च","6.2.119::आद्युदात्तं द्व्यच् छन्दसि","6.2.120::वीरवीर्यौ च","6.2.121::कूलतीरतूलमूलशालाऽक्षसममव्ययीभावे","6.2.122::कंसमन्थशूर्पपाय्यकाण्डं द्विगौ","6.2.123::तत्पुरुषे शालायां नपुंसके","6.2.124::कन्था च","6.2.125::आदिश्चिहणादीनाम्","6.2.126::चेलखेटकटुककाण्डं गर्हायाम्","6.2.127::चीरमुपमानम्‌","6.2.128::पललसूपशाकं मिश्रे","6.2.129::कूलसूदस्थलकर्षाः संज्ञायाम्","6.2.130::अकर्मधारये राज्यम्","6.2.131::वर्ग्यादयश्च","6.2.132::पुत्रः पुंभ्यः","6.2.133::नाचार्यराजर्त्विक्संयुक्तज्ञात्याख्येभ्यः","6.2.134::चूर्णादीन्यप्राणिषष्ठ्याः","6.2.135::षट् च काण्डादीनि","6.2.136::कुण्डं वनम्","6.2.137::प्रकृत्या भगालम्","6.2.138::शितेर्नित्याबह्वज्बहुव्रीहावभसत्‌","6.2.139::गतिकारकोपपदात्‌ कृत्‌","6.2.140::उभे वनस्पत्यादिषु युगपत्‌","6.2.141::देवताद्वंद्वे च","6.2.142::नोत्तरपदेऽनुदात्तादावपृथिवीरुद्रपूषमन्थिषु","6.2.143:अधिकारः:अन्तः","6.2.144::थाथघञ्क्ताजबित्रकाणाम्","6.2.145::सूपमानात्‌ क्तः","6.2.146::संज्ञायामनाचितादीनाम्‌","6.2.147::प्रवृद्धादीनां च","6.2.148::कारकाद्दत्तश्रुतयोरेवाशिषि","6.2.149::इत्थम्भूतेन कृतमिति च","6.2.150::अनो भावकर्मवचनः","6.2.151::मन्क्तिन्व्याख्यानशयनासनस्थानयाजकादिक्रीताः","6.2.152::सप्तम्याः पुण्यम्","6.2.153::ऊनार्थकलहं तृतीयायाः","6.2.154::मिश्रं चानुपसर्गमसंधौ","6.2.155::नञो गुणप्रतिषेधे सम्पाद्यर्हहितालमर्थास्तद्धिताः","6.2.156::ययतोश्चातदर्थे","6.2.157::अच्कावशक्तौ","6.2.158::आक्रोशे च","6.2.159::संज्ञायाम्","6.2.160::कृत्योकेष्णुच्चार्वादयश्च","6.2.161::विभाषा तृन्नन्नतीक्ष्णशुचिषु","6.2.162::बहुव्रीहाविदमेतत्तद्भ्यः प्रथमपूरणयोः क्रियागणने","6.2.163::संख्यायाः स्तनः","6.2.164::विभाषा छन्दसि","6.2.165::संज्ञायां मित्राजिनयोः","6.2.166::व्यवायिनोऽन्तरम्","6.2.167::मुखं स्वाङ्गम्","6.2.168::नाव्ययदिक्‌शब्दगोमहत्स्थूलमुष्टिपृथुवत्सेभ्यः","6.2.169::निष्ठोपमानादन्यतरस्याम्","6.2.170::जातिकालसुखादिभ्योऽनाच्छादनात्‌ क्तोऽकृतमितप्रतिपन्नाः","6.2.171::वा जाते","6.2.172::नञ्सुभ्याम्","6.2.173::कपि पूर्वम्","6.2.174::ह्रस्वान्तेऽन्त्यात्‌ पूर्वम्","6.2.175::बहोर्नञ्वदुत्तरपदभूम्नि","6.2.176::न गुणादयोऽवयवाः","6.2.177::उपसर्गात्‌ स्वाङ्गं ध्रुवमपर्शु","6.2.178::वनं समासे","6.2.179::अन्तः","6.2.180::अन्तश्च","6.2.181::न निविभ्याम्","6.2.182::परेरभितोभाविमण्डलम्","6.2.183::प्रादस्वाङ्गं संज्ञायाम्","6.2.184::निरुदकादीनि च","6.2.185::अभेर्मुखम्","6.2.186::अपाच्च","6.2.187::स्फिगपूतवीणाऽञ्जोऽध्वकुक्षिसीरनामनाम च","6.2.188::अधेरुपरिस्थम्","6.2.189::अनोरप्रधानकनीयसी","6.2.190::पुरुषश्चान्वादिष्टः","6.2.191::अतेरकृत्पदे","6.2.192::नेरनिधाने","6.2.193::प्रतेरंश्वादयस्तत्पुरुषे","6.2.194::उपाद् द्व्यजजिनमगौरादयः","6.2.195::सोरवक्षेपणे","6.2.196::विभाषोत्पुच्छे","6.2.197::द्वित्रिभ्यां पाद्दन्मूर्धसु बहुव्रीहौ","6.2.198::सक्थं चाक्रान्तात्‌","6.2.199::परादिश्छन्दसि बहुलम्","6.3.1::अलुगुत्तरपदे","6.3.2::पञ्चम्याः स्तोकादिभ्यः","6.3.3::ओजःसहोऽम्भस्तमसः तृतीयायाः","6.3.4::मनसः संज्ञायाम्","6.3.5::आज्ञायिनि च","6.3.6::आत्मनश्च पूरणे","6.3.7::वैयाकरणाख्यायां चतुर्थ्याः","6.3.8::परस्य च","6.3.9::हलदन्तात्‌ सप्तम्याः संज्ञायाम्","6.3.10::कारनाम्नि च प्राचां हलादौ","6.3.11::मध्याद्गुरौ","6.3.12::अमूर्धमस्तकात्‌ स्वाङ्गादकामे","6.3.13::बन्धे च विभाषा","6.3.14::तत्पुरुषे कृति बहुलम्","6.3.15::प्रावृट्शरत्कालदिवां जे","6.3.16::विभाषा वर्षक्षरशरवरात्‌","6.3.17::घकालतनेषु कालनाम्नः","6.3.18::शयवासवासिषु अकालात्‌","6.3.19::नेन्सिद्धबध्नातिषु","6.3.20::स्थे च भाषायाम्","6.3.21::षष्ठ्या आक्रोशे","6.3.22::पुत्रेऽन्यतरस्याम्","6.3.23::ऋतो विद्यायोनिसम्बन्धेभ्यः","6.3.24::विभाषा स्वसृपत्योः","6.3.25::आनङ् ऋतो द्वंद्वे","6.3.26::देवताद्वंद्वे च","6.3.27::ईदग्नेः सोमवरुणयोः","6.3.28::इद्वृद्धौ","6.3.29::दिवो द्यावा","6.3.30::दिवसश्च पृथिव्याम्","6.3.31::उषासोषसः","6.3.32::मातरपितरावुदीचाम्","6.3.33::पितरामातरा च च्छन्दसि","6.3.34:अतिदेशः:स्त्रियाः पुंवद्भाषितपुंस्कादनूङ् समानाधिकरणे स्त्रियामपूरणीप्रियाऽऽदिषु","6.3.35:अतिदेशः:तसिलादिषु आकृत्वसुचः","6.3.36:अतिदेशः:क्यङ्मानिनोश्च","6.3.37:अतिदेशः:न कोपधायाः","6.3.38:अतिदेशः:संज्ञापूरण्योश्च","6.3.39:अतिदेशः:वृद्धिनिमित्तस्य च तद्धितस्यारक्तविकारे","6.3.40:अतिदेशः:स्वाङ्गाच्चेतोऽमानिनि","6.3.41:अतिदेशः:जातेश्च","6.3.42:अतिदेशः:पुंवत्‌ कर्मधारयजातीयदेशीयेषु","6.3.43::घरूपकल्पचेलड्ब्रुवगोत्रमतहतेषु ङ्योऽनेकाचो ह्रस्वः","6.3.44::नद्याः शेषस्यान्यतरस्याम्","6.3.45::उगितश्च","6.3.46::आन्महतः समानाधिकरणजातीययोः","6.3.47::द्व्यष्टनः संख्यायामबहुव्रीह्यशीत्योः","6.3.48::त्रेस्त्रयः","6.3.49::विभाषा चत्वारिंशत्प्रभृतौ सर्वेषाम्","6.3.50::हृदयस्य हृल्लेखयदण्लासेषु","6.3.51::वा शोकष्यञ्रोगेषु","6.3.52::पादस्य पदाज्यातिगोपहतेषु","6.3.53::पद् यत्यतदर्थे","6.3.54::हिमकाषिहतिषु च","6.3.55::ऋचः शे","6.3.56::वा घोषमिश्रशब्देषु","6.3.57::उदकस्योदः संज्ञायाम्","6.3.58::पेषंवासवाहनधिषु च","6.3.59::एकहलादौ पूरयितव्येऽन्यतरस्याम्","6.3.60::मन्थौदनसक्तुबिन्दुवज्रभारहारवीवधगाहेषु च","6.3.61::इको ह्रस्वोऽङ्यो गालवस्य","6.3.62::एक तद्धिते च","6.3.63::ङ्यापोः संज्ञाछन्दसोर्बहुलम्","6.3.64::त्वे च","6.3.65::इष्टकेषीकामालानां चिततूलभारिषु","6.3.66::खित्यनव्ययस्य","6.3.67::अरुर्द्विषदजन्तस्य मुम्","6.3.68:अतिदेशः:इच एकाचोऽम्प्रत्ययवच्च","6.3.69::वाचंयमपुरंदरौ च","6.3.70::कारे सत्यागदस्य","6.3.71::श्येनतिलस्य पाते ञे","6.3.72::रात्रेः कृति विभाषा","6.3.73::नलोपो नञः","6.3.74::तस्मान्नुडचि","6.3.75::नभ्राण्नपान्नवेदानासत्यानमुचिनकुलनखनपुंसकनक्षत्रनक्रनाकेषु प्रकृत्या","6.3.76::एकादिश्चैकस्य चादुक्","6.3.77::नगोऽप्राणिष्वन्यतरस्याम्","6.3.78::सहस्य सः संज्ञायाम्","6.3.79::ग्रन्थान्ताधिके च","6.3.80::द्वितीये चानुपाख्ये","6.3.81::अव्ययीभावे चाकाले","6.3.82::वोपसर्जनस्य","6.3.83::प्रकृत्याऽऽशिष्यगोवत्सहलेषु","6.3.84::समानस्य छन्दस्यमूर्धप्रभृत्युदर्केषु","6.3.85::ज्योतिर्जनपदरात्रिनाभिनामगोत्ररूपस्थानवर्णवयोवचनबन्धुषु","6.3.86::चरणे ब्रह्मचारिणि","6.3.87::तीर्थे ये","6.3.88::विभाषोदरे","6.3.89::दृग्दृशवतुषु","6.3.90::इदङ्किमोरीश्की","6.3.91::आ सर्वनाम्नः","6.3.92::विष्वग्देवयोश्च टेरद्र्यञ्चतौ वप्रत्यये","6.3.93::समः समि","6.3.94::तिरसस्तिर्यलोपे","6.3.95::सहस्य सध्रिः","6.3.96::सध मादस्थयोश्छन्दसि","6.3.97::द्व्यन्तरुपसर्गेभ्योऽप ईत्‌","6.3.98::ऊदनोर्देशे","6.3.99::अषष्ठ्यतृतीयास्थस्यान्यस्य दुगाशिराशाऽऽस्थाऽऽस्थितोत्सुकोतिकारकरागच्छेषु","6.3.100::अर्थे विभाषा","6.3.101::कोः कत्‌ तत्पुरुषेऽचि","6.3.102::रथवदयोश्च","6.3.103::तृणे च जातौ","6.3.104::का पथ्यक्षयोः","6.3.105::ईषदर्थे","6.3.106::विभाषा पुरुषे","6.3.107::कवं चोष्णे","6.3.108::पथि च च्छन्दसि","6.3.109::पृषोदरादीनि यथोपदिष्टम्","6.3.110::संख्याविसायपूर्वस्याह्नस्याहन्नन्यतरस्यां ङौ","6.3.111::ढ्रलोपे पूर्वस्य दीर्घोऽणः","6.3.112::सहिवहोरोदवर्णस्य","6.3.113::साढ्यै साढ्वा साढेति निगमे","6.3.114:अधिकारः:संहितायाम्","6.3.115::कर्णे लक्षणस्याविष्टाष्टपञ्चमणिभिन्नछिन्नछिद्रस्रुवस्वस्तिकस्य","6.3.116::नहिवृतिवृषिव्यधिरुचिसहितनिषु क्वौ","6.3.117::वनगिर्योः संज्ञायां कोटरकिंशुलकादीनाम्","6.3.118::वले","6.3.119::मतौ बह्वचोऽनजिरादीनाम्","6.3.120::शरादीनां च","6.3.121::इकः वहे अपीलोः","6.3.122::उपसर्गस्य घञ्यमनुष्ये बहुलम्","6.3.123::इकः काशे","6.3.124::दस्ति","6.3.125::अष्टनः संज्ञायाम्","6.3.126::छन्दसि च","6.3.127::चितेः कपि","6.3.128::विश्वस्य वसुराटोः","6.3.129::नरे संज्ञायाम्","6.3.130::मित्रे चर्षौ","6.3.131::मन्त्रे सोमाश्वेन्द्रियविश्वदेव्यस्य मतौ","6.3.132::ओषधेश्च विभक्तावप्रथमायाम्","6.3.133::ऋचि तुनुघमक्षुतङ्कुत्रोरुष्याणाम्","6.3.134::इकः सुञि","6.3.135::द्व्यचोऽतस्तिङः","6.3.136::निपातस्य च","6.3.137::अन्येषामपि दृश्यते","6.3.138::चौ","6.3.139::सम्प्रसारणस्य","6.4.1:अधिकारः:अङ्गस्य","6.4.2::हलः","6.4.3::नामि","6.4.4::न तिसृचतसृ","6.4.5::छन्दस्युभयथा","6.4.6::नृ च","6.4.7::नोपधायाः","6.4.8::सर्वनामस्थाने चासम्बुद्धौ","6.4.9::वा षपूर्वस्य निगमे","6.4.10::सान्तमहतः संयोगस्य","6.4.11::अप्तृन्तृच्स्वसृनप्तृनेष्टृत्वष्टृक्षत्तृहोतृपोतृप्रशास्तॄणाम्","6.4.12::इन्हन्पूषार्यम्णां शौ","6.4.13::सौ च","6.4.14::अत्वसन्तस्य चाधातोः","6.4.15::अनुनासिकस्य क्विझलोः क्ङिति","6.4.16::अज्झनगमां सनि","6.4.17::तनोतेर्विभाषा","6.4.18::क्रमश्च क्त्वि","6.4.19::च्छ्वोः शूडनुनासिके च","6.4.20::ज्वरत्वरश्रिव्यविमवामुपधायाश्च","6.4.21::राल्लोपः","6.4.22:अतिदेशः; अधिकारः:असिद्धवदत्राभात्‌","6.4.23:अतिदेशः:श्नान्नलोपः","6.4.24:अतिदेशः:अनिदितां हल उपधायाः क्ङिति","6.4.25:अतिदेशः:दन्शसञ्जस्वञ्जां शपि","6.4.26:अतिदेशः:रञ्जेश्च","6.4.27:अतिदेशः:घञि च भावकरणयोः","6.4.28:अतिदेशः:स्यदो जवे","6.4.29:अतिदेशः:अवोदैधौद्मप्रश्रथहिमश्रथाः","6.4.30:अतिदेशः:नाञ्चेः पूजायाम्","6.4.31:अतिदेशः:क्त्वि स्कन्दिस्यन्दोः","6.4.32:अतिदेशः:जान्तनशां विभाषा","6.4.33:अतिदेशः:भञ्जेश्च चिणि","6.4.34:अतिदेशः:शास इदङ्हलोः","6.4.35:अतिदेशः:शा हौ","6.4.36:अतिदेशः:हन्तेर्जः","6.4.37:अतिदेशः:अनुदात्तोपदेशवनतितनोत्यादीनामनुनासिकलोपो झलि क्ङिति","6.4.38:अतिदेशः:वा ल्यपि","6.4.39:अतिदेशः:न क्तिचि दीर्घश्च","6.4.40:अतिदेशः:गमः क्वौ","6.4.41:अतिदेशः:विड्वनोरनुनासिकस्यात्‌","6.4.42:अतिदेशः:जनसनखनां सञ्झलोः","6.4.43:अतिदेशः:ये विभाषा","6.4.44:अतिदेशः:तनोतेर्यकि","6.4.45:अतिदेशः:सनः क्तिचि लोपश्चास्यान्यतरस्याम्","6.4.46:अतिदेशः; अधिकारः:आर्धधातुके","6.4.47:अतिदेशः:भ्रस्जो रोपधयोः रमन्यतरस्याम्‌","6.4.48:अतिदेशः:अतो लोपः","6.4.49:अतिदेशः:यस्य हलः","6.4.50:अतिदेशः:क्यस्य विभाषा","6.4.51:अतिदेशः:णेरनिटि","6.4.52:अतिदेशः:निष्ठायां सेटि","6.4.53:अतिदेशः:जनिता मन्त्रे","6.4.54:अतिदेशः:शमिता यज्ञे","6.4.55:अतिदेशः:अयामन्ताल्वाय्येत्न्विष्णुषु","6.4.56:अतिदेशः:ल्यपि लघुपूर्वात्‌","6.4.57:अतिदेशः:विभाषाऽऽपः","6.4.58:अतिदेशः:युप्लुवोर्दीर्घश्छन्दसि","6.4.59:अतिदेशः:क्षियः","6.4.60:अतिदेशः:निष्ठायां अण्यदर्थे","6.4.61:अतिदेशः:वाऽऽक्रोशदैन्ययोः","6.4.62:अतिदेशः:स्यसिच्सीयुट्तासिषु भावकर्मणोरुपदेशेऽज्झनग्रहदृशां वा चिण्वदिट् च","6.4.63:अतिदेशः:दीङो युडचि क्ङिति","6.4.64:अतिदेशः:आतो लोप इटि च","6.4.65:अतिदेशः:ईद्यति","6.4.66:अतिदेशः:घुमास्थागापाजहातिसां हलि","6.4.67:अतिदेशः:एर्लिङि","6.4.68:अतिदेशः:वाऽन्यस्य संयोगादेः","6.4.69:अतिदेशः:न ल्यपि","6.4.70:अतिदेशः:मयतेरिदन्यतरस्याम्","6.4.71:अतिदेशः:लुङ्लङ्लृङ्क्ष्वडुदात्तः","6.4.72:अतिदेशः:आडजादीनाम्","6.4.73:अतिदेशः:छन्दस्यपि दृश्यते","6.4.74:अतिदेशः:न माङ्योगे","6.4.75:अतिदेशः:बहुलं छन्दस्यमाङ्योगेऽपि","6.4.76:अतिदेशः:इरयो रे","6.4.77:अतिदेशः:अचि श्नुधातुभ्रुवां य्वोरियङुवङौ","6.4.78:अतिदेशः:अभ्यासस्यासवर्णे","6.4.79:अतिदेशः:स्त्रियाः","6.4.80:अतिदेशः:वाऽम्शसोः","6.4.81:अतिदेशः:इणो यण्","6.4.82:अतिदेशः:एरनेकाचोऽसंयोगपूर्वस्य","6.4.83:अतिदेशः:ओः सुपि","6.4.84:अतिदेशः:वर्षाभ्वश्च","6.4.85:अतिदेशः:न भूसुधियोः","6.4.86:अतिदेशः:छन्दस्युभयथा","6.4.87:अतिदेशः:हुश्नुवोः सार्वधातुके","6.4.88:अतिदेशः:भुवो वुग्लुङ्लिटोः","6.4.89:अतिदेशः:ऊदुपधाया गोहः","6.4.90:अतिदेशः:दोषो णौ","6.4.91:अतिदेशः:वा चित्तविरागे","6.4.92:अतिदेशः:मितां ह्रस्वः","6.4.93:अतिदेशः:चिण्णमुलोर्दीर्घोऽन्यतरस्याम्","6.4.94:अतिदेशः:खचि ह्रस्वः","6.4.95:अतिदेशः:ह्लादो निष्ठायाम्","6.4.96:अतिदेशः:छादेर्घेऽद्व्युपसर्गस्य","6.4.97:अतिदेशः:इस्मन्त्रन्क्विषु च","6.4.98:अतिदेशः:गमहनजनखनघसां लोपः क्ङित्यनङि","6.4.99:अतिदेशः:तनिपत्योश्छन्दसि","6.4.100:अतिदेशः:घसिभसोर्हलि च","6.4.101:अतिदेशः:हुझल्भ्यो हेर्धिः","6.4.102:अतिदेशः:श्रुशृणुपॄकृवृभ्यश्छन्दसि","6.4.103:अतिदेशः:अङितश्च","6.4.104:अतिदेशः:चिणो लुक्","6.4.105:अतिदेशः:अतो हेः","6.4.106:अतिदेशः:उतश्च प्रत्ययादसंयोगपूर्वात्‌","6.4.107:अतिदेशः:लोपश्चास्यान्यतरस्यां म्वोः","6.4.108:अतिदेशः:नित्यं करोतेः","6.4.109:अतिदेशः:ये च","6.4.110:अतिदेशः:अत उत्‌ सार्वधातुके","6.4.111:अतिदेशः:श्नसोरल्लोपः","6.4.112:अतिदेशः:श्नाऽभ्यस्तयोरातः","6.4.113:अतिदेशः:ई हल्यघोः","6.4.114:अतिदेशः:इद्दरिद्रस्य","6.4.115:अतिदेशः:भियोऽन्यतरस्याम्","6.4.116:अतिदेशः:जहातेश्च","6.4.117:अतिदेशः:आ च हौ","6.4.118:अतिदेशः:लोपो यि","6.4.119:अतिदेशः:घ्वसोरेद्धावभ्यासलोपश्च","6.4.120:अतिदेशः:अत एकहल्मध्येऽनादेशादेर्लिटि","6.4.121:अतिदेशः:थलि च सेटि","6.4.122:अतिदेशः:तॄफलभजत्रपश्च","6.4.123:अतिदेशः:राधो हिंसायाम्","6.4.124:अतिदेशः:वा जॄभ्रमुत्रसाम्","6.4.125:अतिदेशः:फणां च सप्तानाम्","6.4.126:अतिदेशः:न शसददवादिगुणानाम्","6.4.127:अतिदेशः:अर्वणस्त्रसावनञः","6.4.128:अतिदेशः:मघवा बहुलम्","6.4.129:अतिदेशः; अधिकारः:भस्य","6.4.130:अतिदेशः:पादः पत्","6.4.131:अतिदेशः:वसोः सम्प्रसारणम्","6.4.132:अतिदेशः:वाह ऊठ्","6.4.133:अतिदेशः:श्वयुवमघोनामतद्धिते","6.4.134:अतिदेशः:अल्लोपोऽनः","6.4.135:अतिदेशः:षपूर्वहन्धृतराज्ञामणि","6.4.136:अतिदेशः:विभाषा ङिश्योः","6.4.137:अतिदेशः:न संयोगाद्वमन्तात्‌","6.4.138:अतिदेशः:अचः","6.4.139:अतिदेशः:उद ईत्‌","6.4.140:अतिदेशः:आतो धातोः","6.4.141:अतिदेशः:मन्त्रेष्वाङ्यादेरात्मनः","6.4.142:अतिदेशः:ति विंशतेर्डिति","6.4.143:अतिदेशः:टेः","6.4.144:अतिदेशः:नस्तद्धिते","6.4.145:अतिदेशः:अह्नष्टखोरेव","6.4.146:अतिदेशः:ओर्गुणः","6.4.147:अतिदेशः:ढे लोपोऽकद्र्वाः","6.4.148:अतिदेशः:यस्येति च","6.4.149:अतिदेशः:सूर्यतिष्यागस्त्यमत्स्यानां य उपधायाः","6.4.150:अतिदेशः:हलस्तद्धितस्य","6.4.151:अतिदेशः:आपत्यस्य च तद्धितेऽनाति","6.4.152:अतिदेशः:क्यच्व्योश्च","6.4.153:अतिदेशः:बिल्वकादिभ्यश्छस्य लुक्","6.4.154:अतिदेशः:तुरिष्ठेमेयस्सु","6.4.155:अतिदेशः:टेः","6.4.156:अतिदेशः:स्थूलदूरयुवह्रस्वक्षिप्रक्षुद्राणां यणादिपरं पूर्वस्य च गुणः","6.4.157:अतिदेशः:प्रियस्थिरस्फिरोरुबहुलगुरुवृद्धतृप्रदीर्घवृन्दारकाणां प्रस्थस्फवर्बंहिगर्वर्षित्रब्द्राघिवृन्दाः","6.4.158:अतिदेशः:बहोर्लोपो भू च बहोः","6.4.159:अतिदेशः:इष्ठस्य यिट् च","6.4.160:अतिदेशः:ज्यादादीयसः","6.4.161:अतिदेशः:र ऋतो हलादेर्लघोः","6.4.162:अतिदेशः:विभाषर्जोश्छन्दसि","6.4.163:अतिदेशः:प्रकृत्यैकाच्","6.4.164:अतिदेशः:इनण्यनपत्ये","6.4.165:अतिदेशः:गाथिविदथिकेशिगणिपणिनश्च","6.4.166:अतिदेशः:संयोगादिश्च","6.4.167:अतिदेशः:अन्","6.4.168:अतिदेशः:ये चाभावकर्मणोः","6.4.169:अतिदेशः:आत्माध्वानौ खे","6.4.170:अतिदेशः:न मपूर्वोऽपत्येऽवर्मणः","6.4.171:अतिदेशः:ब्राह्मोअजातौ","6.4.172:अतिदेशः:कार्मस्ताच्छील्ये","6.4.173:अतिदेशः:औक्षमनपत्ये","6.4.174:अतिदेशः:दाण्डिनायनहास्तिनायनाथर्वणिकजैह्माशिनेयवाशिनायनिभ्रौणहत्यधैवत्यसारवैक्ष्वाकमैत्रेयहिरण्मयानि","6.4.175:अतिदेशः:ऋत्व्यवास्त्व्यवास्त्वमाध्वीहिरण्ययानि च्छन्दसि","7.1.1::युवोरनाकौ","7.1.2::आयनेयीनीयियः फढखच्छघां प्रत्ययादीनाम्‌","7.1.3::झोऽन्तः","7.1.4::अदभ्यस्तात्‌","7.1.5::आत्मनेपदेष्वनतः","7.1.6::शीङो रुट्","7.1.7::वेत्तेर्विभाषा","7.1.8::बहुलं छन्दसि","7.1.9::अतो भिस ऐस्","7.1.10::बहुलं छन्दसि","7.1.11::नेदमदसोरकोः","7.1.12::टाङसिङसामिनात्स्याः","7.1.13::ङेर्यः","7.1.14::सर्वनाम्नः स्मै","7.1.15::ङसिङ्योः स्मात्स्मिनौ","7.1.16::पूर्वादिभ्यो नवभ्यो वा","7.1.17::जसः शी","7.1.18::औङ आपः","7.1.19::नपुंसकाच्च","7.1.20::जश्शसोः शिः","7.1.21::अष्टाभ्य औश्","7.1.22::षड्भ्यो लुक्","7.1.23::स्वमोर्नपुंसकात्‌","7.1.24::अतोऽम्","7.1.25::अद्ड् डतरादिभ्यः पञ्चभ्यः","7.1.26::नेतराच्छन्दसि","7.1.27::युष्मदस्मद्भ्यां ङसोऽश्","7.1.28::ङे प्रथमयोरम्","7.1.29::शसो न","7.1.30::भ्यसो भ्यम्","7.1.31::पञ्चम्या अत्‌","7.1.32::एकवचनस्य च","7.1.33::साम आकम्","7.1.34::आत औ णलः","7.1.35::तुह्योस्तातङाशिष्यन्यतरस्याम्","7.1.36::विदेः शतुर्वसुः","7.1.37::समासेऽनञ्पूर्वे क्त्वो ल्यप्‌","7.1.38::क्त्वाऽपि छन्दसि","7.1.39::सुपां सुलुक्पूर्वसवर्णाऽऽच्छेयाडाड्यायाजालः","7.1.40::अमो मश्","7.1.41::लोपस्त आत्मनेपदेषु","7.1.42::ध्वमो ध्वात्‌","7.1.43::यजध्वैनमिति च","7.1.44::तस्य तात्‌","7.1.45::तप्तनप्तनथनाश्च","7.1.46::इदन्तो मसि","7.1.47::क्त्वो यक्","7.1.48::इष्ट्वीनमिति च","7.1.49::स्नात्व्यादयश्च","7.1.50::आज्जसेरसुक्","7.1.51::अश्वक्षीरवृषलवणानामात्मप्रीतौ क्यचि","7.1.52::आमि सर्वनाम्नः सुट्","7.1.53::त्रेस्त्रयः","7.1.54::ह्रस्वनद्यापो नुट्","7.1.55::षट्चतुर्भ्यश्च","7.1.56::श्रीग्रामण्योश्छन्दसि","7.1.57::गोः पादान्ते","7.1.58::इदितो नुम् धातोः","7.1.59::शे मुचादीनाम्","7.1.60::मस्जिनशोर्झलि","7.1.61::रधिजभोरचि","7.1.62::नेट्यलिटि रधेः","7.1.63::रभेरशब्लिटोः","7.1.64::लभेश्च","7.1.65::आङो यि","7.1.66::उपात्‌ प्रशंसायाम्","7.1.67::उपसर्गात्‌ खल्घञोः","7.1.68::न सुदुर्भ्यां केवलाभ्याम्","7.1.69::विभाषा चिण्णमुलोः","7.1.70::उगिदचां सर्वनामस्थानेऽधातोः","7.1.71::युजेरसमासे","7.1.72::नपुंसकस्य झलचः","7.1.73::इकोऽचि विभक्तौ","7.1.74::तृतीयाऽऽदिषु भाषितपुंस्कं पुंवद्गालवस्य","7.1.75::अस्थिदधिसक्थ्यक्ष्णामनङुदात्तः","7.1.76::छन्दस्यपि दृश्यते","7.1.77::ई च द्विवचने","7.1.78::नाभ्यस्ताच्छतुः","7.1.79::वा नपुंसकस्य","7.1.80::आच्छीनद्योर्नुम्","7.1.81::शप्श्यनोर्नित्यम्","7.1.82::सावनडुहः","7.1.83::दृक्स्ववस्स्वतवसां छन्दसि","7.1.84::दिव औत्‌","7.1.85::पथिमथ्यृभुक्षामात्‌","7.1.86::इतोऽत्‌ सर्वनामस्थाने","7.1.87::थो न्थः","7.1.88::भस्य टेर्लोपः","7.1.89::पुंसोऽसुङ्","7.1.90:अतिदेशः:गोतो णित्‌","7.1.91:अतिदेशः:णलुत्तमो वा","7.1.92:अतिदेशः:सख्युरसम्बुद्धौ","7.1.93::अनङ् सौ","7.1.94::ऋदुशनस्पुरुदंसोऽनेहसां च","7.1.95:अतिदेशः:तृज्वत्‌ क्रोष्टुः","7.1.96::स्त्रियां च","7.1.97::विभाषा तृतीयाऽऽदिष्वचि","7.1.98::चतुरनडुहोरामुदात्तः","7.1.99::अम् सम्बुद्धौ","7.1.100::ॠत इद्धातोः","7.1.101::उपधायाश्च","7.1.102::उदोष्ठ्यपूर्वस्य","7.1.103::बहुलं छन्दसि","7.2.1::सिचि वृद्धिः परस्मैपदेषु","7.2.2::अतो र्लान्तस्य","7.2.3::वदव्रजहलन्तस्याचः","7.2.4::नेटि","7.2.5::ह्म्यन्तक्षणश्वसजागृणिश्व्येदिताम्","7.2.6::ऊर्णोतेर्विभाषा","7.2.7::अतो हलादेर्लघोः","7.2.8::नेड् वशि कृति","7.2.9::तितुत्रतथसिसुसरकसेषु च","7.2.10::एकाच उपदेशेऽनुदात्तात्‌","7.2.11::श्र्युकः किति","7.2.12::सनि ग्रहगुहोश्च","7.2.13::कृसृभृवृस्तुद्रुस्रुश्रुवो लिटि","7.2.14::श्वीदितो निष्ठायाम्","7.2.15::यस्य विभाषा","7.2.16::आदितश्च","7.2.17::विभाषा भावादिकर्मणोः","7.2.18::क्षुब्धस्वान्तध्वान्तलग्नम्लिष्टविरिब्धफाण्टबाढानि मन्थमनस्तमःसक्ताविस्पष्टस्वरानायासभृशेषु","7.2.19:अधिकारः:धृषिशसी वैयात्ये","7.2.20::दृढः स्थूलबलयोः","7.2.21::प्रभौ परिवृढः","7.2.22::कृच्छ्रगहनयोः कषः","7.2.23::घुषिरविशब्दने","7.2.24::अर्देः संनिविभ्यः","7.2.25::अभेश्चाविदूर्ये","7.2.26::णेरध्ययने वृत्तम्","7.2.27::वा दान्तशान्तपूर्णदस्तस्पष्टच्छन्नज्ञप्ताः","7.2.28::रुष्यमत्वरसंघुषास्वनाम्","7.2.29::हृषेर्लोमसु","7.2.30::अपचितश्च","7.2.31::ह्रु ह्वरेश्छन्दसि","7.2.32::अपरिह्वृताश्च","7.2.33::सोमे ह्वरितः","7.2.34::ग्रसितस्कभितस्तभितोत्तभितचत्तविकस्तविशस्तॄशंस्तृशास्तृतरुतृतरूतृवरुतृवरूतृवरुत्रीरुज्ज्वलितिक्षरितिक्षमितिवमित्यमितीति च","7.2.35::आर्धधातुकस्येड् वलादेः","7.2.36::स्नुक्रमोरनात्मनेपदनिमित्ते","7.2.37::ग्रहोऽलिटि दीर्घः","7.2.38::वॄतो वा","7.2.39::न लिङि","7.2.40::सिचि च परस्मैपदेषु","7.2.41::इट् सनि वा","7.2.42::लिङ्सिचोरात्मनेपदेषु","7.2.43::ऋतश्च संयोगादेः","7.2.44::स्वरतिसूतिसूयतिधूञूदितो वा","7.2.45::रधादिभ्यश्च","7.2.46::निरः कुषः","7.2.47::इण्निष्ठायाम्","7.2.48::तीषसहलुभरुषरिषः","7.2.49::सनीवन्तर्धभ्रस्जदम्भुश्रिस्वृयूर्णुभरज्ञपिसनाम्","7.2.50::क्लिशः क्त्वानिष्ठयोः","7.2.51::पूङश्च","7.2.52::वसतिक्षुधोरिट्","7.2.53::अञ्चेः पूजायाम्","7.2.54::लुभो विमोचने","7.2.55::जॄव्रश्च्योः क्त्वि","7.2.56::उदितो वा","7.2.57::सेऽसिचि कृतचृतच्छृदतृदनृतः","7.2.58::गमेरिट् परस्मैपदेषु","7.2.59::न वृद्भ्यश्चतुर्भ्यः","7.2.60::तासि च कॢपः","7.2.61::अचस्तास्वत्‌ थल्यनिटो नित्यम्","7.2.62::उपदेशेऽत्वतः","7.2.63::ऋतो भारद्वाजस्य","7.2.64::बभूथाततन्थजगृम्भववर्थेति निगमे","7.2.65::विभाषा सृजिदृषोः","7.2.66::इडत्त्यर्तिव्ययतीनाम्","7.2.67::वस्वेकाजाद्घसाम्","7.2.68::विभाषा गमहनविदविशाम्","7.2.69::सनिंससनिवांसम्","7.2.70::ऋद्धनोः स्ये","7.2.71::अञ्जेः सिचि","7.2.72::स्तुसुधूञ्भ्यः परस्मैपदेषु","7.2.73::यमरमनमातां सक् च","7.2.74::स्मिपूङ्रञ्ज्वशां सनि","7.2.75::किरश्च पञ्चभ्यः","7.2.76::रुदादिभ्यः सार्वधातुके","7.2.77::ईशः से","7.2.78::ईडजनोर्ध्वे च","7.2.79::लिङः सलोपोऽनन्त्यस्य","7.2.80::अतो येयः","7.2.81::आतो ङितः","7.2.82::आने मुक्","7.2.83::ईदासः","7.2.84::अष्टन आ विभक्तौ","7.2.85::रायो हलि","7.2.86::युष्मदस्मदोरनादेशे","7.2.87::द्वितीयायां च","7.2.88::प्रथमायाश्च द्विवचने भाषायाम्","7.2.89::योऽचि","7.2.90::शेषे लोपः","7.2.91::मपर्यन्तस्य","7.2.92::युवावौ द्विवचने","7.2.93::यूयवयौ जसि","7.2.94::त्वाहौ सौ","7.2.95::तुभ्यमह्यौ ङयि","7.2.96::तवममौ ङसि","7.2.97::त्वमावेकवचने","7.2.98::प्रतयोत्तरपदयोश्च","7.2.99::त्रिचतुरोः स्त्रियां तिसृचतसृ","7.2.100::अचि र ऋतः","7.2.101::जराया जरसन्यतरस्याम्","7.2.102::त्यदादीनामः","7.2.103::किमः कः","7.2.104::कु तिहोः","7.2.105::क्वाति","7.2.106::तदोः सः सावनन्त्ययोः","7.2.107::अदस औ सुलोपश्च","7.2.108::इदमो मः","7.2.109::दश्च","7.2.110::यः सौ","7.2.111::इदोऽय् पुंसि","7.2.112::अनाप्यकः","7.2.113::हलि लोपः","7.2.114::मृजेर्वृद्धिः","7.2.115::अचो ञ्णिति","7.2.116::अत उपधायाः","7.2.117::तद्धितेष्वचामादेः","7.2.118::किति च","7.3.1::देविकाशिंशपादित्यवाड्दीर्घसत्रश्रेयसामात्‌","7.3.2::केकयमित्त्रयुप्रलयानां यादेरियः","7.3.3::न य्वाभ्यां पदान्ताभ्याम् पूर्वौ तु ताभ्यामैच्","7.3.4::द्वारादीनां च","7.3.5::न्यग्रोधस्य च केवलस्य","7.3.6::न कर्मव्यतिहारे","7.3.7::स्वागतादीनां च","7.3.8::श्वादेरिञि","7.3.9::पदान्तस्यान्यतरस्याम्","7.3.10:अधिकारः:उत्तरपदस्य","7.3.11::अवयवादृतोः","7.3.12::सुसर्वार्धाज्जनपदस्य","7.3.13::दिशोऽमद्राणाम्","7.3.14::प्राचां ग्रामनगराणाम्","7.3.15::संख्यायाः संवत्सरसंख्यस्य च","7.3.16::वर्षस्याभविष्यति","7.3.17::परिमाणान्तस्यासंज्ञाशाणयोः","7.3.18::जे प्रोष्ठपदानाम्","7.3.19::हृद्भगसिन्ध्वन्ते पूर्वपदस्य च","7.3.20::अनुशतिकादीनां च","7.3.21::देवताद्वंद्वे च","7.3.22::नेन्द्रस्य परस्य","7.3.23::दीर्घाच्च वरुणस्य","7.3.24::प्राचां नगरान्ते","7.3.25::जङ्गलधेनुवलजान्तस्य विभाषितमुत्तरम्‌","7.3.26::अर्धात्‌ परिमाणस्य पूर्वस्य तु वा","7.3.27::नातः परस्य","7.3.28::प्रवाहणस्य ढे","7.3.29::तत्प्रत्ययस्य च","7.3.30::नञः शुचीश्वरक्षेत्रज्ञकुशलनिपुणानाम्","7.3.31::यथातथयथापुरयोः पर्यायेण","7.3.32::हनस्तोऽचिण्णलोः","7.3.33::आतो युक् चिण्कृतोः","7.3.34::नोदात्तोपदेशस्य मान्तस्यानाचमेः","7.3.35::जनिवध्योश्च","7.3.36::अर्त्तिह्रीब्लीरीक्नूयीक्ष्माय्यातां पुङ्णौ","7.3.37::शाच्छासाह्वाव्यावेपां युक्","7.3.38::वो विधूनने जुक्","7.3.39::लीलोर्नुग्लुकावन्यतरस्यां स्नेहविपातने","7.3.40::भियो हेतुभये षुक्","7.3.41::स्फायो वः","7.3.42::शदेरगतौ तः","7.3.43::रुहः पोऽन्यतरस्याम्","7.3.44::प्रत्ययस्थात्‌ कात्‌ पूर्वस्यात इदाप्यसुपः","7.3.45::न यासयोः","7.3.46::उदीचामातः स्थाने यकपूर्वायाः","7.3.47::भस्त्रैषाऽजाज्ञाद्वास्वानञ्पूर्वाणामपि","7.3.48::अभाषितपुंस्काच्च","7.3.49::आदाचार्याणाम्","7.3.50::ठस्येकः","7.3.51::इसुसुक्तान्तात्‌ कः","7.3.52::चजोः कु घिन्ण्यतोः","7.3.53::न्यङ्क्वादीनां च","7.3.54::हो हन्तेर्ञ्णिन्नेषु","7.3.55::अभ्यासाच्च","7.3.56::हेरचङि","7.3.57::सन्लिटोर्जेः","7.3.58::विभाषा चेः","7.3.59::न क्वादेः","7.3.60::अजिवृज्योश्च","7.3.61::भुजन्युब्जौ पाण्युपतापयोः","7.3.62::प्रयाजानुयाजौ यज्ञाङ्गे","7.3.63::वञ्चेर्गतौ","7.3.64::ओक उचः के","7.3.65::ण्य आवश्यके","7.3.66::यजयाचरुचप्रवचर्चश्च","7.3.67::वचोऽशब्दसंज्ञायाम्","7.3.68::प्रयोज्यनियोज्यौ शक्यार्थे","7.3.69::भोज्यं भक्ष्ये","7.3.70::घोर्लोपो लेटि वा","7.3.71::ओतः श्यनि","7.3.72::क्सस्याचि","7.3.73::लुग्वा दुहदिहलिहगुहामात्मनेपदे दन्त्ये","7.3.74::शमामष्टानां दीर्घः श्यनि","7.3.75::ष्ठिवुक्लम्याचमां शिति","7.3.76::क्रमः परस्मैपदेषु","7.3.77::इषुगमियमां छः","7.3.78::पाघ्राध्मास्थाम्नादाण्दृश्यर्त्तिसर्त्तिशदसदां पिबजिघ्रधमतिष्ठमनयच्छपश्यर्च्छधौशीयसीदाः","7.3.79::ज्ञाजनोर्जा","7.3.80::प्वादीनां ह्रस्वः","7.3.81::मीनातेर्निगमे","7.3.82::मिदेर्गुणः","7.3.83::जुसि च","7.3.84::सार्वधातुकार्धधातुकयोः","7.3.85::जाग्रोऽविचिण्णल्ङित्सु","7.3.86::पुगन्तलघूपधस्य च","7.3.87::नाभ्यस्तस्याचि पिति सार्वधातुके","7.3.88::भूसुवोस्तिङि","7.3.89::उतो वृद्धिर्लुकि हलि","7.3.90::ऊर्णोतेर्विभाषा","7.3.91::गुणोऽपृक्ते","7.3.92::तृणह इम्","7.3.93::ब्रुव ईट्","7.3.94::यङो वा","7.3.95::तुरुस्तुशम्यमः सार्वधातुके","7.3.96::अस्तिसिचोऽपृक्ते","7.3.97::बहुलं छन्दसि","7.3.98::रुदश्च पञ्चभ्यः","7.3.99::अड्गार्ग्यगालवयोः","7.3.100::अदः सर्वेषाम्","7.3.101::अतो दीर्घो यञि","7.3.102::सुपि च","7.3.103::बहुवचने झल्येत्‌","7.3.104::ओसि च","7.3.105::आङि चापः","7.3.106::सम्बुद्धौ च","7.3.107::अम्बाऽर्थनद्योर्ह्रस्वः","7.3.108::ह्रस्वस्य गुणः","7.3.109::जसि च","7.3.110::ऋतो ङिसर्वनामस्थानयोः","7.3.111::घेर्ङिति","7.3.112::आण्नद्याः","7.3.113::याडापः","7.3.114::सर्वनाम्नः स्याड्ढ्रस्वश्च","7.3.115::विभाषा द्वितीयातृतीयाभ्याम्","7.3.116::ङेराम्नद्याम्नीभ्यः","7.3.117::इदुद्भ्याम्","7.3.118::औत्‌","7.3.119::अच्च घेः","7.3.120::आङो नाऽस्त्रियाम्","7.4.1::णौ चङ्युपधाया ह्रस्वः","7.4.2::नाग्लोपिशास्वृदिताम्","7.4.3::भ्राजभासभाषदीपजीवमीलपीडामन्यतरस्याम्‌","7.4.4::लोपः पिबतेरीच्चाभ्यासस्य","7.4.5::तिष्ठतेरित्‌","7.4.6::जिघ्रतेर्वा","7.4.7::उर्ऋत्‌","7.4.8::नित्यं छन्दसि","7.4.9::दयतेर्दिगि लिटि","7.4.10::ऋतश्च संयोगादेर्गुणः","7.4.11::ऋच्छत्यॄताम्","7.4.12::शृदॄप्रां ह्रस्वो वा","7.4.13::केऽणः","7.4.14::न कपि","7.4.15::आपोऽन्यतरस्याम्","7.4.16::ऋदृशोऽङि गुणः","7.4.17::अस्यतेस्थुक्","7.4.18::श्वयतेरः","7.4.19::पतः पुम्","7.4.20::वच उम्","7.4.21::शीङः सार्वधातुके गुणः","7.4.22::अयङ् यि क्ङिति","7.4.23::उपसर्गाद्ध्रस्व ऊहतेः","7.4.24::एतेर्लिङि","7.4.25::अकृत्सार्वधातुकयोर्दीर्घः","7.4.26::च्वौ च","7.4.27::रीङ् ऋतः","7.4.28::रिङ् शयग्लिङ्क्षु","7.4.29::गुणोऽर्तिसंयोगाद्योः","7.4.30::यङि च","7.4.31::ई घ्राध्मोः","7.4.32::अस्य च्वौ","7.4.33::क्यचि च","7.4.34::अशनायोदन्यधनाया बुभुक्षापिपासागर्द्धेषु","7.4.35::न च्छन्दस्यपुत्रस्य","7.4.36::दुरस्युर्द्रविणस्युर्वृषण्यतिरिषण्यति","7.4.37::अश्वाघस्यात्‌","7.4.38::देवसुम्नयोर्यजुषि काठके","7.4.39::कव्यध्वरपृतनस्यर्चि लोपः","7.4.40::द्यतिस्यतिमास्थामित्ति किति","7.4.41::शाछोरन्यतरस्याम्","7.4.42::दधातेर्हिः","7.4.43::जहातेश्च क्त्वि","7.4.44::विभाषा छन्दसि","7.4.45::सुधितवसुधितनेमधितधिष्वधिषीय च","7.4.46::दो दद् घोः","7.4.47::अच उपसर्गात्तः","7.4.48::अपो भि","7.4.49::सः स्यार्द्धधातुके","7.4.50::तासस्त्योर्लोपः","7.4.51::रि च","7.4.52::ह एति","7.4.53::यीवर्णयोर्दीधीवेव्योः","7.4.54::सनि मीमाघुरभलभशकपतपदामच इस्","7.4.55::आप्ज्ञप्यृधामीत्‌","7.4.56::दम्भ इच्च","7.4.57::मुचोऽकर्मकस्य गुणो वा","7.4.58::अत्र लोपोऽभ्यासस्य","7.4.59::ह्रस्वः","7.4.60::हलादिः शेषः","7.4.61::शर्पूर्वाः खयः","7.4.62::कुहोश्चुः","7.4.63::न कवतेर्यङि","7.4.64::कृषेश्छन्दसि","7.4.65::दाधर्तिदर्धर्तिदर्धर्षिबोभूतुतेतिक्तेऽलर्ष्यापनीफणत्संसनिष्यदत्करिक्रत्कनिक्रदद्भरिभ्रद्दविध्वतोदविद्युतत्तरित्रतःसरीसृपतंवरीवृजन्मर्मृज्यागनीगन्तीति च","7.4.66::उरत्‌","7.4.67::द्युतिस्वाप्योः सम्प्रसारणम्","7.4.68::व्यथो लिटि","7.4.69::दीर्घ इणः किति","7.4.70::अत आदेः","7.4.71::तस्मान्नुड् द्विहलः","7.4.72::अश्नोतेश्च","7.4.73::भवतेरः","7.4.74::ससूवेति निगमे","7.4.75::निजां त्रयाणां गुणः श्लौ","7.4.76::भृञामित्‌","7.4.77::अर्तिपिपर्त्योश्च","7.4.78::बहुलं छन्दसि","7.4.79::सन्यतः","7.4.80::ओः पुयण्ज्यपरे","7.4.81::स्रवतिशृणोतिद्रवतिप्रवतिप्लवतिच्यवतीनां वा","7.4.82::गुणो यङ्लुकोः","7.4.83::दीर्घोऽकितः","7.4.84::नीग्वञ्चुस्रंसुध्वंसुभ्रंसुकसपतपदस्कन्दाम्","7.4.85::नुगतोऽनुनासिकान्तस्य","7.4.86::जपजभदहदशभञ्जपशां च","7.4.87::चरफलोश्च","7.4.88::उत्‌ परस्यातः","7.4.89::ति च","7.4.90::रीगृदुपधस्य च","7.4.91::रुग्रिकौ च लुकि","7.4.92::ऋतश्च","7.4.93:अतिदेशः:सन्वल्लघुनि चङ्परेऽनग्लोपे","7.4.94::दीर्घो लघोः","7.4.95::अत्‌ स्मृदृत्वरप्रथम्रदस्तॄस्पशाम्","7.4.96::विभाषा वेष्टिचेष्ट्योः","7.4.97::ई च गणः","8.1.1:अधिकारः:सर्वस्य द्वे","8.1.2:संज्ञा:तस्य परमाम्रेडितम्‌","8.1.3::अनुदात्तं च","8.1.4::नित्यवीप्सयोः","8.1.5::परेर्वर्जने","8.1.6::प्रसमुपोदः पादपूरणे","8.1.7::उपर्यध्यधसः सामीप्ये","8.1.8::वाक्यादेरामन्त्रितस्यासूयासम्मतिकोपकुत्सनभर्त्सनेषु","8.1.9:अतिदेशः:एकं बहुव्रीहिवत्‌","8.1.10::आबाधे च","8.1.11:अतिदेशः:कर्मधारयवत्‌ उत्तरेषु","8.1.12::प्रकारे गुणवचनस्य","8.1.13::अकृच्छ्रे प्रियसुखयोरन्यतरस्याम्","8.1.14::यथास्वे यथायथम्","8.1.15::द्वन्द्वं रहस्यमर्यादावचनव्युत्क्रमणयज्ञपात्रप्रयोगाभिव्यक्तिषु","8.1.16:अधिकारः:पदस्य","8.1.17:अधिकारः:पदात्‌","8.1.18:अधिकारः:अनुदात्तं सर्वमपादादौ","8.1.19::आमन्त्रितस्य च","8.1.20::युष्मदस्मदोः षष्ठीचतुर्थीद्वितीयास्थयोर्वान्नावौ","8.1.21::बहुवचने वस्नसौ","8.1.22::तेमयावेकवचनस्य","8.1.23::त्वामौ द्वितीयायाः","8.1.24::न चवाहाहैवयुक्ते","8.1.25::पश्यार्थैश्चानालोचने","8.1.26::सपूर्वायाः प्रथमाया विभाषा","8.1.27::तिङो गोत्रादीनि कुत्सनाभीक्ष्ण्ययोः","8.1.28::तिङ्ङतिङः","8.1.29::न लुट्","8.1.30::निपातैर्यद्यदिहन्तकुविन्नेच्चेच्चण्कच्चिद्यत्रयुक्तम्","8.1.31::नह प्रत्यारम्भे","8.1.32::सत्यं प्रश्ने","8.1.33::अङ्गाप्रातिलोम्ये","8.1.34::हि च","8.1.35::छन्दस्यनेकमपि साकाङ्क्षम्‌","8.1.36::यावद्यथाभ्याम्","8.1.37::पूजायां नानन्तरम्","8.1.38::उपसर्गव्यपेतं च","8.1.39::तुपश्यपश्यताहैः पूजायाम्","8.1.40::अहो च","8.1.41::शेषे विभाषा","8.1.42::पुरा च परीप्सायाम्","8.1.43::नन्वित्यनुज्ञैषणायाम्","8.1.44::किं क्रियाप्रश्नेऽनुपसर्गमप्रतिषिद्धम्‌","8.1.45::लोपे विभाषा","8.1.46::एहिमन्ये प्रहासे लृट्","8.1.47::जात्वपूर्वम्","8.1.48::किम्वृत्तं च चिदुत्तरम्","8.1.49::आहो उताहो चानन्तरम्","8.1.50::शेषे विभाषा","8.1.51::गत्यर्थलोटा लृण्न चेत्‌ कारकं सर्वान्यत्‌","8.1.52::लोट् च","8.1.53::विभाषितं सोपसर्गमनुत्तमम्‌","8.1.54::हन्त च","8.1.55::आम एकान्तरमामन्त्रितमनन्तिके","8.1.56::यद्धितुपरं छन्दसि","8.1.57::चनचिदिवगोत्रादितद्धिताम्रेडितेष्वगतेः","8.1.58::चादिषु च","8.1.59::चवायोगे प्रथमा","8.1.60::हेति क्षियायाम्","8.1.61::अहेति विनियोगे च","8.1.62::चाहलोप एवेत्यवधारणम्","8.1.63::चादिलोपे विभाषा","8.1.64::वैवावेति च च्छन्दसि","8.1.65::एकान्याभ्यां समर्थाभ्याम्","8.1.66::यद्वृत्तान्नित्यं","8.1.67::पूजनात्‌ पूजितमनुदात्तम् {काष्ठादिभ्यः}","8.1.68::सगतिरपि तिङ्","8.1.69::कुत्सने च सुप्यगोत्रादौ","8.1.70::गतिर्गतौ","8.1.71::तिङि चोदात्तवति","8.1.72:अतिदेशः:आमन्त्रितं पूर्वम् अविद्यमानवत्‌","8.1.73::नामन्त्रिते समानाधिकरणे {सामान्यवचनम्}","8.1.74::विभाषितं विशेषवचने बहुवचनम्","8.2.1:अतिदेशः; अधिकारः:पूर्वत्रासिद्धम्","8.2.2:अतिदेशः:नलोपः सुप्स्वरसंज्ञातुग्विधिषु कृति","8.2.3:अतिदेशः:न मु ने","8.2.4:अतिदेशः:उदात्तस्वरितयोर्यणः स्वरितोऽनुदात्तस्य","8.2.5:अतिदेशः:एकादेश उदात्तेनोदात्तः","8.2.6:अतिदेशः:स्वरितो वाऽनुदात्ते पदादौ","8.2.7:अतिदेशः:नलोपः प्रातिपदिकान्तस्य","8.2.8:अतिदेशः:न ङिसम्बुद्ध्योः","8.2.9:अतिदेशः:मादुपधायाश्च मतोर्वोऽयवादिभ्यः","8.2.10:अतिदेशः:झयः","8.2.11:अतिदेशः:संज्ञायाम्","8.2.12:अतिदेशः:आसन्दीवदष्ठीवच्चक्रीवत्कक्षीवद्रुमण्वच्चर्मण्वती","8.2.13:अतिदेशः:उदन्वानुदधौ च","8.2.14:अतिदेशः:राजन्वान् सौराज्ये","8.2.15:अतिदेशः:छन्दसीरः","8.2.16:अतिदेशः:अनो नुट्","8.2.17:अतिदेशः:नाद्घस्य","8.2.18:अतिदेशः:कृपो रो लः","8.2.19:अतिदेशः:उपसर्गस्यायतौ","8.2.20:अतिदेशः:ग्रो यङि","8.2.21:अतिदेशः:अचि विभाषा","8.2.22:अतिदेशः:परेश्च घाङ्कयोः","8.2.23:अतिदेशः:संयोगान्तस्य लोपः","8.2.24:अतिदेशः:रात्‌ सस्य","8.2.25:अतिदेशः:धि च","8.2.26:अतिदेशः:झलो झलि","8.2.27:अतिदेशः:ह्रस्वादङ्गात्‌","8.2.28:अतिदेशः:इट ईटि","8.2.29:अतिदेशः:स्कोः संयोगाद्योरन्ते च","8.2.30:अतिदेशः:चोः कुः","8.2.31:अतिदेशः:हो ढः","8.2.32:अतिदेशः:दादेर्धातोर्घः","8.2.33:अतिदेशः:वा द्रुहमुहष्णुहष्णिहाम्","8.2.34:अतिदेशः:नहो धः","8.2.35:अतिदेशः:आहस्थः","8.2.36:अतिदेशः:व्रश्चभ्रस्जसृजमृजयजराजभ्राजच्छशां षः","8.2.37:अतिदेशः:एकाचो बशो भष् झषन्तस्य स्ध्वोः","8.2.38:अतिदेशः:दधस्तथोश्च","8.2.39:अतिदेशः:झलां जशोऽन्ते","8.2.40:अतिदेशः:झषस्तथोर्धोऽधः","8.2.41:अतिदेशः:षढोः कः सि","8.2.42:अतिदेशः:रदाभ्यां निष्ठातो नः पूर्वस्य च दः","8.2.43:अतिदेशः:संयोगादेरातो धातोर्यण्वतः","8.2.44:अतिदेशः:ल्वादिभ्यः","8.2.45:अतिदेशः:ओदितश्च","8.2.46:अतिदेशः:क्षियो दीर्घात्‌","8.2.47:अतिदेशः:श्योऽस्पर्शे","8.2.48:अतिदेशः:अञ्चोऽनपादाने","8.2.49:अतिदेशः:दिवोऽविजिगीषायाम्","8.2.50:अतिदेशः:निर्वाणोऽवाते","8.2.51:अतिदेशः:शुषः कः","8.2.52:अतिदेशः:पचो वः","8.2.53:अतिदेशः:क्षायो मः","8.2.54:अतिदेशः:प्रस्त्योऽन्यतरस्याम्","8.2.55:अतिदेशः:अनुपसर्गात्‌ फुल्लक्षीबकृशोल्लाघाः","8.2.56:अतिदेशः:नुदविदोन्दत्राघ्राह्रीभ्योऽन्यतरस्याम्","8.2.57:अतिदेशः:न ध्याख्यापॄमूर्छिमदाम्","8.2.58:अतिदेशः:वित्तो भोगप्रत्यययोः","8.2.59:अतिदेशः:भित्तं शकलम्","8.2.60:अतिदेशः:ऋणमाधमर्ण्ये","8.2.61:अतिदेशः:नसत्तनिषत्तानुत्तप्रतूर्तसूर्तगूर्तानि छन्दसि","8.2.62:अतिदेशः:क्विन्प्रत्ययस्य कुः","8.2.63:अतिदेशः:नशेर्वा","8.2.64:अतिदेशः:मो नो धातोः","8.2.65:अतिदेशः:म्वोश्च","8.2.66:अतिदेशः:ससजुषो रुः","8.2.67:अतिदेशः:अवयाःश्वेतवाःपुरोडाश्च","8.2.68:अतिदेशः:अहन्","8.2.69:अतिदेशः:रोऽसुपि","8.2.70:अतिदेशः:अम्नरूधरवरित्युभयथा छन्दसि","8.2.71:अतिदेशः:भुवश्च महाव्याहृतेः","8.2.72:अतिदेशः:वसुस्रंसुध्वंस्वनडुहां दः","8.2.73:अतिदेशः:तिप्यनस्तेः","8.2.74:अतिदेशः:सिपि धातो रुर्वा","8.2.75:अतिदेशः:दश्च","8.2.76:अतिदेशः:र्वोरुपधाया दीर्घ इकः","8.2.77:अतिदेशः:हलि च","8.2.78:अतिदेशः:उपधायां च","8.2.79:अतिदेशः:न भकुर्छुराम्","8.2.80:अतिदेशः:अदसोऽसेर्दादु दो मः","8.2.81:अतिदेशः:एत ईद्बहुवचने","8.2.82:अतिदेशः; अधिकारः:वाक्यस्य टेः प्लुत उदात्तः","8.2.83:अतिदेशः:प्रत्यभिवादेअशूद्रे","8.2.84:अतिदेशः:दूराद्धूते च","8.2.85:अतिदेशः:हैहेप्रयोगे हैहयोः","8.2.86:अतिदेशः:गुरोरनृतोऽनन्त्यस्याप्येकैकस्य प्राचाम्","8.2.87:अतिदेशः:ओमभ्यादाने","8.2.88:अतिदेशः:ये यज्ञकर्मणि","8.2.89:अतिदेशः:प्रणवष्टेः","8.2.90:अतिदेशः:याज्याऽन्तः","8.2.91:अतिदेशः:ब्रूहिप्रेस्यश्रौषड्वौषडावहानामादेः","8.2.92:अतिदेशः:अग्नीत्प्रेषणे परस्य च","8.2.93:अतिदेशः:विभाषा पृष्टप्रतिवचने हेः","8.2.94:अतिदेशः:निगृह्यानुयोगे च","8.2.95:अतिदेशः:आम्रेडितं भर्त्सने","8.2.96:अतिदेशः:अङ्गयुक्तं तिङ् आकाङ्क्षम्","8.2.97:अतिदेशः:विचार्यमाणानाम्","8.2.98:अतिदेशः:पूर्वं तु भाषायाम्","8.2.99:अतिदेशः:प्रतिश्रवणे च","8.2.100:अतिदेशः:अनुदात्तं प्रश्नान्ताभिपूजितयोः","8.2.101:अतिदेशः:चिदिति चोपमाऽर्थे प्रयुज्यमाने","8.2.102:अतिदेशः:उपरिस्विदासीदिति च","8.2.103:अतिदेशः:स्वरितमाम्रेडितेऽसूयासम्मतिकोपकुत्सनेषु","8.2.104:अतिदेशः:क्षियाऽऽशीःप्रैषेषु तिङ् आकाङ्क्षम्","8.2.105:अतिदेशः:अनन्त्यस्यापि प्रश्नाख्यानयोः","8.2.106:अतिदेशः:प्लुतावैच इदुतौ","8.2.107:अतिदेशः:एचोऽप्रगृह्यस्यादूराद्धूते पूर्वस्यार्धस्यादुत्तरस्येदुतौ","8.2.108:अतिदेशः; अधिकारः:तयोर्य्वावचि संहितायाम्","8.3.1:अतिदेशः:मतुवसो रु सम्बुद्धौ छन्दसि","8.3.2:अतिदेशः:अत्रानुनासिकः पूर्वस्य तु वा","8.3.3:अतिदेशः:आतोऽटि नित्यम्","8.3.4:अतिदेशः:अनुनासिकात्‌ परोऽनुस्वारः","8.3.5:अतिदेशः:समः सुटि","8.3.6:अतिदेशः:पुमः खय्यम्परे","8.3.7:अतिदेशः:नश्छव्यप्रशान्","8.3.8:अतिदेशः:उभयथर्क्षु","8.3.9:अतिदेशः:दीर्घादटि समानपदे","8.3.10:अतिदेशः:नॄन् पे","8.3.11:अतिदेशः:स्वतवान् पायौ","8.3.12:अतिदेशः:कानाम्रेडिते","8.3.13:अतिदेशः:ढो ढे लोपः","8.3.14:अतिदेशः:रो रि","8.3.15:अतिदेशः:खरवसानयोर्विसर्जनीयः","8.3.16:अतिदेशः:रोः सुपि","8.3.17:अतिदेशः:भोभगोअघोअपूर्वस्य योऽशि","8.3.18:अतिदेशः:व्योर्लघुप्रयत्नतरः शाकटायनस्य","8.3.19:अतिदेशः:लोपः शाकल्यस्य","8.3.20:अतिदेशः:ओतो गार्ग्यस्य","8.3.21:अतिदेशः:उञि च पदे","8.3.22:अतिदेशः:हलि सर्वेषाम्","8.3.23:अतिदेशः:मोऽनुस्वारः","8.3.24:अतिदेशः:नश्चापदान्तस्य झलि","8.3.25:अतिदेशः:मो राजि समः क्वौ","8.3.26:अतिदेशः:हे मपरे वा","8.3.27:अतिदेशः:नपरे नः","8.3.28:अतिदेशः:ङ्णोः कुक्टुक् शरि","8.3.29:अतिदेशः:डः सि धुट्","8.3.30:अतिदेशः:नश्च","8.3.31:अतिदेशः:शि तुक्","8.3.32:अतिदेशः:ङमो ह्रस्वादचि ङमुण्नित्यम्","8.3.33:अतिदेशः:मय उञो वो वा","8.3.34:अतिदेशः:विसर्जनीयस्य सः","8.3.35:अतिदेशः:शर्परे विसर्जनीयः","8.3.36:अतिदेशः:वा शरि","8.3.37:अतिदेशः:कुप्वोः XकXपौ च","8.3.38:अतिदेशः:सोऽपदादौ","8.3.39:अतिदेशः:इणः षः","8.3.40:अतिदेशः:नमस्पुरसोर्गत्योः","8.3.41:अतिदेशः:इदुदुपधस्य चाप्रत्ययस्य","8.3.42:अतिदेशः:तिरसोऽन्यतरस्याम्","8.3.43:अतिदेशः:द्विस्त्रिश्चतुरिति कृत्वोऽर्थे","8.3.44:अतिदेशः:इसुसोः सामर्थ्ये","8.3.45:अतिदेशः:नित्यं समासेऽनुत्तरपदस्थस्य","8.3.46:अतिदेशः:अतः कृकमिकंसकुम्भपात्रकुशाकर्णीष्वनव्ययस्य","8.3.47:अतिदेशः:अधःशिरसी पदे","8.3.48:अतिदेशः:कस्कादिषु च","8.3.49:अतिदेशः:छन्दसि वाऽप्राम्रेडितयोः","8.3.50:अतिदेशः:कःकरत्करतिकृधिकृतेष्वनदितेः","8.3.51:अतिदेशः:पञ्चम्याः परावध्यर्थे","8.3.52:अतिदेशः:पातौ च बहुलम्","8.3.53:अतिदेशः:षष्ठ्याः पतिपुत्रपृष्ठपारपदपयस्पोषेषु","8.3.54:अतिदेशः:इडाया वा","8.3.55:अतिदेशः; अधिकारः:अपदान्तस्य मूर्धन्यः","8.3.56:अतिदेशः:सहेः साडः सः","8.3.57:अतिदेशः; अधिकारः:इण्कोः","8.3.58:अतिदेशः:नुम्विसर्जनीयशर्व्यवायेऽपि","8.3.59:अतिदेशः:आदेशप्रत्यययोः","8.3.60:अतिदेशः:शासिवसिघसीनां च","8.3.61:अतिदेशः:स्तौतिण्योरेव षण्यभ्यासात्‌","8.3.62:अतिदेशः:सः स्विदिस्वदिसहीनां च","8.3.63:अतिदेशः:प्राक्सितादड्व्यवायेऽपि","8.3.64:अतिदेशः:स्थाऽऽदिष्वभ्यासेन चाभ्यासय","8.3.65:अतिदेशः:उपसर्गात्‌ सुनोतिसुवतिस्यतिस्तौतिस्तोभतिस्थासेनयसेधसिचसञ्जस्वञ्जाम्","8.3.66:अतिदेशः:सदिरप्रतेः","8.3.67:अतिदेशः:स्तम्भेः","8.3.68:अतिदेशः:अवाच्चालम्बनाविदूर्ययोः","8.3.69:अतिदेशः:वेश्च स्वनो भोजने","8.3.70:अतिदेशः:परिनिविभ्यः सेवसितसयसिवुसहसुट्स्तुस्वञ्जाम्","8.3.71:अतिदेशः:सिवादीनां वाऽड्व्यवायेऽपि","8.3.72:अतिदेशः:अनुविपर्यभिनिभ्यः स्यन्दतेरप्राणिषु","8.3.73:अतिदेशः:वेः स्कन्देरनिष्ठायाम्","8.3.74:अतिदेशः:परेश्च","8.3.75:अतिदेशः:परिस्कन्दः प्राच्यभरतेषु","8.3.76:अतिदेशः:स्फुरतिस्फुलत्योर्निर्निविभ्यः","8.3.77:अतिदेशः:वेः स्कभ्नातेर्नित्यम्","8.3.78:अतिदेशः:इणः षीध्वंलुङ्‌लिटां धोऽङ्गात्‌","8.3.79:अतिदेशः:विभाषेटः","8.3.80:अतिदेशः:समासेऽङ्गुलेः सङ्गः","8.3.81:अतिदेशः:भीरोः स्थानम्","8.3.82:अतिदेशः:अग्नेः स्तुत्स्तोमसोमाः","8.3.83:अतिदेशः:ज्योतिरायुषः स्तोमः","8.3.84:अतिदेशः:मातृपितृभ्यां स्वसा","8.3.85:अतिदेशः:मातुःपितुर्भ्यामन्यतरस्याम्‌","8.3.86:अतिदेशः:अभिनिसः स्तनः शब्दसंज्ञायाम्","8.3.87:अतिदेशः:उपसर्गप्रादुर्भ्यामस्तिर्यच्परः","8.3.88:अतिदेशः:सुविनिर्दुर्भ्यः सुपिसूतिसमाः","8.3.89:अतिदेशः:निनदीभ्यां स्नातेः कौशले","8.3.90:अतिदेशः:सूत्रं प्रतिष्णातम्‌","8.3.91:अतिदेशः:कपिष्ठलो गोत्रे","8.3.92:अतिदेशः:प्रष्ठोऽग्रगामिनि","8.3.93:अतिदेशः:वृक्षासनयोर्विष्टरः","8.3.94:अतिदेशः:छन्दोनाम्नि च","8.3.95:अतिदेशः:गवियुधिभ्यां स्थिरः","8.3.96:अतिदेशः:विकुशमिपरिभ्यः स्थलम्","8.3.97:अतिदेशः:अम्बाम्बगोभूमिसव्यापद्वित्रिकुशेकुशङ्क्वङ्गुमञ्जिपुञ्जिपरमेबर्हिर्दिव्यग्निभ्यः स्थः","8.3.98:अतिदेशः:सुषामादिषु च","8.3.99:अतिदेशः:ऐति संज्ञायामगात्‌","8.3.100:अतिदेशः:नक्षत्राद्वा","8.3.101:अतिदेशः:ह्रस्वात्‌ तादौ तद्धिते","8.3.102:अतिदेशः:निसस्तपतावनासेवने","8.3.103:अतिदेशः:युष्मत्तत्ततक्षुःष्वन्तःपादम्","8.3.104:अतिदेशः:यजुष्येकेषाम्","8.3.105:अतिदेशः:स्तुतस्तोमयोश्छन्दसि","8.3.106:अतिदेशः:पूर्वपदात्‌","8.3.107:अतिदेशः:सुञः","8.3.108:अतिदेशः:सनोतेरनः","8.3.109:अतिदेशः:सहेः पृतनर्ताभ्यां च","8.3.110:अतिदेशः:न रपरसृपिसृजिस्पृशिस्पृहिसवनादीनाम्","8.3.111:अतिदेशः:सात्पदाद्योः","8.3.112:अतिदेशः:सिचो यङि","8.3.113:अतिदेशः:सेधतेर्गतौ","8.3.114:अतिदेशः:प्रतिस्तब्धनिस्तब्धौ च","8.3.115:अतिदेशः:सोढः","8.3.116:अतिदेशः:स्तम्भुसिवुसहां चङि","8.3.117:अतिदेशः:सुनोतेः स्यसनोः","8.3.118:अतिदेशः:सदिष्वञ्जोः परस्य लिटि","8.3.119:अतिदेशः:निव्यभिभ्योऽड्व्यावये वा छन्दसि","8.4.1:अतिदेशः:रषाभ्यां नो णः समानपदे","8.4.2:अतिदेशः:अट्कुप्वाङ्नुम्व्यवायेऽपि","8.4.3:अतिदेशः:पूर्वपदात्‌ संज्ञायामगः","8.4.4:अतिदेशः:वनं पुरगामिश्रकासिध्रकाशारिकाकोटराऽग्रेभ्यः","8.4.5:अतिदेशः:प्रनिरन्तःशरेक्षुप्लक्षाम्रकार्ष्यखदिरपियूक्षाभ्योऽसंज्ञायामपि","8.4.6:अतिदेशः:विभाषौषधिवनस्पतिभ्यः","8.4.7:अतिदेशः:अह्नोऽदन्तात्‌","8.4.8:अतिदेशः:वाहनमाहितात्‌","8.4.9:अतिदेशः:पानं देशे","8.4.10:अतिदेशः:वा भावकरणयोः","8.4.11:अतिदेशः:प्रातिपदिकान्तनुम्विभक्तिषु च","8.4.12:अतिदेशः:एकाजुत्तरपदे णः","8.4.13:अतिदेशः:कुमति च","8.4.14:अतिदेशः:उपसर्गादसमासेऽपि णोपदेशस्य","8.4.15:अतिदेशः:हिनुमीना","8.4.16:अतिदेशः:आनि लोट्","8.4.17:अतिदेशः:नेर्गदनदपतपदघुमास्यतिहन्तियातिवातिद्रातिप्सातिवपतिवहतिशाम्यतिचिनोतिदेग्धिषु च","8.4.18:अतिदेशः:शेषे विभाषाऽकखादावषान्त उपदेशे","8.4.19:अतिदेशः:अनितेः","8.4.20:अतिदेशः:अन्तः","8.4.21:अतिदेशः:उभौ साभ्यासस्य","8.4.22:अतिदेशः:हन्तेरत्पूर्वस्य","8.4.23:अतिदेशः:वमोर्वा","8.4.24:अतिदेशः:अन्तरदेशे","8.4.25:अतिदेशः:अयनं च","8.4.26:अतिदेशः:छन्दस्यृदवग्रहात्‌","8.4.27:अतिदेशः:नश्च धातुस्थोरुषुभ्यः","8.4.28:अतिदेशः:उपसर्गाद् बहुलम्","8.4.29:अतिदेशः:कृत्यचः","8.4.30:अतिदेशः:णेर्विभाषा","8.4.31:अतिदेशः:हलश्च इजुपधात्‌","8.4.32:अतिदेशः:इजादेः सनुमः","8.4.33:अतिदेशः:वा निंसनिक्षनिन्दाम्","8.4.34:अतिदेशः:न भाभूपूकमिगमिप्यायीवेपाम्","8.4.35:अतिदेशः:षात्‌ पदान्तात्‌","8.4.36:अतिदेशः:नशेः षान्तस्य","8.4.37:अतिदेशः:पदान्तस्य","8.4.38:अतिदेशः:पदव्यवायेऽपि","8.4.39:अतिदेशः:क्षुभ्नाऽऽदिषु च","8.4.40:अतिदेशः:स्तोः श्चुना श्चुः","8.4.41:अतिदेशः:ष्टुना ष्टुः","8.4.42:अतिदेशः:न पदान्ताट्टोरनाम्","8.4.43:अतिदेशः:तोः षि","8.4.44:अतिदेशः:शात्‌","8.4.45:अतिदेशः:यरोऽनुनासिकेऽनुनासिको वा","8.4.46:अतिदेशः:अचो रहाभ्यां द्वे","8.4.47:अतिदेशः:अनचि च","8.4.48:अतिदेशः:नादिन्याक्रोशे पुत्रस्य","8.4.49:अतिदेशः:शरोऽचि","8.4.50:अतिदेशः:त्रिप्रभृतिषु शाकटायनस्य","8.4.51:अतिदेशः:सर्वत्र शाकल्यस्य","8.4.52:अतिदेशः:दीर्घादाचार्याणाम्","8.4.53:अतिदेशः:झलां जश् झशि","8.4.54:अतिदेशः:अभ्यासे चर्च्च","8.4.55:अतिदेशः:खरि च","8.4.56:अतिदेशः:वाऽवसाने","8.4.57:अतिदेशः:अणोऽप्रगृह्यस्यानुनासिकः","8.4.58:अतिदेशः:अनुस्वारस्य ययि परसवर्णः","8.4.59:अतिदेशः:वा पदान्तस्य","8.4.60:अतिदेशः:तोर्लि","8.4.61:अतिदेशः:उदः स्थास्तम्भोः पूर्वस्य","8.4.62:अतिदेशः:झयो होऽन्यतरस्याम्","8.4.63:अतिदेशः:शश्छोऽटि","8.4.64:अतिदेशः:हलो यमां यमि लोपः","8.4.65:अतिदेशः:झरो झरि सवर्णे","8.4.66:अतिदेशः:उदात्तादनुदात्तस्य स्वरितः","8.4.67:अतिदेशः:नोदात्तस्वरितोदयमगार्ग्यकाश्यपगालवानाम्‌","8.4.68:अतिदेशः:अ अ इति"); // adanta dhAtus of curAdi need special treatment. Database corrected on 7 Jan 2015.
$verbdata = array("aMsa:samAGAte:aMsa:10:0460:u:sew:अं॑स॑","ahi!:BAzArTaH ca:aMh:10:0328:u:sew:अ॑हिँ॑","ahi!:gatO:aMh:01:0722:A:sew:अ॑हिँ॒","aka!:kuwilAyAM gatO:ak:01:0901:pa:sew:अ॑कँ॑","akzU!:vyAptO:akz:01:0742:pa:sew:अ॑क्षूँ॑","aga!:kuwilAyAM gatO:ag:01:0902:pa:sew:अ॑गँ॑","aNka:pade lakzaRe ca:aNka:10:0473:u:sew:अ॑ङ्क॑","aki!:lakzaRe:aNk:01:0092:A:sew:अ॑किँ॒","aNga:pade lakzaRe ca:aNga:10:0474:u:sew:अ॑ङ्ग॑","agi!:gatyarTaH:aNg:01:0155:pa:sew:अ॑गिँ॑","aGi!:gatyAkzepe gatO gatyAramBe cetyapare:aNG:01:0115:A:sew:अ॑घिँ॒","acu!:gatO yAcane ca ityeke:ac:01:0999:u:sew:अ॑चुँ॒॑","aja!:gatikzapanayoH:aj:01:0262:pa:sew:अ॑जँ॑","aci!:gatO yAcane ca ityepare:aYc:01:1000:u:sew:अ॑चिँ॑","aYcu!:gatipUjanayoH:aYc:01:0998:pa:sew:अ॑ञ्चुँ॑","aYcu!:gatO yAcane ca:aYc:01:0215:u:sew:अ॑ञ्चुँ॒॑","aYcu!:viSezaRe:aYc:10:0266:u:sew:अ॑ञ्चुँ॑","aji!:BAzArTaH ca:aYj:10:0021:u:sew:अ॑जिँ॑","aYjU!:vyaktimrakzaRakAntigatizu vyaktimarzaRakAntigatizu:aYj:07:0316:pa:sew:अ॑ञ्जूँ॑","awa!:gatO:aw:01:0332:pa:sew:अ॑टँ॑","awwa!:anAdare:aww:10:0037:u:sew:अ॑ट्टँ॑","awwa!:atikramaRahiMsanayoH atikramahiMsayoH:aww:01:0287:A:sew:अ॑ट्टँ॒","aqa!:udyame:aq:01:0414:pa:sew:अ॑डँ॑","aqqa!:aBiyoge:aqq:01:0403:pa:sew:अ॑ड्डँ॑","aRa!:SabdArTaH:aR:01:0512:pa:sew:अ॑णँ॑","aRa!:prARane:aR:04:0071:A:sew:अ॑णँ॒","aWi!:gatO:aRW:01:0294:A:sew:अ॑ठिँ॒","ata!:sAtatyagamane:at:01:0038:pa:sew:अ॑तँ॑","ada!:BakzaRe:ad:02:0001:pa:aniw:अ॒दँ॑","aqqa!:aBiyoge:adq:01:0403:pa:sew:अ॑ड्डँ॑","iN:aDyayane nityamaDipUrvaH:aDI aDi'i:02:0041:pa:aniw:इ॒ङ्","ik:smaraRe ayamapyaDipUrvaH:aDIaDi'i:02:0042:pa:aniw:इ॒क्","anuruDa!:kAme:anuruD:04:0070:A:aniw:अ॑नुरु॒धँ॒","ana!:prARane ityeke:an:04:0072:A:sew:अ॑नँ॒","ana!:ca prARane:an:02:0065:pa:sew:अ॑नँ॑","ati!:banDane:ant:01:0063:pa:sew:अ॑तिँ॑","adi!:banDane:and:01:0064:pa:sew:अ॑दिँ॑","anDa:dfzwyupaGAte upasaMhAra ityanye:anDa:10:0471:u:sew:अ॑न्ध॑","aBra!:gatyarTaH:aBr:01:0637:pa:sew:अ॑भ्रँ॑","ama!:gatyAdizu gatO Sabde samBaktO ca:am:01:0536:pa:sew:अ॑मँ॑","ama!:roge na mit 1950:am:10:0245:u:sew:अ॑मँ॑","abi!:Sabde:amb:01:0438:A:sew:अ॑बिँ॒","aBi!:Sabde kvacitpaWyate:amB:01:0448:A:sew:अ॑भिँ॒","aya!:gatO:ay:01:1031:A:sew:अ॑यँ॒","aya!:gatO:ay:01:0546:u:sew:अ॑यँ॒॑","arka!:stavane:ark:10:0145:u:sew:अ॑र्कँ॑","arGa!:mUlye:arG:01:0185:pa:sew:अ॑र्घँ॑","arca!:pUjAyAm:arc:01:0232:pa:sew:अ॑र्चँ॑","arca!:pUjAyAm:arc:10:0340:u:sew:अ॑र्चँ॑","arja!:arjane:arj:01:0256:pa:sew:अ॑र्जँ॑","arja!:pratiyatne sampAdane ca:arj:10:0250:u:sew:अ॑र्जँ॑","arTa:upayAcYAyAm:arTa:10:0447:A:sew:अ॑र्थ॒","arda!:hiMsAyAm:ard:10:0365:u:sew:अ॑र्दँ॑","arda!:gatO yAcane ca:ard:01:0057:pa:sew:अ॑र्दँ॑","arba!:gatO:arb:01:0481:pa:sew:अ॑र्बँ॑","arva!:hiMsAyAm:arv:01:0667:pa:sew:अ॑र्वँ॑","arha!:pUjAyAm:arh:10:0257:u:sew:अ॑र्हँ॑","arha!:pUjAyAm:arh:10:0367:u:sew:अ॑र्हँ॑","arha!:pUjAyAm:arh:01:0841:pa:sew:अ॑र्हँ॑","ala!:BUzaRaparyAptivAraRezu:al:01:0593:pa:sew:अ॑लँ॑","ava!:rakzaRagatikAntiprItitfptyavagamapraveSaSravaRasvAmyarTayAcanakriyecCAdIptyavAptyAliNganahiMsAdAnaBAgavfdDizu:av:01:0684:pa:sew:अ॑वँ॑","aSa!:Bojane:aS:09:0059:pa:sew:अ॑शँ॑","aSU!:vyAptO saNGAte ca:aS:05:0020:A:sew:अ॑शूँ॒","aza!:gatidIptyAdAnezu ityeke:az:01:1030:u:sew:अ॑षँ॒॑","asu!:kzepane:as:04:0106:pa:sew:अ॑सुँ॑","asa!:gatidIptyAdAnezu:as:01:1029:u:sew:अ॑सँ॒॑","asa!:Buvi:as:02:0060:pa:sew:अ॑सँ॑","aha!:vyAptO:ah:05:0029:pa:sew:अ॑हँ॑","Akranda!:sAtatye:Akrand:10:0252:u:sew:आ॑क्रन्दँ","ACi!:AyAme:AYC:01:0237:pa:sew:आ॑छिँ॑","Apx!:lamBane:Ap:05:0016:pa:aniw:आ॒पॢँ॑","Apx!:vyAptO:Ap:10:0376:u:sew:आ॑पॢँ॑","ASasi:icCAyAm:ASaMs:01:0716:A:sew:आ॑श॒सि","ASAsu!:icCAyAm:ASAs:02:0012:A:sew:आ॑शा॒सुँ","Azada!:padyarTe:Asad:10:0368:u:sew:आ॒षदँ","Asa!:upaveSane:As:02:0011:A:sew:आ॑सँ॒","iN:aDyayane nityamaDipUrvaH:i:02:0042:A:aniw:इ॒ङ्","iR:gatO:i:02:0041:pa:aniw:इ॒ण्","ik:smaraRe ayamapyaDipUrvaH:i:02:0040:pa:aniw:इ॒क्","iKa!:gatyarTaH:iK:01:0148:pa:sew:इ॑खँ॑","iKi!:gatyarTaH:iNK:01:0149:pa:sew:इ॑खिँ॑","igi!:gatyarTaH:iNg:01:0163:pa:sew:इ॑गिँ॑","iwa!:gatO:iw:01:0357:pa:sew:इ॑टँ॑","idi!:paramESvarye:ind:01:0065:pa:sew:इ॑दिँ॑","YiinDI!:dIptO:inD:07:0011:A:sew:ञिइ॒न्धीँ॑","ivi!:vyAptO:inv:01:0670:pa:sew:इ॑विँ॑","ila!:preraRe:il:10:0084:u:sew:इ॑लँ॑","ila!:svapnakzepanayoH:il:06:0167:pa:sew:इ॑लँ॑","iza!:icCAyAm:iz:06:0078:pa:sew:इ॑षँ॑","iza!:Iza! gatO:iz:04:0022:pa:sew:इ॑षँ॑","iza!:ABIkzRye:iz:09:0061:pa:sew:इ॑षँ॑","IN:gatO:I:04:0038:A:aniw:ई॒ङ्","Ikza!:darSane:Ikz:01:0694:A:sew:ई॑क्षँ॒","IKi!:gatyarTaH:IK:01:0150:pa:sew:ई॑खिँ॑","IKi!:gatyarTaH:INK:01:0151:pa:sew:ई॑खिँ॑","Ija:gatikutsanayoH:Ij:01:0207:A:sew:ई॑ज॒","Iji!:gatikutsanayoH ityeke:IYj:01:0208:A:sew:ई॑जिँ॒","Iqa!:stutO:Iq:10:0009:u:sew:ई॑डँ॑","Iqa!:stutO:Iq:02:0183:A:sew:ई॑डँ॒","Ira!:kzepe:Ir:10:0008:u:sew:ई॑रँ॑","Ira!:gatO kampane ca:Ir:02:0342:A:sew:ई॑रँ॒","Irkzya!:IrzyArTaH:Irkzy:01:0587:pa:sew:ई॑र्क्ष्यँ॑","Irzya!:IrzyArTAH:Irzy:01:0588:pa:sew:ई॑र्ष्यँ॑","ISa!:ESvarye:IS:02:0010:A:sew:ई॑शँ॒","Iza!:uYCe:Iz:01:0780:pa:sew:ई॑षँ॑","Iza!:gatihiMsAdarSanezu:Iz:01:0695:A:sew:ई॑षँ॒","Iha!:cezwAyAm:Ih:01:0719:A:sew:ई॑हँ॒","uN:Sabde:u:01:1102:A:aniw:उ॒ङ्","ukza!:secane:ukz:01:0745:pa:sew:उ॑क्षँ॑","uKa!:gatyarTaH:uK:01:0136:pa:sew:उ॑खँ॑","uKi!:gatyarTaH:uNK:01:0137:pa:sew:उ॑खिँ॑","uca!:samavAye:uc:04:0135:pa:sew:उ॑चँ॑","uCI!:vivAse:uC:06:0015:pa:sew:उ॑छीँ॑","uCI!:vivAse:uC:01:0244:pa:sew:उ॑छीँ॑","ujJa!:utsarge:ujJ:06:0024:pa:sew:उ॑ज्झँ॑","uCi!:uYCe:uYC:06:0014:pa:sew:उ॑छिँ॑","uCi!:uYCe:uYC:01:0243:pa:sew:उ॑छिँ॑","uWa!:upaGAte ityeke:uW:01:0852:pa:sew:उ॑ठँ॑","uWa!:upaGAte pratiGAte:uW:01:0392:A:sew:उ॑ठँ॒","kaWi!:Soke prAyeRotpUrva utkaRWAvacanaH:utkaRW:10:0385:u:sew:क॑ठिँ॑","ujJa!:utsarge:udJ:06:0024:pa:sew:उ॑ज्झँ॑","uGrasa!:uYCe ityeke:uDras:10:0271:u:sew:उ॑घ्र॑सँ॑","undI!:kledane:und:07:0020:pa:sew:उ॑न्दीँ॑","ubja!:Arjave:ubj:06:0023:pa:sew:उ॑ब्जँ॑","uBa!:pUraRe:uB:06:0044:pa:sew:उ॑भँ॑","umBa!:pUraRe:umB:06:0045:pa:sew:उ॑म्भँ॑","urda!:mAne krIqAyAM ca:urd:01:0020:A:sew:उ॑र्दँ॒","urvI!:hiMsArTaH:urv:01:0650:pa:sew:उ॑र्वीँ॑","uza!:dAhe:uz:01:0792:pa:sew:उ॑षँ॑","uhi!r:ardane:uh:01:0840:pa:sew:उ॑हिँ॑र्","UWa!:upaGAte:UW:01:0391:pa:sew:ऊ॑ठँ॑","Una:parihARe:Una:10:0430:u:sew:ऊ॑न॑","UyI!:tantusantAne:Uy:01:0556:A:sew:ऊ॑यीँ॒","Urja!:balaprARanayoH:Urj:10:0023:u:sew:ऊ॑र्जँ॑","UrRuY:AcCAdane:UrRu:02:0034:u:sew:ऊ॑र्णु॑ञ्","Uza!:rujAyAm:Uz:01:0779:pa:sew:ऊ॑षँ॑","Uha!:vitarke:Uh:01:0735:A:sew:ऊ॑हँ॒","f:gatO:f:03:0017:pa:aniw:ऋ॒","f:hiMsAyAm ityeke:f:05:0038:pa:sew:ऋ॑","f:gatiprApaRayoH:f:01:1086:pa:aniw:ऋ॒","fca!:stutO:fc:06:0022:pa:sew:ऋ॑चँ॑","fCa!:gatIndriyapralayamUrtiBAvezu:fC:06:0016:pa:sew:ऋ॑छँ॑","fja!:gatisTAnArjanopArjanezu:fj:01:0200:A:sew:ऋ॑जँ॒","fji!:Barjane:fYj:01:0201:A:sew:ऋ॑जिँ॒","fRu!:gatO:fR:08:0005:u:sew:ऋ॑णुँ॒॑","fDu!:vfdDO:fD:05:0027:pa:sew:ऋ॑धुँ॑","fDu!:vfdDO:fD:04:0160:pa:sew:ऋ॑धुँ॑","fPa!:hiMsAyAm:fP:06:0040:pa:sew:ऋ॑फँ॑","fmPa!:hiMsAyAm:fmP:06:0041:pa:sew:ऋ॑म्फँ॑","fzI!:gatO:fz:06:0007:pa:sew:ऋ॑षीँ॑","F:gatO:F:09:0032:pa:sew:ॠ","ejf!:dIptO:ej:01:0203:A:sew:ए॑जृँ॒","ejf!:kampane:ej:01:0267:pa:sew:ए॑जृँ॑","eWa!:ca vibADAyAM:eW:01:0300:A:sew:ए॑ठँ॒","eDa!:vfdDO:eD:01:0002:A:sew:ए॑धँ॒","ezf!:gatO:ez:01:0705:A:sew:ए॑षृँ॒","ezf!:prayatne ityeke:ez:01:0701:A:sew:ए॑षृँ॒","oKf!:SozaRAlamarTyoH:oK:01:0129:pa:sew:ओ॑खृँ॑","oRf!:apanayane:oR:01:0523:pa:sew:ओ॑णृँ॑","o!laqi!:utkzepane ityeke:olaRq:10:0014:u:sew:ओँ॑ल॑डिँ॑","kasi!:gatiSAsanayoH:kaMs:02:0014:A:sew:क॑सिँ॒","kaka!:lOlye:kak:01:0095:A:sew:क॑कँ॒","kaKa!:hasane:kaK:01:0128:pa:sew:क॑खँ॑","kaKe!:hasane:kaK:01:0893:pa:sew:क॑खेँ॑","kage!:nocyate kriyAsAmAnyArTatvAt anekArTatvAdityanye:kag:01:0900:pa:sew:क॑गेँ॑","kaki!:gatyarTaH:kaNk:01:0099:A:sew:क॑किँ॒","kaca!:banDane:kac:01:0192:A:sew:क॑चँ॒","kaja!:made ityeke:kaj:01:0265:pa:sew:क॑जँ॑","kaci!:dIptibanDanayoH:kaYc:01:0193:A:sew:क॑चिँ॒","kawI!:gatO:kaw:01:0330:pa:sew:क॑टीँ॑","kawe!:varzAvaraRayoH:kaw:01:0359:pa:sew:क॑टेँ॑","kaWa!:kfcCrajIvane:kaW:01:0385:pa:sew:क॑ठँ॑","kaqa!:made:kaq:06:0108:pa:sew:क॑डँ॑","kaqa!:made:kaq:01:0417:pa:sew:क॑डँ॑","kaqqa!:kArkaSye:kaqq:01:0404:pa:sew:क॑ड्डँ॑","kaRa!:gatO:kaR:01:0517:pa:sew:क॑णँ॑","kaRa!:SabdArTaH:kaR:01:0903:pa:sew:क॑णँ॑","kaRa!:nimIlane:kaR:10:0240:u:sew:क॑णँ॑","kaWi!:Soke:kaRW:01:0297:A:sew:क॑ठिँ॒","kaWi!:Soke prAyeRotpUrva utkaRWAvacanaH:kaRW:10:0385:u:sew:क॑ठिँ॑","kaqi!:made ityeke:kaRq:01:0418:pa:sew:क॑डिँ॑","kaqi!:KaRqane Bedane:kaRq:10:0067:u:sew:क॑डिँ॑","kaqi!:made:kaRq:01:0316:A:sew:क॑डिँ॒","katra:SETilye:kattra:10:0456:u:sew:क॑त्र॑","katTa!:SlAGAyAm:katT:01:0037:A:sew:क॑त्थँ॒","katra:SETilye:katra:10:0456:u:sew:क॑त्र॑","kaTa:vAkyaprabanDe vAkyaprabanDane:kaTa:10:0389:u:sew:क॑थ॑","kada!:vEklavye vEkalya ityeke ityanye:kad:01:0881:A:sew:क॑दँ॒","kaqqa!:kArkaSye:kadq:01:0404:pa:sew:क॑ड्डँ॑","kanI!:dIptikAntigatizu:kan:01:0531:pa:sew:क॑नीँ॑","kadi!:AhvAne rodane ca:kand:01:0878:pa:sew:क॑दिँ॑","kadi!:vEklavye vEkalya ityeke:kand:01:0073:A:sew:क॑दिँ॒","kapa!:kfpAyAM gatO ca ityanye:kap:01:0877:A:sew:क॑पँ॒","kabf!:varRe:kab:01:0440:A:sew:क॑बृँ॒","kamu!:kAntO na mit 1949:kam:01:0511:A:sew:क॑मुँ॒","kapi!:calane:kamp:01:0435:A:sew:क॑पिँ॒","karja!:vyaTane:karj:01:0260:pa:sew:क॑र्जँ॑","karRa!:Bedane iti DAtvantaramityapare:karR:10:0470:u:sew:क॑र्णँ॑","karta!:ityapyeke:kart:10:0457:u:sew:क॑र्तँ॑","karda!:kutsite Sabde:kard:01:0061:pa:sew:क॑र्दँ॑","karba!:gatO:karb:01:0486:pa:sew:क॑र्बँ॑","karva!:darpe:karv:01:0664:pa:sew:क॑र्वँ॑","kala:gatO saNKyAne ca:kala:10:0404:u:sew:क॑ल॑","kala:kzepe:kala:10:0093:u:sew:क॑ल॑","kala!:SabdasaNKyAnayoH:kal:01:0570:A:sew:क॑लँ॒","kalla!:avyakte Sabde aSabda ityeke:kall:01:0571:A:sew:क॑ल्लँ॒","kaSa!:gatiSAsanayoH ityanye ityapi:kaS:02:0016:A:sew:क॑शँ॒","kaza!:hiMsArTaH:kaz:01:0781:pa:sew:क॑षँ॑","kasa!:gatiSAsanayoH ityeke:kas:02:0015:A:sew:क॑सँ॒","kasa!:gatO:kas:01:0996:pa:sew:क॑सँ॑","kAkzi!:kANkzAyAm:kANkz:01:0760:pa:sew:का॑क्षिँ॑","kAci!:dIptibanDanayoH:kAYc:01:0194:A:sew:का॑चिँ॒","kAla:kAlopadeSe ca iti pfTagDAturityeke:kAla:10:0422:u:sew:का॑ल॑","kASf!:dIptO:kAS:04:0058:A:sew:का॑शृँ॒","kASf!:dIptO:kAS:01:0734:A:sew:का॑शृँ॒","kAsf!:SabdakutsAyAm:kAs:01:0710:A:sew:का॑सृँ॒","ki:jYAne:ki:03:0020:pa:aniw:कि॒","kiwa!:gatO:kiw:01:0338:pa:sew:कि॑टँ॑","kiwa!:trAse:kiw:01:0358:pa:sew:कि॑टँ॑","kita!:jYAne ca:kit:03:0021:pa:sew:कि॑तँ॑","kita!:nivAse rogApanayane ca:kit:01:1148:pa:sew:कि॑तँ॑","kila!:SvEtyakrIqanayoH SvEtye:kil:06:0080:pa:sew:कि॑लँ॑","kIwa!:varRe varaRe:kIw:10:0142:u:sew:की॑टँ॑","kIla!:banDane:kIl:01:0602:pa:sew:की॑लँ॑","kuN:Sabde:ku:01:0128:A:aniw:कु॒ङ्","ku:Sabde:ku:02:0127:pa:aniw:कु॒","kuN:Sabde:ku:06:0296:A:aniw:कु॑ङ्","kuSi!:BAzArTaH:kuMS:10:1103:u:sew:कु॑शिँ॑","kuMSa!:saMSlezaRe SlezaRe ityapare:kuMS:04:0294:pa:sew:कुं॑शँ॑","kusi!:BAzArTaH:kuMs:10:0037:u:sew:कु॑सिँ॑","kuMsa!:saMSlezaRe SlezaRe ityanye:kuMs:04:0136:pa:sew:कुं॑सँ॑","kuka!:AdAne:kuk:01:0096:A:sew:कु॑कँ॒","kuca!:Sabde tAre:kuc:01:0211:pa:sew:कु॑चँ॑","kuca!:saNkocane:kuc:06:0095:pa:sew:कु॑चँ॑","kuca!:samparcanakOwilyapratizwamBavileKanezu:kuc:01:0993:pa:sew:कु॑चँ॑","kuju!:steyakaraRe:kuj:01:0226:pa:sew:कु॑जुँ॑","kuYca!:kOwilyAlpIBAvayoH:kuYc:01:0212:pa:sew:कु॑ञ्चँ॑","kuji!:avyakte Sabde:kuYj:01:0255:pa:sew:कु॑जिँ॑","kuwa!:Cedane ityeke:kuw:10:0093:A:sew:कु॑टँ॒","kuwa!:kOwilye:kuw:06:0222:pa:sew:कु॑टँ॑","kuwwa!:CedanaBartsanayoH:kuww:10:0034:u:sew:कु॑ट्टँ॑","kuwwa!:pratApane:kuww:10:0226:A:sew:कु॑ट्टँ॒","kuqa!:bAlye:kuq:06:0113:pa:sew:कु॑डँ॑","kuRa:AmantraRe:kuRa:10:0435:u:sew:कु॑ण॑","kuRa!:SabdopakaraRayoH SabdopatApayoH:kuR:06:0061:pa:sew:कु॑णँ॑","kuwi!:vEkalye ityeke:kuRw:01:0363:pa:sew:कु॑टिँ॑","kuWi!:rakzaRe vezwane ca rakzaRa ityeke ityanye:kuRW:10:0070:u:sew:कु॑ठिँ॑","kuWi!:ca gatipratiGAte pratiGAte ityeke:kuRW:01:0397:pa:sew:कु॑ठिँ॑","kuqi!:anftaBAzaRe ityapare:kuRq:10:0068:u:sew:कु॑डिँ॑","kuqi!:dAhe:kuRq:01:0303:A:sew:कु॑डिँ॒","kuqi!:rakzaRe:kuRq:10:0009:u:sew:कु॑डिँ॑","kuqi!:vEkalye:kuRq:01:0362:pa:sew:कु॑डिँ॑","kutsa!:avakzepane:kuts:10:0220:A:sew:कु॑त्सँ॒","kuTa!:pUtIBAve:kuT:04:0012:pa:sew:कु॑थँ॑","kudf!:anftaBAzaRe ityeke:kud:10:0008:u:sew:कु॑दृँ॑","kuTi!:hiMsAsaNkleSanayoH:kunT:01:0045:pa:sew:कु॑थिँ॑","kunTa!:saMSlezaRe:kunT:09:0050:pa:sew:कु॑न्थँ॑","kudri!:anftaBAzaRe:kundr:10:0007:u:sew:कु॑द्रिँ॑","kupa!:BAzArTaH:kup:10:0146:u:sew:कु॑पँ॑","kupa!:kroDe:kup:04:0310:pa:sew:कु॑पँ॑","kumAra:krIqAyAm:kumAra:10:0418:u:sew:कु॑मा॑र॑","kubi!:AcCAdane CAdane:kumb:10:0157:u:sew:कु॑बिँ॑","kubi!:AcCAdane CAdane:kumb:01:0492:pa:sew:कु॑बिँ॑","kuBi!:AcCAdane CAdane ityeke:kumB:10:0158:u:sew:कु॑भिँ॑","kura!:Sabde:kur:06:0067:pa:sew:कु॑रँ॑","kurda:krIqAyAmeva:kurd:01:0021:A:sew:कु॑र्द॒","kula!:saMstyAne banDuzu ca:kul:01:0976:pa:sew:कु॑लँ॑","kuSa!:saMSlezaRe SlezaRe ityeke:kuS:04:0126:pa:sew:कु॑शँ॑","kuza!:nizkarze:kuz:09:0054:pa:sew:कु॑षँ॑","kusa!:saMSlezaRe SlezaRe:kus:04:0125:pa:sew:कु॑सँ॑","kusma!:nAmno vA kutsismayane:kusm:10:0236:A:sew:कु॑स्मँ॒","kuha:vismApane:kuha:10:0443:A:sew:कु॑ह॒","kUN:Sabde ityeke:kU:06:0137:A:sew:कू॑ङ्","kUja!:avyakte Sabde:kUj:01:0254:pa:sew:कू॑जँ॑","kUwa:paritApe paridAha ityanye:kUwa:10:0432:u:sew:कू॑ट॑","kUwa:apradAne avasAdana ityeke:kUwa:10:0225:A:sew:कू॑ट॒","kURa!:SrAvaRe nimantraRe ca saNkocane'pi:kUR:10:0438:u:sew:कू॑णँ॑","kURa!:saNkocane:kUR:10:0211:A:sew:कू॑णँ॒","kUla!:AvaraRe:kUl:01:0603:pa:sew:कू॑लँ॑","qukfY:karaRe:kf:08:0010:u:aniw:डुकृ॒ञ्","kfY:karaRe:kf:01:1048:u:aniw:कृ॒ञ्","kfY:hiMsAyAm:kf:05:0007:u:aniw:कृ॒ञ्","kfqa!:Ganatve:kfq:06:0112:pa:sew:कृ॑डँ॑","kfvi!:hiMsAkaraRayoSca:kfRv:01:0682:pa:sew:कृ॑विँ॑","kftI!:Cedane:kft:06:0171:pa:sew:कृ॑तीँ॑","kftI!:vezwane:kft:07:0010:pa:sew:कृ॑तीँ॑","kfpa:dOrbalye:kfpa:10:0408:u:sew:कृ॑प॑","kfpeSca:avakalkane miSrIkaraRa ityeke cintana ityanye:kfp:10:0278:u:sew:कृ॒पे॑श्च॒॑","kfpa!:krapa!m kapa!m kfpAyAM gatO ca:kfp:01:0866:A:sew:कृ॑पँ॒","kfpU!:sAmarTye:kfp:01:0875:A:sew:कृ॑पूँ॒","kfSa!:tanUkaraRe:kfS:04:0140:pa:sew:कृ॑शँ॑","kfza!:vileKane:kfz:06:0006:u:aniw:कृ॒षँ॒॑","kfza!:vileKane:kfz:01:1145:pa:aniw:कृ॒षँ॑","kF:vikzepe nikzepe:kF:06:0145:pa:sew:कॄ॑","kFY:hiMsAyAm:kF:09:0018:u:sew:कॄ॑ञ्","kF:hiMsAyAm:kF:09:0031:pa:sew:कॄ॑","kFta!:saMSabdane:kFt:10:0155:u:sew:कॄ॑तँ॑","kfpU!:sAmarTye:kxp:01:0866:A:sew:कृ॑पूँ॒","keta:SrAvaRe nimantraRe ca:keta:10:0437:u:sew:के॑त॑","kepf!:kampane ca:kep:01:0426:A:sew:के॑पृँ॒","kelf!:calane:kel:01:0616:pa:sew:के॑लृँ॑","kevf!:sevane ityapyeke:kev:01:0583:A:sew:के॑वृँ॒","kE:Sabde:kE:01:1064:pa:aniw:कै॒","knaTa!:hiMsArTaH:knaT:01:0911:pa:sew:क्न॑थँ॑","knasu!:hvaraRadIptyoH mit 1939:knas:04:0007:pa:sew:क्न॑सुँ॑","knUY:Sabde:knU:09:0012:u:sew:क्नू॑ञ्","knUyI!:Sabda unde ca:knUy:01:0558:A:sew:क्नू॑यीँ॒","kmara!:hUrCane:kmar:01:0636:pa:sew:क्म॑रँ॑","kraTa!:hiMsArTaH:kraT:01:0912:pa:sew:क्र॑थँ॑","krada!:vEklavye vEkalya ityeke ityanye:krad:01:0882:A:sew:क्र॑दँ॒","kradi!:AhvAne rodane ca:krand:01:0879:pa:sew:क्र॑दिँ॑","kradi!:vEklavye vEkalya ityeke:krand:01:0074:A:sew:क्र॑दिँ॒","krapa!:kfpAyAM gatO ca ityeke:krap:01:0876:A:sew:क्र॑पँ॒","kramu!:pAdavikzepe:kram:01:0545:pa:sew:क्र॑मुँ॑","qukrIY:dravyavinimaye:krI:09:0001:u:aniw:डुक्री॒ञ्","krIqf!:vihAre:krIq:01:0405:pa:sew:क्री॑डृँ॑","kruYca!:kOwilyAlpIBAvayoH:kruYc:01:0213:pa:sew:क्रु॑ञ्चँ॑","kruqa!:nimajjane ityeke:kruq:06:0128:pa:sew:क्रु॑डँ॑","kruDa!:kroDe kope:kruD:04:0086:pa:aniw:क्रु॒धँ॑","kruSa!:AhvAne rodane ca:kruS:01:0992:pa:aniw:क्रु॒शँ॑","klaTa!:hiMsArTAH:klaT:01:0913:pa:sew:क्ल॑थँ॑","klada!:vEklavye vEkalya ityeke ityanye:klad:01:0883:A:sew:क्ल॑दँ॒","kladi!:AhvAne rodane ca:kland:01:0880:pa:sew:क्ल॑दिँ॑","kladi!:vEklavye vEkalya ityeke ityanye:kland:01:0075:A:sew:क्ल॑दिँ॒","klapa!:vyaktAyAM vAci ityeke:klap:10:0162:u:sew:क्ल॑पँ॑","klamu!:glAnO:klam:04:0104:pa:sew:क्ल॑मुँ॑","klidU!:AdrIBAve:klid:04:0157:pa:sew:क्लि॑दूँ॑","klidi!:paridevane:klind:01:0015:A:sew:क्लि॑दिँ॒","klidi!:paridevane:klind:01:0076:pa:sew:क्लि॑दिँ॑","kliSa!:upatApe:kliS:04:0057:A:sew:क्लि॑शँ॒","kliSU!:vibADane:kliS:09:0058:pa:sew:क्लि॑शूँ॑","klIbf!:aDArzWye:klIb:01:0441:A:sew:क्ली॑बृँ॒","kluN:gatO ityeke:klu:01:1113:A:aniw:क्लु॒ङ्","kleSa!:avyaktAyAM vAci bADana ityanye iti durgaH:kleS:01:0691:A:sew:क्ले॑शँ॒","kvaRa!:SabdArTaH:kvaR:01:0518:pa:sew:क्व॑णँ॑","kvaTe!:nizpAke:kvaT:01:0981:pa:sew:क्व॑थेँ॑","kzaji!:kfcCrajIvane:kzaYj:10:0113:u:sew:क्ष॑जिँ॑","kzaji!:gatidAnayoH:kzaYj:01:0873:A:sew:क्ष॑जिँ॒","kzaRu!:hiMsAyAm:kzaR:08:0003:u:sew:क्ष॑णुँ॒॑","kzapa!:preraRe:kzap:10:0487:u:sew:क्ष॑पँ॑","kzapayaSca:mit iti BojaH:kzap:01:0935:pa:sew:क्ष॒प॑य॒॑श्च॑","kzamU!:sahane:kzam:04:0103:pa:sew:क्ष॑मूँ॑","kzamU!z:sahane:kzam:01:0510:A:sew:क्ष॑मूँ॒ष्","kzapi!:kzAntyAm:kzamp:10:0112:u:sew:क्ष॑पिँ॑","kzara!:saYcalane:kzar:01:0986:pa:sew:क्ष॑रँ॑","kzala!:SOcakarmaRi:kzal:10:0086:u:sew:क्ष॑लँ॑","kzi:kzI' hiMsAyAm kzirBAzAyAmityeke:kzi:05:0033:pa:sew:क्षि॑","kzi:kzaye:kzi:01:0269:pa:aniw:क्षि॒","kzi:nivAsagatyoH:kzi:06:0143:pa:aniw:क्षि॒","kziRu!:hiMsAyAm ca:kziR:08:0004:u:sew:क्षि॑णुँ॒॑","kzipa!:preraRe:kzip:06:0005:u:aniw:क्षि॒पँ॒॑","kzipa!:prerane:kzip:04:0015:pa:aniw:क्षि॒पँ॑","kzivu!:nirasane:kziv:01:0648:pa:sew:क्षि॑वुँ॑","kzI:hiMsAyAm ityeke kzirBAzAyAmityeke:kzI:05:0039:pa:sew:क्षी॑","kzIja!:avyakte Sabde:kzIj:01:0270:pa:sew:क्षी॑जँ॑","kzIbf!:made:kzIb:01:0442:A:sew:क्षी॑बृँ॒","kzIvf!:made ityeke:kzIv:01:0443:A:sew:क्षी॑वृँ॒","kzIz:hiMsAyAm:kzIz:09:0042:pa:aniw:क्षी॒ष्","wukzu:Sabde:kzu:02:0031:pa:sew:टु॑क्षु॑","kzudi!r:samprezaRe:kzud:07:0006:u:aniw:क्षु॒दिँ॒॑र्","kzuDa!:buBukzAyAm:kzuD:04:0087:pa:aniw:क्षु॒धँ॑","kzuBa!:saYcalane:kzuB:09:0055:pa:sew:क्षु॑भँ॑","kzuBa!:saYcalane:kzuB:04:0154:pa:sew:क्षु॑भँ॑","kzuBa!:saYcalane:kzuB:01:0854:A:sew:क्षु॑भँ॒","kzura!:vileKane:kzur:06:0070:pa:sew:क्षु॑रँ॑","kzura!:saYcaye:kzur:01:0987:pa:sew:क्षु॑रँ॑","kzevu!:nirasane:kzev:01:0649:pa:sew:क्षे॑वुँ॑","kzE:kzaye:kzE:01:1061:pa:aniw:क्षै॒","kzowa:kzepe:kzowa:10:0416:u:sew:क्षो॑ट॑","kzRu:tejane:kzRu:02:0032:pa:sew:क्ष्णु॑","kzmAyI!:viDUnane:kzmAy:01:0559:A:sew:क्ष्मा॑यीँ॒","kzmIla!:nimezaRe:kzmIl:01:0598:pa:sew:क्ष्मी॑लँ॑","YikzvidA!:snehanamocanayoH gAtraprasravaRe:kzvid:01:1133:A:sew:ञिक्ष्वि॑दाँ॑","YikzvidA!:avyakte Sabde:kzvid:01:1133:pa:sew:ञिक्ष्वि॑दाँ॑","YikzvidA!:snehanamocanayoH:kzvid:04:0159:pa:sew:ञिक्ष्वि॑दाँ॑","kzvelf!:calane:kzvel:01:0618:pa:sew:क्ष्वे॑लृँ॑","Kaca!:BUtaprAdurBAve:Kac:09:0067:pa:sew:ख॑चँ॑","Kaja!:manTe:Kaj:01:0264:pa:sew:ख॑जँ॑","Kaji!:gativEkalye:KaYj:01:0266:pa:sew:ख॑जिँ॑","Kawa!:kANkzAyAm:Kaw:01:0346:pa:sew:ख॑टँ॑","Kawwa!:saMvaraRe:Kaww:10:0127:u:sew:ख॑ट्टँ॑","Kaqa!:KaRqane Bedane:Kaq:10:0065:u:sew:ख॑डँ॑","Kaqi!:KaRqane Bedane:KaRq:10:0066:u:sew:ख॑डिँ॑","Kaqi!:manTe:KaRq:01:0317:A:sew:ख॑डिँ॒","Kada!:sTErye hiMsAyAM ca:Kad:01:0052:pa:sew:ख॑दँ॑","Kanu!:avadAraRe:Kan:01:1020:u:sew:ख॑नुँ॒॑","Karja!:vyaTane pUjane ca:Karj:01:0261:pa:sew:ख॑र्जँ॑","Karda!:dandaSUke:Kard:01:0062:pa:sew:ख॑र्दँ॑","Karba!:gatO:Karb:01:0487:pa:sew:ख॑र्बँ॑","Karva!:darpe:Karv:01:0665:pa:sew:ख॑र्वँ॑","Kala!:saYcalane saYcaye ca:Kal:01:0626:pa:sew:ख॑लँ॑","Kava!:BUtaprAdurBAve ityeke:Kav:09:0068:pa:sew:ख॑वँ॑","Kaza!:hiMsArTaH:Kaz:01:0782:pa:sew:ख॑षँ॑","KAdf!:BakzaRe:KAd:01:0051:pa:sew:खा॑दृँ॑","Kiwa!:trAse:Kiw:01:0339:pa:sew:खि॑टँ॑","Kida!:dEnye:Kid:07:0012:A:aniw:खि॒दँ॒","Kida!:dEnye:Kid:04:0066:A:aniw:खि॒दँ॒","Kida!:pariGAte pariGAtane:Kid:06:0172:pa:aniw:खि॒दँ॑","KuN:Sabde:Ku:01:1104:A:aniw:खु॒ङ्","Kuju!:steyakaraRe:Kuj:01:0227:pa:sew:खु॑जुँ॑","Kuqa!:saMvaraRe ityeke:Kuq:06:0119:pa:sew:खु॑डँ॑","Kuqi!:KaRqane:KuRq:10:0072:u:sew:खु॑डिँ॑","Kura!:Cedane:Kur:06:0068:pa:sew:खु॑रँ॑","Kurda:krIqAyAmeva:Kurd:01:0022:A:sew:खु॑र्द॒","Kewa:BakzaRe:Kewa:10:0413:u:sew:खे॑ट॑","Keqa!:BakzaRe ityeke:Keq:10:0414:u:sew:खे॑डँ॑","Kelf!:calane:Kel:01:0617:pa:sew:खे॑लृँ॑","Kevf!:sevane ityapyeke:Kev:01:0581:A:sew:खे॑वृँ॒","KE:Kadane:KE:01:1060:pa:aniw:खै॒","Kowa:BakzaRe ityanye:Kowa:10:0415:u:sew:खो॑ट॑","Korf!:gatipratiGAte:Kor:01:0633:pa:sew:खो॑रृँ॑","Kolf!:gatipratiGAte:Kol:01:0632:pa:sew:खो॑लृँ॑","KyA:prakaTane:KyA:02:0055:pa:aniw:ख्या॒","gaja!:SabdArTaH:gaj:10:0149:u:sew:ग॑जँ॑","gaja!:SabdArTaH:gaj:01:0279:pa:sew:ग॑जँ॑","gaji!:SabdArTaH:gaYj:01:0280:pa:sew:ग॑जिँ॑","gaqa!:secane:gaq:01:0886:pa:sew:ग॑डँ॑","gaRa:saNKyAne:gaRa:10:0391:u:sew:ग॑ण॑","gaqi!:vadanEkadeSe:gaRq:01:0068:pa:sew:ग॑डिँ॑","gaqi!:vadanEkadeSe:gaRq:01:0419:pa:sew:ग॑डिँ॑","gadI!:devaSabde:gad:10:0399:u:sew:ग॑दी॑","gada!:vyaktAyAM vAci:gad:01:0054:pa:sew:ग॑दँ॑","ganDa!:ardane:ganD:10:0204:A:sew:ग॑न्धँ॒","gamx!:gatO:gam:01:1137:pa:aniw:ग॒मॢँ॑","garja!:Sabde:garj:10:0177:u:sew:ग॑र्जँ॑","garja!:Sabde:garj:01:0258:pa:sew:ग॑र्जँ॑","garda!:Sabde:gard:01:0059:pa:sew:ग॑र्दँ॑","garda!:Sabde:gard:10:0178:u:sew:ग॑र्दँ॑","garDa!:aBikANkzAyAm:garD:10:0179:u:sew:ग॑र्धँ॑","garba!:gatO:garb:01:0488:pa:sew:ग॑र्बँ॑","garva:mAne:garva:10:0449:A:sew:ग॑र्व॒","garva!:darpe:garv:01:0666:pa:sew:ग॑र्वँ॑","garha!:kutsAyAm:garh:01:0723:A:sew:ग॑र्हँ॒","garha!:vinindane:garh:10:0383:u:sew:ग॑र्हँ॑","gala!:adane BakzaRe srAve ca:gal:01:0627:pa:sew:ग॑लँ॑","gala!:sravaRe:gal:10:0223:A:sew:ग॑लँ॒","galBa!:DArzwye:galB:01:0457:A:sew:ग॑ल्भँ॒","galha!:kutsAyAm:galh:01:0724:A:sew:ग॑ल्हँ॒","gaveza:mArgaRe:gaveza:10:0425:u:sew:ग॑वे॑ष॑","gAN:gatO:gA:01:1101:A:aniw:गा॒ङ्","gA:stutO:gA:03:0026:pa:aniw:गा॒","gADf!:pratizWAlipsayorgranTe ca:gAD:01:0004:A:sew:गा॑धृँ॒","gAhU!:viloqane:gAh:01:0736:A:sew:गा॑हूँ॒","guN:Sabde:gu:01:1105:A:aniw:गु॒ङ्","guN:avyakte Sabde:gu:01:1100:A:aniw:गु॒ङ्","gu:purIzotsarge:gu:06:0134:pa:aniw:गु॒","guja!:avyakte Sabde:guj:01:0230:pa:sew:गु॑जँ॑","guja!:Sabde:guj:06:0096:pa:sew:गु॑जँ॑","guji!:avyakte Sabde:guYj:01:0231:pa:sew:गु॑जिँ॑","guqa!:rakzAyAm:guq:06:0097:pa:sew:गु॑डँ॑","guRa:cAmantraRe:guRa:10:0436:u:sew:गु॑ण॑","guWi!:rakzaRe vezwane ca rakzaRa ityeke ityapare:guRW:10:0071:u:sew:गु॑ठिँ॑","guqi!:rakzaRe vezwane ca rakzaRa ityeke:guRq:10:0069:u:sew:गु॑डिँ॑","guda!:krIqAyAmeva:gud:01:0024:A:sew:गु॑दँ॒","guDa!:parivezwane:guD:04:0014:pa:sew:गु॑धँ॑","guDa!:roze:guD:09:0053:pa:sew:गु॑धँ॑","gupa!:BAzArTaH:gup:10:0147:u:sew:गु॑पँ॑","gupa!:gopane:gup:01:1125:A:sew:गु॑पँ॒","gupU!:rakzaRe:gup:01:0461:pa:sew:गु॑पूँ॑","gupa!:vyAkulatve:gup:04:0302:pa:sew:गु॑पँ॑","guPa!:granTe:guP:06:0042:pa:sew:गु॑फँ॑","gumPa!:granTe:gumP:06:0043:pa:sew:गु॑म्फँ॑","gurI!:udyamane:gur:06:0131:A:sew:गु॑रीँ॒","gurda:krIqAyAmeva guqakrIqAyAmeva:gurd:01:0023:A:sew:गु॑र्द॒","gurda!:pUrvaniketane niketane ityanye:gurd:10:0180:u:sew:गु॑र्दँ॑","gurvI!:udyamane:gurv:01:0655:pa:sew:गु॑र्वीँ॑","guhU!:saMvaraRe:guh:01:1043:u:sew:गु॑हूँ॒॑","gUra!:udyamane:gUr:10:0049:A:sew:गू॑रँ॒","gUrI!:hiMsAgatyoH:gUr:04:0217:A:sew:गू॑रीँ॒","gfhU!:grahaRe:gUh:01:0737:A:sew:गृ॑हूँ॒","gf:secane:gf:01:1087:pa:aniw:गृ॒","gfja!:SabdArTaH gaja! madane ca:gfj:01:0281:pa:sew:गृ॑जँ॑","gfji!:SabdArTaH:gfYj:01:0282:pa:sew:गृ॑जिँ॑","gfDu!:aBikANkzAyAm:gfD:04:0161:pa:sew:गृ॑धुँ॑","gfha:grahaRe:gfha:10:0441:A:sew:गृ॑ह॒","gF:nigaraRe:gF:06:0033:pa:sew:गॄ॑","gF:vijYAne:gF:10:0146:A:sew:गॄ॑","gF:Sabde:gF:09:0231:pa:sew:गॄ॑","gepf!:kampane ca:gepa:01:0427:A:sew:गे॑पृँ॒","gevf!:sevane:gev:01:0575:A:sew:गे॑वृँ॒","gezf!:anvicCAyAm:gez:01:0698:A:sew:गे॑षृँ॒","gE:Sabde:gE:01:1065:pa:aniw:गै॒","goma:upalepane:goma:10:0417:u:sew:गो॑म॑","gozwa!:saNGAte:gozw:01:0290:A:sew:गो॑ष्टँ॒","graTi!:kOwilye:granT:01:0036:A:sew:ग्र॑थिँ॒","granTa!:banDane:granT:10:0049:u:sew:ग्र॑न्थँ॑","granTa!:sandarBe:granT:10:0362:u:sew:ग्र॑न्थँ॑","granTa!:sandarBe:granT:09:0375:pa:sew:ग्र॑न्थँ॑","grasu!:adane:gras:01:0717:A:sew:ग्र॑सुँ॒","grasa!:grahaRe:gras:10:0279:u:sew:ग्र॑सँ॑","graha!:upAdAne:grah:09:0071:u:sew:ग्र॑हँ॒॑","grAma:AmantraRe:grAma:10:0434:u:sew:ग्रा॑म॑","grucu!:steyakaraRe:gruc:01:0224:pa:sew:ग्रु॑चुँ॑","glasu!:adane:glas:01:0718:A:sew:ग्ल॑सुँ॒","glaha!:grahaRe ca apAdAne:glah:01:0738:A:sew:ग्ल॑हँ॒","glucu!:steyakaraRe:gluc:01:0225:pa:sew:ग्लु॑चुँ॑","gluYca!:gatO:gluYc:01:0228:pa:sew:ग्लु॑ञ्चँ॑","glepf!:ca kampane:glep:01:0424:A:sew:ग्ले॑पृँ॒","glepf!:dEnye:glep:01:0428:A:sew:ग्ले॑पृँ॒","glevf!:sevane:glev:01:0576:A:sew:ग्ले॑वृँ॒","glezf!:anvicCAyAm ityeke:glez:01:0699:A:sew:ग्ले॑षृँ॑","glE:harzakzaye mit anupasargAdvA 1945:glE:01:1051:pa:aniw:ग्लै॒","GagGa!:hasane ityeke:GagG:01:0180:pa:sew:घ॑ग्घँ॑","GaGa!:hasane:GaG:01:0179:pa:sew:घ॑घँ॑","Gawa!:BAzArTaH:Gaw:10:0297:u:sew:घ॑टँ॑","Gawa!:cezwAyAm:Gaw:01:0867:A:sew:घ॑टँ॒","Gawa!:saNGAte hantyarTASca:Gaw:10:0248:u:sew:घ॑टँ॑","Gawwa!:calane:Gaww:10:0125:u:sew:घ॑ट्टँ॑","Gawwa!:calane:Gaww:01:0292:A:sew:घ॑ट्टँ॒","Gawi!:BAzArTaH:GaRw:10:0298:u:sew:घ॑टिँ॑","Gaza!:kAntikaraRe iti kecit:Gaz:01:0740:A:sew:घ॑षँ॒","Gasx!:adane:Gas:01:0812:pa:sew:घ॑सॢँ॑","GiRi!:grahaRe:GiRR:01:0502:A:sew:घि॑णिँ॒","GuN:Sabde:Gu:01:0739:A:aniw:घु॒ङ्","Guzi!:kAntikaraRe:GuMz:01:1106:A:sew:घु॑षिँ॒","Guwa!:parivartane:Guw:01:0848:A:sew:घु॑टँ॒","Guwa!:pratiGAte:Guw:06:0115:pa:sew:घु॑टँ॑","GuRa!:BramaRe:GuR:06:0064:pa:sew:घु॑णँ॑","GuRa!:BramaRe:GuR:01:0505:A:sew:घु॑णँ॒","GuRi!:grahaRe:GuRR:01:0503:A:sew:घु॑णिँ॒","Gura!:BImArTaSabdayoH:Gur:06:0071:pa:sew:घु॑रँ॑","Guzi!r:aviSabdane Sabda ityanye peWuH:Guz:01:0741:pa:sew:घु॑षिँ॑र्","Guzi!r:viSabdane:Guz:10:0251:u:sew:घु॑षिँ॑र्","GUrI:hiMsAvayohanyoH:GUr:04:0050:A:sew:घू॑री॒","GUrRa!:BramaRe:GUrR:06:0065:pa:sew:घू॑र्णँ॑","GUrRa!:BramaRe:GUrR:01:0506:A:sew:घू॑र्णँ॒","Gf:kzaraRadIptyoH:Gf:03:0152:pa:aniw:घृ॒","Gf:prasravaRe srAvaRa ityeke:Gf:10:0015:u:sew:घृ॑","Gf:secane:Gf:01:1088:pa:aniw:घृ॒","GfRu!:dIptO:GfR:08:0007:u:sew:घृ॑णुँ॒॑","GfRi!:grahaRe:GfRR:01:0504:A:sew:घृ॑णिँ॒","Gfzu!:saNGarze:Gfz:01:0805:pa:sew:घृ॑षुँ॑","GrA:ganDopAdAne GrARe:GrA:01:1075:pa:aniw:घ्रा॒","DrAGf!:sAmarTye ityapi kecit:GrAG:01:0121:A:sew:ध्रा॑घृँ॒","NuN:Sabde:Nu:01:1107:A:aniw:ङु॑ङ्","cakAsf!:dIptO:cakAs:02:0069:pa:sew:च॑का॑सृँ॑","caka!:tfptO:cak:01:0098:pa:sew:च॑कँ॑","caka!:tfptO pratiGAte ca:cak:01:0892:A:sew:च॑कँ॒","cakka!:vyaTane:cakk:10:0084:u:sew:च॑क्कँ॑","cakzi!N:vyaktAyAM vAci ayaM darSane'pi:cakz:02:0007:A:aniw:च॒क्षिँ॒ङ्","caYcu!:gatyarTaH:caYc:01:0217:pa:sew:च॑ञ्चुँ॑","cawa!:Bedane:caw:10:0246:u:sew:च॑टँ॑","cawe!:varzAvaraRayoH ityeke:caw:01:0331:pa:sew:च॑टेँ॑","caRa!:gatO dAne ca:caR:01:0905:pa:sew:च॑णँ॑","caqi!:kope:caRq:01:0312:A:sew:च॑डिँ॒","caqi!:kope caRqa ityanye:caRq:10:0075:u:sew:च॑डिँ॑","cate!:pariBAzaRe yAcane ca:cat:01:1003:u:sew:च॑तेँ॒॑","cade!:pariBAzaRe yAcane ca:cad:01:1004:u:sew:च॑देँ॒॑","cana!:ca hiMsArTaH:can:01:0914:pa:sew:च॑नँ॑","cana!:SradDopahananayorityeke:can:10:0378:u:sew:च॑नँ॑","cadi!:AhlAde dIptO ca:cand:01:0071:pa:sew:च॑दिँ॑","capa!:parikalpane ityeke:cap:10:0121:u:sew:च॑पँ॑","capa!:sAntvane:cap:01:0465:pa:sew:च॑पँ॑","camu!:adane na mit 1951:cam:01:0540:pa:sew:च॑मुँ॑","camu!:BakzaRe na mit 1951:cam:05:0540:pa:sew:च॑मुँ॑","capi!:gatyAm:camp:10:0111:u:sew:च॑पिँ॑","caya!:gatO:cay:01:0550:A:sew:च॑यँ॒","cara!:gatyarTAH caratirBakzaRarTo'pi! cara! BakzaRe ca caratirBakzaRe'pi:car:01:0640:pa:sew:च॑रँ॑","cara!:saMSaye:car:10:0274:u:sew:च॑रँ॑","carca!:pariBAzaRaBartsanayoH:carc:06:0237:pa:sew:च॑र्चँ॑","carca!:pariBAzaRahiMsAtarjanezu:carc:01:0814:pa:sew:च॑र्चँ॑","carca!:aDyayane:carc:10:0019:u:sew:च॑र्चँ॑","carba!:gatO carba! adane ca:carb:01:0491:pa:sew:च॑र्बँ॑","carva!:adane:carv:01:0660:pa:sew:च॑र्वँ॑","cala!:kampane kampane caliH mit 1924:cal:01:0966:pa:sew:च॑लँ॑","cala!:BftO:cal:10:0083:u:sew:च॑लँ॑","cala!:vilasane:cal:06:0097:pa:sew:च॑लँ॑","caza!:BakzaRe:caz:01:1034:u:sew:च॑षँ॒॑","caha:parikalkane:caha:10:0405:u:sew:च॑ह॑","caha!:parikalkane:cah:01:0830:pa:sew:च॑हँ॑","caha:parikalpane:caha:10:0120:u:sew:च॑ह॑","cAyf!:pUjAniSAmanayoH:cAy:01:1023:u:sew:चा॑यृँ॒॑","ci:BAzArTaH ca:ci:10:0325:u:sew:चि॑","ciY:cayane:ci:10:0005:u:sew:चि॑ञ्","ciY:cayane:ci:05:0124:u:aniw:चि॒ञ्","ciwa!:paraprEzye paraprezye:ciw:01:0353:pa:sew:चि॑टँ॑","cita!:saYcetane:cit:10:0192:A:sew:चि॑तँ॒","citI!:saYjYAne:cit:01:0039:pa:sew:चि॑तीँ॑","citra:citrIkaraRe kadAciddarSane:citra:10:0459:u:sew:चि॑त्र॑","citi!:smftyAm:cint:10:0002:u:sew:चि॑तिँ॑","ciri:hiMsAyAm:ciri:05:0034:pa:sew:चि॑रि॑","cila!:vasane:cil:06:0082:pa:sew:चि॑लँ॑","cilla!:SETilye BAvakaraRe ca:cill:01:0611:pa:sew:चि॑ल्लँ॑","cIka!:AmarzaRe ca:cIk:10:0364:u:sew:ची॑कँ॑","cIva!:BAzArTaH:cIb:10:0305:u:sew:ची॑वँ॑","cIbf!:AdAnasaMvaraRayoH ityeke:cIb:01:1022:u:sew:ची॑बृँ॒॑","cIBf!:ca katTane:cIB:01:0446:A:sew:ची॑भृँ॒","cIva!:BAzArTaH:cIv:10:0305:u:sew:ची॑वँ॑","cIvf!:AdAnasaMvaraRayoH:cIv:01:1021:u:sew:ची॑वृँ॒॑","cukka!:vyaTane:cukk:10:0085:u:sew:चु॑क्कँ॑","cucya!:aBizave ityeke:cucy:01:0591:pa:sew:चु॑च्यँ॑","cuwa!:Cedane:cuw:06:0103:pa:sew:चु॑टँ॑","cuwa!:Cedane:cuw:10:0104:u:sew:चु॑टँ॑","cuwwa!:alpIBAve:cuww:10:0036:u:sew:चु॑ट्टँ॑","cuqa!:saMvaraRe:cuq:06:0126:pa:sew:चु॑डँ॑","cuqqa!:BAvakaraRe:cuqq:01:0402:pa:sew:चु॑ड्डँ॑","cuwi!:Cedane:cuRw:10:0164:u:sew:चु॑टिँ॑","cuqi!:alpIBAve:cuRq:01:0368:pa:sew:चु॑डिँ॑","cuda!:saYcodane:cud:10:0081:u:sew:चु॑दँ॑","cuqqa!:BAvakaraRe:cudq:01:0402:pa:sew:चु॑ड्डँ॑","cupa!:mandAyAM gatO:cup:01:0469:pa:sew:चु॑पँ॑","cubi!:vaktrasaMyoge:cumb:01:0495:pa:sew:चु॑बिँ॑","cubi!:hiMsAyAm:cumb:10:0130:u:sew:चु॑बिँ॑","cura!:steye:cur:10:0001:u:sew:चु॑रँ॑","cula!:samucCrAye:cul:10:0091:u:sew:चु॑लँ॑","culla!:BAvakaraRe:cull:01:0609:pa:sew:चु॑ल्लँ॑","cUrI!:dAhe:cUr:04:0053:A:sew:चू॑रीँ॒","cUrRa!:preraRe:cUrR:10:0143:u:sew:चू॑र्णँ॑","cUrRa!:saNkocane:cUrR:10:0026:u:sew:चू॑र्णँ॑","cUza!:pAne:cUz:01:0767:pa:sew:चू॑षँ॑","cftI!:hiMsAgranTanayoH:cft:06:0049:pa:sew:चृ॑तीँ॑","cfpa!:sandIpane ityeke:cfp:10:0353:u:sew:चृ॑पँ॑","celf!:calane:cel:01:0615:pa:sew:चे॑लृँ॑","cezwa!:cezwAyAm:cezw:01:0289:A:sew:चे॑ष्टँ॒","cyu:hasane sahane cetyeke:cyu:10:0275:u:sew:च्यु॑","cyuti!r:Asecane:cyut:01:0040:pa:sew:च्यु॑तिँ॑र्","Caji!:kfcCrajIvane ityeke:CaYj:10:0114:u:sew:छ॑जिँ॑","Cada:apavAraRe:Cada:10:0481:u:sew:छ॑द॑","Cada:apavAraRe Cadir Urjane mit 1925:Cada:10:0359:u:sew:छ॑द॑","Cada:saMvaraRe Cadir Urjane mit 1925:Cada:10:0370:u:sew:छ॑द॑","Cadi!:saMvaraRe:Cand:10:0062:u:sew:छ॑दिँ॑","Camu!:adane:Cam:01:0541:pa:sew:छ॑मुँ॑","Carda:vamane:Card:10:0078:u:sew:छ॑र्द॑","Caza!:hiMsAyAm:Caz:01:1035:u:sew:छ॑षँ॒॑","Cidi!r:dvEDIkaraRe:Cid:07:0003:u:aniw:छि॒दिँ॒॑र्","Cidra:karRaBedane karaRaBedana ityeke:Cidra:10:0469:u:sew:छि॑द्र॑","Cuwa!:Cedane:Cuw:06:0105:pa:sew:छु॑टँ॑","Cuqa!:saMvaraRe ityeke:Cuq:06:0120:pa:sew:छु॑डँ॑","Cupa!:sparSe:Cup:06:0154:pa:aniw:छु॒पँ॑","Cura!:Cedane:Cur:06:0099:pa:sew:छु॑रँ॑","u!Cfdi!r:dIptidevanayoH:Cfd:07:0352:u:sew:उँ॑छृ॑दिँ॒॑र्","CfdI!:sandIpane:Cfd:10:0008:u:sew:छृ॑दीँ॑","Cfpa!:sandIpane ityeke:Cfp:10:0354:u:sew:छृ॑पँ॑","Ceda:dvEDIkaraRe:Ceda:10:0480:u:sew:छे॑द॑","Co:Cedane:Co:04:0041:pa:aniw:छो॒","jasi!:rakzaRe mokzaRa ityeke:jaMs:10:0182:u:sew:ज॑सिँ॑","jakza!:BakzyahasanayoH:jakz:02:0066:pa:sew:ज॑क्षँ॑","jaja!:yudDe:jaj:01:0275:pa:sew:ज॑जँ॑","jaji!:yudDe:jaYj:01:0276:pa:sew:ज॑जिँ॑","jawa!:saNGAte:jaw:01:0342:pa:sew:ज॑टँ॑","jana!:janane mit 1937:jan:03:0025:pa:sew:ज॑नँ॑","janI!:prAdurBAve mit 1937:jan:04:0044:A:sew:ज॑नीँ॒","japa!:vyaktAyAM vAci japa! mAnase ca:jap:01:0463:pa:sew:ज॑पँ॑","jaBI!:gAtravinAme:jaB:01:0453:A:sew:ज॑भीँ॒","jamu!:adane:jam:01:0542:pa:sew:ज॑मुँ॑","jaBi!:nASane:jamB:10:0241:u:sew:ज॑भिँ॑","jartsa!:pariBAzaRahiMsAtarjanezu:jarc:01:0813:pa:sew:ज॑र्त्सँ॑","jartsa!:pariBAzaRahiMsAtarjanezu:jarj:01:0813:pa:sew:ज॑र्त्सँ॑","jarja!:pariBAzaRaBartsanayoH:jarj:06:0018:pa:sew:ज॑र्जँ॑","jartsa!:pariBAzaRahiMsAtarjanezu:jarts:01:0813:pa:sew:ज॑र्त्सँ॑","jala!:apavAraRe:jal:10:0015:u:sew:ज॑लँ॑","jala!:GAtane:jal:01:0967:pa:sew:ज॑लँ॑","jalpa!:vyaktAyAM vAci:jalp:01:0464:pa:sew:ज॑ल्पँ॑","jaza!:hiMsArTaH:jaz:01:0784:pa:sew:ज॑षँ॑","jasu!:tAqane:jas:10:0243:u:sew:ज॑सुँ॑","jasu!:mokzane:jas:04:0184:pa:sew:ज॑सुँ॑","jasu!:hiMsAyAm:jas:10:0108:u:sew:ज॑सुँ॑","jAgf:nidrAkzaye:jAgf:02:0067:pa:sew:जा॑गृ॑","ji:BAzArTaH ca:ji:10:0324:u:sew:जि॑","ji:aBiBave:ji:01:0642:pa:aniw:जि॒","ji!:jaye:ji:01:1096:pa:aniw:जिँ॒","ci:BAzArTaH ca:jinv:10:0325:u:sew:चि॑","jivi!:prIRanArTAH:jinv:01:0678:pa:sew:जि॑विँ॑","jimu!:adane iti kecit:jim:01:0544:pa:sew:जि॑मुँ॑","jiri:hiMsAyAm:jiri:05:0035:pa:sew:जि॑रि॑","jizu!:secane:jiz:01:0793:pa:sew:जि॑षुँ॑","jIva!:prARaDAraRe:jIv:01:0643:pa:sew:जी॑वँ॑","juN:gatO:ju:01:1098:A:aniw:जु॒ङ्","ju:iti sOtro DAtuH gatyarTaH:ju:01:1110:pa:aniw:जु॒","jugi!:varjane:juNg:01:0176:pa:sew:जु॑गिँ॑","ci:BAzArTaH ca:juYc:10:0325:u:sew:चि॑","juwa!:banDane ityeke:juw:06:0107:pa:sew:जु॑टँ॑","juqa!:gatO:juq:06:0148:pa:sew:जु॑डँ॑","juqa!:preraRe:juq:10:0051:u:sew:जु॑डँ॑","juqa!:banDane:juq:06:0106:pa:sew:जु॑डँ॑","jutf!:BAsaRe:jut:01:0032:A:sew:जु॑तृँ॒","juna!:gatO ityeke:jun:06:0052:pa:sew:जु॑नँ॑","juza!:paritarkane paritarpaRa ityanye:juz:10:0008:u:sew:जु॑षँ॑","juzI!:prItisevanayoH:juz:06:0371:A:sew:जु॑षीँ॒","jUrI!:hiMsAvayohanyoH:jUr:04:0051:A:sew:जू॑रीँ॒","jUza!:ca hiMsAyAm:jUz:01:0776:pa:sew:जू॑षँ॑","jfBi!:gAtravinAme:jfmB:01:0454:A:sew:जृ॑भिँ॒","jFz:vayohAnO mit 1938:jF:04:0027:pa:sew:जॄ॑ष्","jF:vayohAnO:jF:10:0025:u:sew:जॄ॑","jF:vayohAnO mit 1938:jF:09:0346:pa:sew:जॄ॑","jezf!:gatO:jez:01:0703:A:sew:जे॑षृँ॒","jehf!:prayatne jehf! gatAvapi:jeh:01:0731:A:sew:जे॑हृँ॒","jE:kzaye:jE:01:1062:pa:aniw:जै॒","jYapa!:jYapa! jYAnajYApanamAraRatozaRaniSAnaniSAmanezu:jYap:10:0118:u:sew:ज्ञ॑पँ॑","jYA:avaboDane mAraRatozaRaniSAmanezu jYA mit 1923:jYA:09:0258:pa:aniw:ज्ञा॒","jYA:niyoge:jYA:10:0043:u:sew:ज्ञा॑","jyA:vayohAnO:jyA:09:0034:pa:aniw:ज्या॒","jyuN:gatO:jyu:01:1109:A:aniw:ज्यु॒ङ्","jyuti!r:BAsane:jyut:01:0043:pa:sew:ज्यु॑तिँ॑र्","jri:vayohAnO ca:jri:10:0347:u:sew:ज्रि॑","jri:aBiBave:jri:01:1097:pa:aniw:ज्रि॒","jvara!:roge:jvar:01:0885:pa:sew:ज्व॑रँ॑","jvala!:dIptO mit anupasargAdvA 1941:jval:01:0916:pa:sew:ज्व॑लँ॑","jvala!:dIptO mit anupasargAdvA 1941:jval:01:0965:pa:sew:ज्व॑लँ॑","Jawa!:saNGAte:Jaw:01:0343:pa:sew:झ॑टँ॑","Jamu!:adane:Jam:01:0543:pa:sew:झ॑मुँ॑","Jartsa!:pariBAzaRahiMsAtarjanezu:Jarj:01:0815:pa:sew:झ॑र्त्सँ॑","Jartsa!:pariBAzaRahiMsAtarjanezu:JarJ:01:0815:pa:sew:झ॑र्त्सँ॑","JarJa!:pariBAzaRaBartsanayoH:JarJ:06:0020:pa:sew:झ॑र्झँ॑","Jartsa!:pariBAzaRahiMsAtarjanezu:Jarts:01:0815:pa:sew:झ॑र्त्सँ॑","Jaza!:hiMsArTaH:Jaz:01:0785:pa:sew:झ॑षँ॑","Jaza!:AdAnasaMvaraRayoH:Jaz:01:1036:u:sew:झ॑षँ॒॑","JF:vayohAnO ityeke:JF:09:0028:pa:sew:झॄ॑","JFz:vayohAnO:JF:04:0026:pa:sew:झॄ॑ष्","waki!:banDane:waNk:10:0135:u:sew:ट॑किँ॑","wala!:vEkalye:wal:01:0968:pa:sew:ट॑लँ॑","wikf!:gatyarTaH:wik:01:0108:A:sew:टि॑कृँ॒","wIkf!:gatyarTaH:wIk:01:0109:A:sew:टी॑कृँ॒","wvala!:vEkalye:wval:01:0969:pa:sew:ट्व॑लँ॑","qapa!:saNGAte:qap:10:0196:A:sew:ड॑पँ॒","qipa!:kzepe:qip:10:0145:u:sew:डि॑पँ॑","qipa!:kzepe:qip:06:0189:pa:sew:डि॑पँ॑","qipa!:kzepe:qip:04:0197:pa:sew:डि॑पँ॑","qipa!:saNGAte:qip:10:0098:A:sew:डि॑पँ॒","qIN:vihAyasA gatO:qI:04:0030:A:aniw:डी॒ङ्","qIN:vihAyasA gatO:qI:01:1123:A:sew:डी॑ङ्","QOkf!:gatyarTaH:QOk:01:0103:A:sew:ढौ॑कृँ॒","tasi!:alaNkAre:taMs:10:0254:u:sew:त॑सिँ॑","tasi!:alaNkAre:taMs:01:0778:pa:sew:त॑सिँ॑","taka!:hasane:tak:01:0124:pa:sew:त॑कँ॑","takzU!:tanUkaraRe:takz:01:0756:pa:sew:त॑क्षूँ॑","takza!:tvacane:takz:01:0743:pa:sew:त॑क्षँ॑","taki!:kfcCrajIvane:taNk:01:0125:pa:sew:त॑किँ॑","tagi!:gatyarTaH:taNg:01:0158:pa:sew:त॑गिँ॑","taYcu!:gatyarTaH:taYc:01:0218:pa:sew:त॑ञ्चुँ॑","taYcU!:saNkocane:taYc:07:0022:pa:sew:त॑ञ्चूँ॑","tawa!:ucCrAye:taw:01:0345:pa:sew:त॑टँ॑","taqa!:AGAte:taq:10:0064:u:sew:त॑डँ॑","taqa!:BAzArTaH ca:taRq:10:0332:u:sew:त॑डँ॑","taqi!:tAqane:taRq:01:0314:A:sew:त॑डिँ॒","tanu!:vistAre:tan:08:0377:u:sew:त॑नुँ॒॑","tanu!:SradDopakaraRayoH upasargAcca dErGye:tan:10:0001:u:sew:त॑नुँ॑","tatri!:kuwumbaDAraRe:tantr:10:0198:A:sew:त॑त्रिँ॒","tapa!:dAhe ESverye vA:tap:04:0350:A:aniw:त॒पँ॒","tapa!:dAhe:tap:10:0054:u:sew:त॑पँ॑","tapa!:santApe:tap:01:1140:pa:aniw:त॒पँ॑","tamu!:kANkzAyAm:tam:04:0099:pa:sew:त॑मुँ॑","taya!:gatO:tay:01:0551:A:sew:त॑यँ॒","tarka!:BAzArTaH:tark:10:0311:u:sew:त॑र्कँ॑","tarja!:santarjane tarjane:tarj:10:0201:A:sew:त॑र्जँ॒","tarja!:Bartsane:tarj:01:0259:pa:sew:त॑र्जँ॑","tarda!:hiMsAyAm:tard:01:0060:pa:sew:त॑र्दँ॑","tala!:pratizWAyAm:tal:10:0087:u:sew:त॑लँ॑","tasu!:upakzaye:tas:04:0109:pa:sew:त॑सुँ॑","tAyf!:santAnapAlanayoH:tAy:01:0562:A:sew:ता॑यृँ॒","tika!:Askandane gatO ca:tik:05:0022:pa:sew:ति॑कँ॑","tikf!:gatyarTaH:tik:01:0110:A:sew:ति॑कृँ॒","tiga!:Askandane gatO ca:tig:05:0023:pa:sew:ति॑गँ॑","tija!:niSAne:tij:01:1126:A:sew:ति॑जँ॒","tija!:niSAne niSAtane:tij:10:0154:u:sew:ति॑जँ॑","tipf!:kzaraRArTaH:tip:01:0420:A:aniw:ति॒पृँ॒","tima!:ArdrIBAve:tim:04:0017:pa:sew:ति॑मँ॑","tila!:gatO:til:01:0612:pa:sew:ति॑लँ॑","tila!:snehane:til:10:0081:u:sew:ति॑लँ॑","tila!:snehane snehe:til:06:0096:pa:sew:ति॑लँ॑","tilla!:gatO ityeke:till:01:0613:pa:sew:ति॑ल्लँ॑","tIkf!:gatyarTaH:tIk:01:0111:A:sew:ती॑कृँ॒","tIma!:ArdrIBAve:tIm:04:0018:pa:sew:ती॑मँ॑","tIra:karmasamAptO:tIra:10:0454:u:sew:ती॑र॑","tIva!:sTOlye:tIv:01:0646:pa:sew:ती॑वँ॑","tu:gativfdDihiMsAsu vfdDyarTaH iti sOtro DAtuH:tu:02:0029:pa:aniw:तु॑","tuja!:hiMsAbalAdAnaniketanezu:tuj:10:0044:u:sew:तु॑जँ॑","tuja!:hiMsAyAm:tuj:01:0277:pa:sew:तु॑जँ॑","tuji!:BAzArTaH:tuYj:10:0285:u:sew:तु॑जिँ॑","tuji!:hiMsAbalAdAnaniketanezu:tuYj:10:0045:u:sew:तु॑जिँ॑","tuji!:pAlane:tuYj:01:0278:pa:sew:तु॑जिँ॑","tuwa!:kalahakarmaRi:tuw:06:0103:pa:sew:तु॑टँ॑","tuqa!:toqane:tuq:06:0116:pa:sew:तु॑डँ॑","tuqf!:toqane:tuq:01:0406:pa:sew:तु॑डृँ॑","tuRa!:kOwilye:tuR:06:0058:pa:sew:तु॑णँ॑","tuqi!:preraRe:tuRq:10:0166:u:sew:तु॑डिँ॑","tuqi!:toqane:tuRq:01:0309:A:sew:तु॑डिँ॒","tutTa:AvaraRe:tutTa:10:0489:u:sew:तु॑त्थ॑","tuda!:vyaTane:tud:06:0001:u:aniw:तु॒दँ॒॑","tupa!:hiMsAyAm:tup:06:0032:pa:sew:तु॑पँ॑","tupa!:hiMsArTaH:tup:01:0470:pa:sew:तु॑पँ॑","tuPa!:hiMsAyAm:tuP:06:0034:pa:sew:तु॑फँ॑","tuPa!:hiMsArTaH:tuP:01:0474:pa:sew:तु॑फँ॑","tuBa!:hiMsAyAm:tuB:09:0057:pa:sew:तु॑भँ॑","tuBa!:hiMsAyAm:tuB:04:0156:pa:sew:तु॑भँ॑","tuBa!:hiMsAyAm:tuB:01:0856:A:sew:तु॑भँ॒","tumpa!:hiMsAyAm:tump:06:0033:pa:sew:तु॑म्पँ॑","tumpa!:hiMsArTaH:tump:01:0471:pa:sew:तु॑म्पँ॑","tumPa!:hiMsArTaH:tumP:01:0475:pa:sew:तु॑म्फँ॑","tumPa!:hiMsAyAm:tumP:06:0035:pa:sew:तु॑म्फँ॑","tubi!:adarSane ardana ityeke:tumb:10:0160:u:sew:तु॑बिँ॑","tubi!:ardane:tumb:01:0494:pa:sew:तु॑बिँ॑","tura!:tvaraRe:tur:03:0022:pa:sew:तु॑रँ॑","turvI:hiMsArTaH:turv:01:0651:pa:sew:तु॑र्वी॑","tula!:unmAne:tul:10:0088:u:sew:तु॑लँ॑","tuza!:prItO:tuz:04:0081:pa:aniw:तु॒षँ॑","tusa!:Sabde:tus:01:0807:pa:sew:तु॑सँ॑","tuhi!r:ardane:tuh:01:0838:pa:sew:तु॑हिँ॑र्","tUqf!:toqane ityeke:tUq:01:0407:pa:sew:तू॑डृँ॑","tURa!:pUraRe:tUR:10:0212:A:sew:तू॑णँ॒","tUrI!:gatitvaraRahiMsanayoH:tUr:04:0047:A:sew:तू॑रीँ॒","tUla!:nizkarze:tUl:01:0605:pa:sew:तू॑लँ॑","tUza!:tuzwO:tUz:01:0768:pa:sew:तू॑षँ॑","tfMhU!:hiMsArTAH:tfMh:06:0077:pa:sew:तृं॑हूँ॑","tfkza!:gatO:tfkz:01:0750:pa:sew:तृ॑क्षँ॑","tfRu!:adane:tfR:08:0006:u:sew:तृ॑णुँ॒॑","u!tfdi!r:hiMsAnAdarayoH:tfd:07:0009:u:sew:उँ॑तृ॑दिँ॒॑र्","tfpa!:tfptO:tfp:06:0355:pa:sew:तृ॑पँ॑","tfpa!:sandIpane ityeke:tfp:10:0028:u:sew:तृ॑पँ॑","tfpa!:tfptO sandIpana ityeke:tfp:10:0092:u:sew:तृ॑पँ॑","tfpa!:prIRana ityeke:tfp:05:0351:pa:sew:तृ॑पँ॑","tfpa!:prIRane:tfp:04:0028:pa:aniw:तृ॒पँ॑","tfPa!:tfptO ityeke:tfP:06:0030:pa:sew:तृ॑फँ॑","tfmpa!:tfptO:tfmp:06:0029:pa:sew:तृ॑म्पँ॑","tfmPa!:tfptO ityeke:tfmP:06:0031:pa:sew:तृ॑म्फँ॑","Yitfza!:pipAsAyAm:tfz:04:0141:pa:sew:ञितृ॑षँ॑","tfhU!:hiMsArTaH:tfh:06:0075:pa:sew:तृ॑हूँ॑","tfha!:hiMsAyAm:tfh:07:0018:pa:sew:तृ॑हँ॑","tF:plavanataraRayoH:tF:01:1124:pa:sew:तॄ॑","teja!:pAlane:tej:01:0263:pa:sew:ते॑जँ॑","tepf!:kzaraRArTaH tepf! kampane ca:tep:01:0421:A:sew:ते॑पृँ॒","tevf!:devane:tev:01:0572:A:sew:ते॑वृँ॒","tyaja!:hAnO:tyaj:01:1141:pa:aniw:त्य॒जँ॑","trasi!:BAzArTaH:traMs:10:0292:u:sew:त्र॑सिँ॑","trakza!:gatO:trakz:01:0748:pa:sew:त्र॑क्षँ॑","traKa!:gatyarTaH ityapi kecit:traK:01:0172:pa:sew:त्र॑खँ॑","traki!:gatyarTaH:traNk:01:0102:A:sew:त्र॑किँ॒","tragi!:gatyarTaH:traNg:01:0160:pa:sew:त्र॑गिँ॑","tradi!:cezwAyAm:trand:01:0072:pa:sew:त्र॑दिँ॑","trapU!z:lajjAyAm mit iti BojaH 0934:trap:01:0434:A:sew:त्र॑पूँ॒ष्","trasI!:udvege:tras:04:0269:pa:sew:त्र॑सीँ॑","trasa!:DAraRe grahaRa ityeke vAraRa ityanye DAraRagrahaRavAraRezu:tras:10:0011:u:sew:त्र॑सँ॑","triKi!:gatyarTaH ityapi kecit:triNK:01:0173:pa:sew:त्रि॑खिँ॑","truwa!:Cedane:truw:10:0102:A:sew:त्रु॑टँ॒","truwa!:Cedane:truw:06:0221:pa:sew:त्रु॑टँ॑","trupa!:hiMsArTaH:trup:01:0472:pa:sew:त्रु॑पँ॑","truPa!:hiMsArTaH:truP:01:0476:pa:sew:त्रु॑फँ॑","trumpa!:hiMsArTaH:trump:01:0473:pa:sew:त्रु॑म्पँ॑","trumPa!:hiMsArTAH:trumP:01:0477:pa:sew:त्रु॑म्फँ॑","trEN:pAlane:trE:01:1120:A:aniw:त्रै॒ङ्","trOkf!:gatyarTaH:trOk:01:0104:A:sew:त्रौ॑कृँ॒","tvakzU!:tanUkaraRe:tvakz:01:0744:pa:sew:त्व॑क्षूँ॑","tvagi!:gatyarTaH tvagi! kampane ca:tvaNg:01:0159:pa:sew:त्व॑गिँ॑","tvaca!:saMvaraRe:tvac:06:0021:pa:sew:त्व॑चँ॑","tvaYcu!:gatyarTaH:tvaYc:01:0219:pa:sew:त्व॑ञ्चुँ॑","YitvarA!:samBrame:tvar:01:0884:A:sew:ञित्व॑राँ॒","tviza!:dIptO:tviz:01:1156:u:aniw:त्वि॒षँ॒॑","tsara!:CadmagatO:tsar:01:0635:pa:sew:त्स॑रँ॑","Taki!:gatyarTaH ityapi kecit:TaNk:01:0167:pa:sew:थ॑किँ॑","Tuqa!:saMvaraRe:Tuq:06:0117:pa:sew:थु॑डँ॑","TurvI:hiMsArTaH:Turv:01:0652:pa:sew:थु॑र्वी॑","daSi!:BAzArTaH:daMS:10:0295:u:sew:द॑शिँ॑","daSi!:daMSane darSanadaMSanayoH:daMS:10:0193:A:sew:द॑शिँ॒","daMSa!:daSane:daMS:01:1144:pa:aniw:दं॒शँ॑","dasi!:BAzArTaH ca:daMs:10:0317:u:sew:द॑सिँ॑","dasi!:darSanadaMSanayoH:daMs:10:0194:A:sew:द॑सिँ॒","dakza!:gatihiMsanayoH gatiSAsanayoH vfdDO SIGrArTe ca:dakz:01:0874:A:sew:द॑क्षँ॒","dakza!:vfdDO SIGrArTe ca:dakz:01:0692:A:sew:द॑क्षँ॒","daGa!:GAtane pAlane ca:daG:05:0030:pa:sew:द॑घँ॑","daGi!:pAlane:daNG:01:0181:pa:sew:द॑घिँ॑","daRqa:daRqanipAte:daRqa:10:0472:u:sew:द॑ण्ड॑","dada!:dAne:dad:01:0017:A:sew:द॑दँ॒","daDa!:DAraRe:daD:01:0008:A:sew:द॑धँ॒","damu!:upaSame:dam:04:0100:pa:sew:द॑मुँ॑","damBu!:damBane damBe:damB:05:0026:pa:sew:द॑म्भुँ॑","daya!:dAnagatirakzaRahiMsAdAnezu:day:01:0553:A:sew:द॑यँ॒","daridrA:durgatO:daridrA:02:0068:pa:sew:द॑रि॑द्रा॑","dala!:vidAraRe mit iti BojaH 1929:dal:10:0281:u:sew:द॑लँ॑","dala!:viSaraRe mit iti BojaH 1929:dal:01:0629:pa:sew:द॑लँ॑","dASa!:hiMsAyAm:daS:05:0036:pa:sew:दा॑शँ॑","dasa!:darSanadaMSanayoH ityapyeke:das:10:0110:A:sew:द॑सँ॒","dasu!:ca upakzaye:das:04:0195:pa:sew:द॑सुँ॑","daha!:BasmIkaraRe:dah:01:1146:pa:aniw:द॒हँ॑","qudAY:dAne:dA:03:0010:u:aniw:डुदा॒ञ्","dAR:dAne:dA:01:1079:pa:aniw:दा॒ण्","dAp:lavane:dA:02:0054:pa:aniw:दा॒प्","dAna!:KaRqane avaKaRqane:dAn:01:1149:u:sew:दा॑नँ॒॑","dASf!:dAne:dAS:01:1025:u:sew:दा॑शृँ॒॑","dAsf!:dAne:dAs:01:1041:u:sew:दा॑सृँ॒॑","divi!:prIRanArTaH:dinv:01:0676:pa:sew:दि॑विँ॑","divu!:krIqAvijigIzAvyavahAradyutistutimodamadasvapnakAntigatizu:div:04:0249:pa:sew:दि॑वुँ॑","divu!:parikUjane:div:10:0001:A:sew:दि॑वुँ॒","divu!:mardane:div:10:0230:u:sew:दि॑वुँ॑","diSa!:atisarjane:diS:06:0003:u:aniw:दि॒शँ॒॑","diha!:upacaye:dih:02:0005:u:aniw:दि॒हँ॒॑","dIN:kzaye:dI:04:0029:A:sew:दी॑ङ्","dIkza!:mORqyejyopanayananiyamavratAdeSezu:dIkz:01:0693:A:sew:दी॑क्षँ॒","dIDIN:dIptidevanayoH:dIDI:02:0071:A:sew:दी॑धी॑ङ्","dIpI!:dIptO:dIp:04:0045:A:sew:दी॑पीँ॒","du:gatO:du:01:1094:pa:aniw:दु॒","wudu:upatApe:du:05:0476:pa:aniw:टु॑दु॒","duHKa:tatkriyAyAm:duHKa:10:0011:u:sew:दुः॑ख॑","durvI!:hiMsArTaH:durv:01:0653:pa:sew:दु॑र्वीँ॑","dula!:utkzepe:dul:10:0089:u:sew:दु॑लँ॑","duza!:vEkftye:duz:04:0082:pa:aniw:दु॒षँ॑","duhi!r:ardane:duh:01:0839:pa:sew:दु॑हिँ॑र्","duha!:prapUraRe:duh:02:0004:u:aniw:दु॒हँ॒॑","dUN:paritApe:dU:04:0028:A:sew:दू॑ङ्","dfN:Adare:df:06:0835:A:aniw:दृ॒ङ्","dfhi!:vfdDO:dfMh:01:0147:pa:sew:दृ॑हिँ॑","dfpa!:utkleSe:dfp:06:0356:pa:sew:दृ॑पँ॑","dfpa!:sandIpane ityeke:dfp:10:0093:u:sew:दृ॑पँ॑","dfpa!:harzamohanayoH:dfp:04:0036:pa:aniw:दृ॒पँ॑","dfPa!:utkleSe ityeke:dfP:06:0038:pa:sew:दृ॑फँ॑","dfBI!:granTe:dfB:06:0357:pa:sew:दृ॑भीँ॑","dfBI!:Baye granTe:dfB:10:0048:u:sew:दृ॑भीँ॑","dfBa!:sandarBe:dfB:10:0358:u:sew:दृ॑भँ॑","dfmpa!:utkleSe:dfmp:06:0037:pa:sew:दृ॑म्पँ॑","dfmPa!:utkleSe ityeke:dfmP:06:0039:pa:sew:दृ॑म्फँ॑","dfha!:vfdDO:dfh:01:0834:pa:sew:दृ॑हँ॑","dF:Baye:dF:01:0920:pa:sew:दॄ॑","dF:vidAraRe:dF:09:0026:pa:sew:दॄ॑","dF:hiMsAyAm:dF:05:0037:pa:sew:दॄ॑","deN:rakzaRe:de:01:1117:A:aniw:दे॒ङ्","devf!:devane:dev:01:0573:A:sew:दे॑वृँ॒","dEp:SoDane:dE:01:1073:pa:aniw:दै॒प्","dfSi!r:prekzaRe:dfS:01:1143:pa:aniw:दृ॒शिँ॑र्","do:avaKaRqane:do:04:0043:pa:aniw:दो॒","dyu:aBigamane:dyu:02:0035:pa:aniw:द्यु॒","dyuta!:dIptO:dyut:01:0842:A:sew:द्यु॑तँ॒","dyE:nyakkaraRe:dyE:01:1053:pa:aniw:द्यै॒","drama!:gatO:dram:01:0537:pa:sew:द्र॑मँ॑","drA:kutsAyAM gatO:drA:02:0049:pa:aniw:द्रा॒","drAKf!:SozaRAlamarTyoH:drAK:01:0132:pa:sew:द्रा॑खृँ॑","drAGf!:sAmarTye drAGf! AyAme ca:drAG:01:0120:A:sew:द्रा॑घृँ॒","drAkzi!:kANkzAyAm GoravAsite ca:drANkz:01:0763:pa:sew:द्रा॑क्षिँ॑","drAqf!:viSareRe:drAq:01:0322:A:sew:द्रा॑डृँ॒","drAhf!:nidrAkzaye nikzepa ityeke:drAh:01:0733:A:sew:द्रा॑हृँ॒","dru:gatO:dru:01:1095:pa:aniw:द्रु॒","druRa!:hiMsAgatikOwilyezu:druR:06:0063:pa:sew:द्रु॑णँ॑","druha!:jiGAMsAyAm:druh:04:0094:pa:aniw:द्रु॒हँ॑","drUY:hiMsAyAm:drU:09:0013:u:sew:द्रू॑ञ्","drekf!:SabdotsAhayoH:drek:01:0083:A:sew:द्रे॑कृँ॒","drE:svapne:drE:01:1054:pa:aniw:द्रै॒","dviza!:aprItO:dviz:02:0003:u:aniw:द्वि॒षँ॒॑","dvf:saMvaraRe varaRe:dvf:01:1083:pa:aniw:द्वृ॒","Dakka!:nASane:Dakk:10:0083:u:sew:ध॑क्कँ॑","DaRa!:SabdArTaH ityapi kecit:DaR:01:0522:pa:sew:ध॑णँ॑","Dana!:DAnye:Dan:03:0024:pa:sew:ध॑नँ॑","Davi!:gatyarTAH:Danv:01:0681:pa:sew:ध॑विँ॑","quDAY:DAraRapozaRayoH dAna ityapyeke:DA:03:0011:u:aniw:डुधा॒ञ्","DAvu!:gatiSudDyoH:DAv:01:0685:u:sew:धा॑वुँ॒॑","Di:DAraRe:Di:06:0142:pa:aniw:धि॒","Dikza!:sandIpanakleSanajIvanezu:Dikz:01:0687:A:sew:धि॑क्षँ॒","Divi!:prIRanArTaH:Dinv:01:0677:pa:sew:धि॑विँ॑","Diza!:Sabde:Diz:03:0023:pa:sew:धि॑षँ॑","DIN:ADAre:DI:04:0031:A:aniw:धी॒ङ्","DU:viDUnane:Du:06:0133:pa:sew:धू॑","DuY:kampane:Du:05:0009:u:aniw:धु॒ञ्","Dukza!:sandIpanakleSanajIvanezu:Dukz:01:0686:A:sew:धु॑क्षँ॒","DUpa!:Dupa!' BAzArTaH:Dup:10:0303:u:sew:धू॑पँ॑","DurvI!:hiMsArTAH:Durv:01:0654:pa:sew:धु॑र्वीँ॑","DU:viDUnane:DU:06:0020:pa:sew:धू॑","DUY:kampane ityeke:DU:05:0133:u:aniw:धू॑ञ्","DUY:kampane:DU:10:0010:u:sew:धू॑ञ्","DUY:kampane:DU:09:0372:u:sew:धू॑ञ्","DUpa!:BAzArTaH:DUp:10:0303:u:sew:धू॑पँ॑","DUpa!:santApe:DUp:01:0462:pa:sew:धू॑पँ॑","DUrI:hiMsAgatyoH:DUr:04:0048:A:sew:धू॑री॒","DUSa!:kAntikaraRe ityapare:DUS:10:0141:u:sew:धू॑शँ॑","DUza!:kAntikaraRe ityeke:DUz:10:0140:u:sew:धू॑षँ॑","DUsa!:kAntikaraRe:DUs:10:0139:u:sew:धू॑सँ॑","DfN:avaDvaMsane:Df:01:1047:A:aniw:धृ॒ङ्","DfN:avasTAne:Df:06:0148:A:aniw:धृ॒ङ्","DfY:DAraRe:Df:01:1115:u:aniw:धृ॒ञ्","Dfja!:gatO:Dfj:01:0249:pa:sew:धृ॑जँ॑","Dfji!:gatO:DfYj:01:0250:pa:sew:धृ॑जिँ॑","Dfza!:prasahane:Dfz:10:0025:u:sew:धृ॑षँ॑","YiDfzA!:prAgalBye:Dfz:05:0388:pa:sew:ञिधृ॑षाँ॑","DF:vayohAnO ityanye:DF:09:0029:pa:sew:धॄ॑","Dew:pAne:De:01:1050:pa:aniw:धे॒ट्","Depf!:ca gatO:Dep:01:0433:A:sew:धे॑पृँ॒","Dorf!:gaticAturye:Dor:01:0634:pa:sew:धो॑रृँ॑","DmA:SabdAgnisaMyogayoH:DmA:01:1076:pa:aniw:ध्मा॒","DmAkzi!:kANkzAyAm GoravAsite ca ityeke:DmANkz:01:0766:pa:sew:ध्मा॑क्षिँ॑","DyE:cintAyAm:DyE:01:1056:pa:aniw:ध्यै॒","Draja!:gatO:Draj:01:0245:pa:sew:ध्र॑जँ॑","Draji!:gatO:DraYj:01:0246:pa:sew:ध्र॑जिँ॑","DraRa!:Sabde:DraR:01:0529:pa:sew:ध्र॑णँ॑","u!Drasa!:uGrasa! uYCe:Dras:10:0060:u:sew:उँ॑ध्र॑सँ॑","u!Drasa!:uYCe:Dras:09:0270:pa:sew:उँ॑ध्र॒सँ॑","DrAKf!:SozaRAlamarTyoH:DrAK:01:0133:pa:sew:ध्रा॑खृँ॑","DrAkzi!:kANkzAyAm GoravAsite ca:DrANkz:01:0764:pa:sew:ध्रा॑क्षिँ॑","DrAqf!:viSareRe:DrAq:01:0323:A:sew:ध्रा॑डृँ॒","Drija!:gatO ca:Drij:01:0253:pa:sew:ध्रि॑जँ॑","Dru:gatisTEryayoH Druva ityeke:Dru:06:0135:pa:aniw:ध्रु॒","Dru:sTErye:Dru:01:1093:pa:aniw:ध्रु॒","Drekf!:SabdotsAhayoH:Drek:01:0084:A:sew:ध्रे॑कृँ॒","DrE:tfptO:DrE:01:1055:pa:aniw:ध्रै॒","DvaMsu!:avasraMsane DvaMsu! gatO ca:DvaMs:01:0858:A:sew:ध्वं॑सुँ॒","Dvaja!:gatO:Dvaj:01:0251:pa:sew:ध्व॑जँ॑","Dvaji!:gatO:DvaYj:01:0252:pa:sew:ध्व॑जिँ॑","DvaRa!:SabdArTAH:DvaR:01:0521:pa:sew:ध्व॑णँ॑","Dvana:Sabde:Dvana:10:0431:u:sew:ध्व॑न॑","Dvana!:Sabde Sabde mit 1928, 1933:Dvan:01:0933:pa:sew:ध्व॑नँ॑","Dvana!:Sabde Sabde mit 1928, 1933:Dvan:01:0962:pa:sew:ध्व॑नँ॑","DvAkzi!:DmAkzi! kANkzAyAm GoravAsite ca:DvANkz:01:0765:pa:sew:ध्वा॑क्षिँ॑","Dvf:hUrCane:Dvf:01:1089:pa:aniw:ध्वृ॒","nakka!:nASane:nakk:10:0082:u:sew:न॑क्कँ॑","Rakza!:gatO:nakz:01:0752:pa:sew:ण॑क्षँ॑","RaKa!:gatyarTaH:naK:01:0142:pa:sew:ण॑खँ॑","RaKi!:gatyarTaH:naNK:01:0143:pa:sew:ण॑खिँ॑","Rawa!:nftO:naw:01:0347:pa:sew:ण॑टँ॑","nawa!:BAzArTaH ca:naw:10:0322:u:sew:न॑टँ॑","nawa!:avasyandane:naw:10:0018:u:sew:न॑टँ॑","Rawa!:nfttO natAvityeke gatAvityanye:naw:01:0890:pa:sew:ण॑टँ॑","Raqa!:BAzArTaH:naq:10:0309:u:sew:ण॑डँ॑","Rada!:avyakte Sabde:nad:01:0056:pa:sew:ण॑दँ॑","wunadi!:samfdDO:nand:01:0070:pa:sew:टुन॑दिँ॑","RaBa!:hiMsAyAm:naB:09:0056:pa:sew:ण॑भँ॑","RaBa!:hiMsAyAm:naB:04:0155:pa:sew:ण॑भँ॑","RaBa!:hiMsAyAm aBAve'pi:naB:01:0855:A:sew:ण॑भँ॒","Rama!:prahvatve Sabde ca mit anupasargAdvA 1944:nam:01:1136:pa:aniw:ण॒मँ॑","Raya!:gatO Raya! rakzaRe ca:nay:01:0552:A:sew:ण॑यँ॒","narda!:Sabde:nard:01:0058:pa:sew:न॑र्दँ॑","nala!:BAzArTaH ca:nal:10:0333:u:sew:न॑लँ॑","Rala!:ganDe banDana ityeke:nal:01:0972:pa:sew:ण॑लँ॑","RaSa!:adarSane:naS:04:0091:pa:aniw:ण॒शँ॑","Rasa!:kOwilye:nas:01:0714:A:sew:ण॑सँ॒","Raha!:banDane:nah:04:0062:u:aniw:ण॒हँ॒॑","nATf!:yAcYopatApESvaryASIzzu:nAT:01:0007:A:sew:ना॑थृँ॒","nADf!:yAcYopatApESvaryASIzzu:nAD:01:0006:A:sew:ना॑धृँ॒","RAsf!:Sabde:nAs:01:0712:A:sew:णा॑सृँ॒","Risi!:cumbane:niMs:02:0017:A:sew:णि॑सिँ॒","Rikza!:cumbane:nikz:01:0747:pa:sew:णि॑क्षँ॑","Riji!r:SOcapozaRayoH:nij:03:0012:u:aniw:णि॒जिँ॒॑र्","Riji!:SudDO:niYj:02:0018:A:sew:णि॑जिँ॒","Ridf!:kutsAsannikarzayoH:nid:01:1012:u:sew:णि॑दृँ॒॑","Ridi!:kutsAyAm:nind:01:0069:pa:sew:णि॑दिँ॑","Rivi!:secane secane cetyeke:ninv:01:0673:pa:sew:णि॑विँ॑","Rila!:gahane:nil:06:0087:pa:sew:णि॑लँ॑","nivAsa:AcCAdane:nivAsa:10:0427:u:sew:नि॑वा॑स॑","RiSa!:samADO:niS:01:0823:pa:sew:णि॑शँ॑","Rizu!:secane:niz:01:0796:pa:sew:णि॑षुँ॑","nizka!:parimARe:nizk:10:0209:A:sew:नि॑ष्कँ॒","RIY:prApaRe:nI:01:1049:u:aniw:णी॒ञ्","RIla!:varRe:nIl:01:0600:pa:sew:णी॑लँ॑","RIva!:sTOlye:nIv:01:0647:pa:sew:णी॑वँ॑","RU:stutO:nu:06:0132:pa:sew:णू॑","Ru:stutO:nu:02:0030:pa:sew:णु॑","Ruda!:preraRe:nud:06:0002:pa:aniw:णु॒दँ॑","Ruda!:preraRe:nud:06:0162:u:aniw:णु॒दँ॒॑","nftI!:gAtravikzepe:nft:04:0010:pa:sew:नृ॑तीँ॑","nF:naye:nF:09:0030:pa:sew:नॄ॑","nF:naye:nF:01:0921:pa:sew:नॄ॑","Redf!:kutsAsannikarzayoH:ned:01:1013:u:sew:णे॑दृँ॒॑","Rezf!:gatO:nez:01:0704:A:sew:णे॑षृँ॒","pasi!:nASane ityeke:paMS:10:0108:u:sew:प॑सिँ॑","pasi!:nASane:paMs:10:0107:u:sew:प॑सिँ॑","pakza!:parigraha ityeke:pakz:01:0757:pa:sew:प॑क्षँ॑","pakza!:parigrahe:pakz:10:0024:u:sew:प॑क्षँ॑","qupaca!z:pAke:pac:01:1151:u:aniw:डुप॒चँ॒॑ष्","paci!:vistAravacane:paYc:10:0153:u:sew:प॑चिँ॑","paci!:vyaktIkaraRe:paYc:01:0198:A:sew:प॑चिँ॒","pawa:granTe:pawa:10:0394:u:sew:प॑ट॑","pawa:BAzArTaH:pawa:10:0282:u:sew:प॑ट॑","pawa!:gatO:paw:01:0333:pa:sew:प॑टँ॑","paWa!:vyaktAyAM vAci:paW:01:0381:pa:sew:प॑ठँ॑","paRa!:vyavahAre stutO ca:paR:01:0507:A:sew:प॑णँ॒","paqi!:nASane:paRq:10:0106:u:sew:प॑डिँ॑","paqi!:gatO:paRq:01:0315:A:sew:प॑डिँ॒","pata:devaSabde gatO vA vAdanta ityeke:pata:10:0400:u:sew:प॑त॑","patx!:gatO:pat:01:0979:pa:sew:प॑तॢँ॑","paTa!:prakzepe ityeke:paT:10:0029:u:sew:प॑थँ॑","paTe!:gatO:paT:01:0982:pa:sew:प॑थेँ॑","pada:gatO:pada:10:0440:A:sew:प॑द॒","pada!:gatO:pad:04:0065:A:aniw:प॒दँ॒","pana!:ca vyavahAre stutO ca:pan:01:0508:A:sew:प॑नँ॒","paTi!:gatO:panT:10:0060:u:sew:प॑थिँ॑","paya!:gatO:pay:01:0548:A:sew:प॑यँ॒","parRa:haritaBAve:parRa:10:0485:u:sew:प॑र्ण॑","parda!:kutsite Sabde:pard:01:0029:A:sew:प॑र्दँ॒","parpa!:gatO:parp:01:0478:pa:sew:प॑र्पँ॑","parba!:gatO:parb:01:0482:pa:sew:प॑र्बँ॑","parva!:pUraRe:parv:01:0658:pa:sew:प॑र्वँ॑","pala!:rakzaRe ityeke:pal:10:0099:u:sew:प॑लँ॑","pala!:gatO:pal:01:0973:pa:sew:प॑लँ॑","palyUla:lavanapavanayoH:palyUla:10:0423:u:sew:प॑ल्यू॑ल॑","pelf!:gatO:pall:01:0621:pa:sew:पे॑लृँ॑","paSa!:banDane:paS:10:0244:u:sew:प॑शँ॑","paza:anupasargAt gatO:paza:10:0401:u:sew:प॑ष॑","pA:pAne:pA:01:1074:pa:aniw:पा॒","pA:rakzaRe:pA:02:0051:pa:aniw:पा॒","pAra:karmasamAptO:pAra:10:0453:u:sew:पा॑र॑","pAla!:rakzaRe:pAl:10:0098:u:sew:पा॑लँ॑","pi:gatO:pi:06:0293:pa:aniw:पि॒","pisi!:BAzArTaH:piMs:10:0141:u:sew:पि॑सिँ॑","piCa!:kuwwane:piC:10:0061:u:sew:पि॑छँ॑","pija!:hiMsAbalAdAnaniketanezu:pij:10:0046:u:sew:पि॑जँ॑","piji!:BAzArTaH:piYj:10:0020:u:sew:पि॑जिँ॑","piji!:hiMsAbalAdAnaniketanezu:piYj:10:0287:u:sew:पि॑जिँ॑","piji!:varRe samparcana ityeke uBayannetyanye avayava ityapare avyakte Sabda itItare:piYj:02:0047:A:sew:पि॑जिँ॒","piwa!:SabdasaNGAtayoH:piw:01:0348:pa:sew:पि॑टँ॑","piWa!:hiMsAsaNkleSanayoH:piW:01:0393:pa:sew:पि॑ठँ॑","piWi!:saNGAte ityeke:piRW:10:0186:u:sew:पि॑ठिँ॑","piqi!:saNGAte:piRq:10:0185:u:sew:पि॑डिँ॑","piqi!:saNGAte:piRq:01:0307:A:sew:पि॑डिँ॒","pivi!:secane secane cetyeke:pinv:01:0671:pa:sew:पि॑विँ॑","piSa!:nASane:piS:10:0173:u:sew:पि॑शँ॑","piSa!:avayave ayaM dIpanAyAmapi:piS:06:0105:pa:sew:पि॑शँ॑","pizx!:saYcUrRane:piz:07:0015:pa:aniw:पि॒षॢँ॑","pisf!:gatO:pis:01:0816:pa:sew:पि॑सृँ॑","pisa!:gatO:pis:10:0050:u:sew:पि॑सँ॑","pIN:pAne:pI:04:0036:A:aniw:पी॒ङ्","pIqa!:avagAhane:pIq:10:0017:u:sew:पी॑डँ॑","pIla!:pratizwamBe:pIl:01:0599:pa:sew:पी॑लँ॑","pIva!:sTOlye:pIv:01:0644:pa:sew:पी॑वँ॑","puMsa!:aBivarDaRe:puMs:10:0134:u:sew:पुं॑सँ॑","puwa:saMsarge:puwa:10:0455:u:sew:पु॑ट॑","puwa:BAzArTaH:puwa:10:0094:u:sew:पु॑ट॑","puwa!:mardane pramardane ityeke:puw:01:0367:pa:sew:पु॑टँ॑","puwa!:saMSlezaRe:puw:06:0283:pa:sew:पु॑टँ॑","puwwa!:alpIBAve:puww:10:0035:u:sew:पु॑ट्टँ॑","puqa!:puwa! mardane pramardane:puq:01:0365:pa:sew:पु॑डँ॑","puqa!:utsarge:puq:06:0114:pa:sew:पु॑डँ॑","puRa!:saNGAte ityanye:puR:10:0059:u:sew:पु॑णँ॑","puRa!:karmaRi SuBe:puR:06:0133:pa:sew:पु॑णँ॑","puwi!:BAzArTaH ca:puRw:10:0323:u:sew:पु॑टिँ॑","puqi!:KaRqane cetyeke:puRq:01:0370:pa:sew:पु॑डिँ॑","puTa!:BAzArTaH:puT:10:0013:u:sew:पु॑थँ॑","puTa!:hiMsAyAm:puT:04:0306:pa:sew:पु॑थँ॑","puTi!:hiMsAsaNkleSanayoH:punT:01:0046:pa:sew:पु॑थिँ॑","pura!:agragamane:pur:06:0072:pa:sew:पु॑रँ॑","purva!:pUraRe:purv:01:0657:pa:sew:पु॑र्वँ॑","pula!:mahattve:pul:10:0090:u:sew:पु॑लँ॑","pula!:mahattve:pul:01:0975:pa:sew:पु॑लँ॑","puza!:viBAge ca iti kecit:puz:04:0121:pa:sew:पु॑षँ॑","puza!:DAraRe:puz:10:0079:u:sew:पु॑षँ॑","puza!:puzwO:puz:04:0065:pa:aniw:पु॒षँ॑","puza!:puzwO:puz:09:0280:pa:sew:पु॑षँ॑","puza!:puzwO:puz:01:0797:pa:sew:पु॑षँ॑","puzpa!:vikasane:puzp:04:0016:pa:sew:पु॑ष्पँ॑","pusta!:AdarAnAdarayoH:pust:10:0079:u:sew:पु॑स्तँ॑","pUY:pavane:pU:09:0014:u:sew:पू॑ञ्","pUN:pavane:pU:01:1121:A:sew:पू॑ङ्","pUja!:pUjAyAm:pUj:10:0144:u:sew:पू॑जँ॑","pUyI!:viSaraRe durganDe ca:pUy:01:0557:A:sew:पू॑यीँ॒","pUrI!:ApyAyane:pUr:10:0046:u:sew:पू॑रीँ॑","pUrI!:ApyAyane:pUr:04:0334:A:sew:पू॑रीँ॒","pUrRa!:saNGAte ityeke:pUrR:10:0132:u:sew:पू॑र्णँ॑","purva!:pUraRe:pUrv:01:0657:pa:sew:पु॑र्वँ॑","pUrva!:niketane ityanye:pUrv:10:0181:u:sew:पू॑र्वँ॑","pUla!:saNGAte:pUl:10:0131:u:sew:पू॑लँ॑","pUla!:saNGAte:pUl:01:0606:pa:sew:पू॑लँ॑","pUza!:vfdDO:pUz:01:0769:pa:sew:पू॑षँ॑","pf:pAlanapUraRayoH ityeke:pf:03:0005:pa:sew:पृ॒","pf:prItO:pf:05:0013:pa:aniw:पृ॒","pfN:vyAyAme:pf:06:0138:A:aniw:पृ॒ङ्","pfca!:saMyamane:pfc:10:0024:u:sew:पृ॑चँ॑","pfcI!:samparke:pfc:07:0339:pa:sew:पृ॑चीँ॑","pfcI!:samparcane samparke:pfc:02:0025:A:sew:पृ॑चीँ॒","pfji!:varRe samparcana ityeke uBayannetyanye avayava ityapare avyakte Sabda itItare ityeke:pfYj:02:0021:A:sew:पृ॑जिँ॒","pfqa!:suKane ca:pfq:06:0054:pa:sew:पृ॑डँ॑","pfRa!:prIRane:pfR:06:0055:pa:sew:पृ॑णँ॑","pfTa!:prakzepe:pfT:10:0028:u:sew:पृ॑थँ॑","pfzu!:secane hiMsAsaNkleSanayoSca:pfz:01:0802:pa:sew:पृ॑षुँ॑","pF:pAlanapUraRayoH:pF:10:0004:u:sew:पॄ॑","pF:pAlanapUraRayoH:pF:09:0022:pa:sew:पॄ॑","pF:pUraRe:pF:03:0004:pa:sew:पॄ॒","pelf!:gatO:pel:01:0621:pa:sew:पे॑लृँ॑","pevf!:sevane:pev:01:0577:A:sew:पे॑वृँ॒","pezf!:prayatne:pez:01:0700:A:sew:पे॑षृँ॒","pesf!:gatO:pes:01:0817:pa:sew:पे॑सृँ॑","pE:SozaRe:pE:01:1069:pa:aniw:पै॒","pERf!:gatipreraRaSlezaRezu:pER:01:0527:pa:sew:पै॑णृँ॑","o!pyAyI!:vfdDO:pyAy:01:0561:A:sew:ओँ॑प्या॑यीँ॒","pyuza!:viBAge iti kecit:pyuz:04:0119:pa:sew:प्यु॑षँ॑","pyusa!:viBAge iti kecit:pyus:04:0120:pa:sew:प्यु॑सँ॑","pyEN:vfdDO:pyE:01:1119:A:aniw:प्यै॒ङ्","praCa!:jYIpsAyAm:praC:06:0149:pa:aniw:प्र॒छँ॑","praTa!:praKyAne:praT:10:0027:u:sew:प्र॑थँ॑","praTa!:praKyAne:praT:01:0869:A:sew:प्र॑थँ॒","prasa!:vistAre:pras:01:0870:A:sew:प्र॑सँ॒","prA:pUraRe:prA:02:0056:pa:aniw:प्रा॒","prIY:tarpane:prI:10:0039:u:sew:प्री॑ञ्","prIY:tarpane kAntO ca:prI:09:0373:u:aniw:प्री॒ञ्","prIN:prItO prIRane:prI:04:0002:A:aniw:प्री॒ङ्","pruN:gatO:pru:01:1111:A:aniw:प्रु॒ङ्","pruzu!:dAhe:pruz:01:0800:pa:sew:प्रु॑षुँ॑","pruza!:snehanasevanapUraRezu:pruz:09:0063:pa:sew:प्रु॑षँ॑","prezf!:gatO:prez:01:0706:A:sew:प्रे॑षृँ॒","prERf!:ityapi gatipreraRaSlezaRezu:prER:01:0528:pa:sew:प्रै॑णृँ॑","proTf!:paryAptO:proT:01:1005:u:sew:प्रो॑थृँ॒॑","plakza!:ca adane:plakz:01:1040:u:sew:प्ल॑क्षँ॒॑","pliha!:gatO:plih:01:0729:A:sew:प्लि॑हँ॒","plI:gatO:plI:09:0039:pa:aniw:प्ली॒","pluN:gatO:plu:01:1112:A:aniw:प्लु॒ङ्","pluza!:ca dAhe:pluz:04:0122:pa:sew:प्लु॑षँ॑","pluza!:dAhe:pluz:04:0009:pa:sew:प्लु॑षँ॑","pluzu!:dAhe:pluz:01:0801:pa:sew:प्लु॑षुँ॑","pluza!:snehanasevanapUraRezu:pluz:09:0064:pa:sew:प्लु॑षँ॑","plevf!:sevane ityapyeke:plev:01:0582:A:sew:प्ले॑वृँ॒","psA:BakzaRe:psA:02:0050:pa:aniw:प्सा॒","Pakka!:nicErgatO:Pakk:01:0123:pa:sew:फ॑क्कँ॑","PaRa!:gatO gatidIptyoH:PaR:01:0955:pa:sew:फ॑णँ॑","Pala!:nizpattO:Pal:01:0608:pa:sew:फ॑लँ॑","YiPalA!:viSaraRe:Pal:01:0594:pa:sew:ञिफ॑लाँ॑","Pulla!:vikasane:Pull:01:0610:pa:sew:फु॑ल्लँ॑","Pelf!:gatO:Pel:01:0622:pa:sew:फे॑लृँ॑","bahi!:vfdDO:baMh:01:0720:A:sew:ब॑हिँ॒","baWa!:sTOlye ityeke:baW:01:0383:pa:sew:ब॑ठँ॑","baRa!:Sabde ityapi kecit:baR:01:0530:pa:sew:ब॑णँ॑","bawi!:viBAjane ityeke:baRw:01:0378:pa:sew:ब॑टिँ॑","bada!:sTErye:bad:01:0053:pa:sew:ब॑दँ॑","baDa!:banDane:baD:01:1128:A:sew:ब॑धँ॒","baDa!:saMyamane:baD:10:0020:u:sew:ब॑धँ॑","banDa!:saMyamane iti cAndrAH:banD:10:0044:u:sew:ब॑न्धँ॑","banDa!:banDane:banD:09:0021:pa:aniw:ब॒न्धँ॑","vaBra!:gatyarTaH:baBr:01:0638:pa:sew:व॑भ्रँ॑","barba!:gatO:barb:01:0484:pa:sew:ब॑र्बँ॑","barha!:BAzArTaH:barh:10:0300:u:sew:ब॑र्हँ॑","barha!:prADAnye:barh:01:0725:A:sew:ब॑र्हँ॒","barha!:hiMsAyAm:barh:10:0173:u:sew:ब॑र्हँ॑","bala!:prARane:bal:10:0123:u:sew:ब॑लँ॑","bala!:prARane DAnyAvaroDe ca DAnyAvaroDane ca:bal:01:0974:pa:sew:ब॑लँ॑","balha!:BAzArTaH:balh:10:0301:u:sew:ब॑ल्हँ॑","balha!:prADAnye:balh:01:0726:A:sew:ब॑ल्हँ॒","bazka!:darSane:bazk:10:0458:u:sew:ब॑ष्कँ॑","basu!:stamBe ityeke:bas:04:0112:pa:sew:ब॑सुँ॑","basta!:ardane:bast:10:0203:A:sew:ब॑स्तँ॒","bAqf:AplAvye:bAq:01:0320:A:sew:बा॑डृ॒","bADf!:loqane viloqane:bAD:01:0005:A:sew:बा॑धृँ॒","bAhf!:prayatne:bAh:01:0732:A:sew:बा॑हृँ॒","biwa!:AkroSe:biw:01:0355:pa:sew:बि॑टँ॑","bidi!:avayave:bind:01:0066:pa:sew:बि॑दिँ॑","bila!:Bedane:bil:10:0086:u:sew:बि॑लँ॑","bila!:Bedane:bil:06:0095:pa:sew:बि॑लँ॑","bisa!:gatO:bis:01:0820:pa:sew:बि॑सँ॑","visa!:preraRe:bis:04:0123:pa:sew:वि॑सँ॑","bIBf!:katTane ca:bIB:01:0445:A:sew:बी॑भृँ॒","bukka!:BazaRe:bukk:01:0126:pa:sew:बु॑क्कँ॑","bukka!:BAzaRe:bukk:10:0238:u:sew:बु॑क्कँ॑","bugi!:varjane:buNg:01:0177:pa:sew:बु॑गिँ॑","buDa!:avagamane:buD:04:0068:A:aniw:बु॒धँ॒","buDa!:avagamane:buD:01:0994:pa:sew:बु॑धँ॑","buDi!r:boDane:buD:01:1016:u:sew:बु॑धिँ॒॑र्","u!bundi!r:niSAmane:bund:01:1017:u:sew:उँ॑बु॑न्दिँ॒॑र्","busa!:viBAge ityapare:bus:04:0117:pa:sew:बु॑सँ॑","busa!:utsarge:bus:04:0129:pa:sew:बु॑सँ॑","busta!:AdarAnAdarayoH:bust:10:0080:u:sew:बु॑स्तँ॑","bfhi!:BAzArTaH:bfMh:10:0299:u:sew:बृ॑हिँ॑","bfhi!:vfdDO bfhi! vfhi! Sabde ca:bfMh:01:0837:pa:sew:बृ॑हिँ॑","bfha!:vfdDO bfhi!r vfhi!r vfdDO Sabde ca ityeke:bfh:01:0836:pa:sew:बृ॑हँ॑","bfhU!:udyamane ityeke:bfh:06:0074:pa:sew:बृ॑हूँ॑","besa!:gatO:bes:01:0821:pa:sew:बे॑सँ॑","vehf!:prayatne:beh:01:0730:A:sew:वे॑हृँ॒","byusa!:viBAge ityanye:byus:04:0116:pa:sew:ब्यु॑सँ॑","vraRa!:SabdArTaH:braR:01:0519:pa:sew:व्र॑णँ॑","brUY:vyaktAyAM vAci:brU:02:0039:u:aniw:ब्रू॑ञ्","brUsa!:hiMsAyAm:brUs:10:0172:u:sew:ब्रू॑सँ॑","blI:varaRe ityeke:blI:09:0038:pa:aniw:ब्ली॒","Bakza!:adane iti mEtreyaH:Bakz:01:1039:u:sew:भ॑क्षँ॒॑","Bakza!:adane:Bakz:10:0033:u:sew:भ॑क्षँ॑","Baja!:viSrARane:Baj:10:0259:u:sew:भ॑जँ॑","Baja!:sevAyAm:Baj:01:1153:u:aniw:भ॒जँ॒॑","Baji!:BAzArTaH:BaYj:10:0016:u:sew:भ॑जिँ॑","BaYjo!:Amardane:BaYj:07:0290:pa:aniw:भ॒ञ्जोँ॑","Bawa!:pariBAzaRe:Baw:01:0889:pa:sew:भ॑टँ॑","Bawa!:BftO:Baw:01:0344:pa:sew:भ॑टँ॑","BaRa!:SabdArTaH:BaR:01:0515:pa:sew:भ॑णँ॑","Baqi!:kalyARe:BaRq:10:0077:u:sew:भ॑डिँ॑","Baqi!:pariBAzaRe:BaRq:01:0306:A:sew:भ॑डिँ॒","Badi!:kalyARe suKe ca:Band:01:0012:A:sew:भ॑दिँ॒","Bartsa!:santarjane tarjane:Barts:10:0202:A:sew:भ॑र्त्सँ॒","Barba!:hiMsAyAm ityeke:Barb:01:0662:pa:sew:भ॑र्बँ॑","BarBa!:hiMsAyAm ityanye:BarB:01:0663:pa:sew:भ॑र्भँ॑","Barva!:hiMsAyAm:Barv:01:0661:pa:sew:भ॑र्वँ॑","Bala!:pariBAzaRahiMsAdAnezu:Bal:01:0568:A:sew:भ॑लँ॒","Bala!:ABaRqane:Bal:10:0224:A:sew:भ॑लँ॒","Balla!:pariBAzaRahiMsAdAnezu:Ball:01:0569:A:sew:भ॑ल्लँ॒","Baza!:Bartsane:Baz:01:0791:pa:sew:भ॑षँ॑","Basu!:stamBe iti kecit:Bas:04:0113:pa:sew:भ॑सुँ॑","Basa!:BartsanadIptyoH:Bas:03:0019:pa:sew:भ॑सँ॑","BA:dIptO:BA:02:0046:pa:aniw:भा॒","BAja:pfTakkarmaRi:BAja:10:0428:u:sew:भा॑ज॑","BAma:kroDe:BAma:10:0411:u:sew:भा॑म॑","BAma!:kroDe:BAm:01:0509:A:sew:भा॑मँ॒","BAza!:vyaktAyAM vAci:BAz:01:0696:A:sew:भा॑षँ॒","BAsf!:dIptO:BAs:01:0711:A:sew:भा॑सृँ॒","Bikza!:BikzAyAmalABe lABe ca:Bikz:01:0690:A:sew:भि॑क्षँ॒","Bidi!r:vidAraRe:Bid:07:0002:u:aniw:भि॒दिँ॒॑र्","YimidA!:snehane:Bid:01:0844:A:sew:ञिमि॑दाँ॒","Bidi!:avayave ityeke:Bind:01:0067:pa:sew:भि॑दिँ॑","YiBI:Baye:BI:03:0002:pa:aniw:ञिभी॒","Bujo!:kOwilye:Buj:06:0153:pa:aniw:भु॒जोँ॑","Buja!:pAlanAByavahArayoH:Buj:07:0017:pa:aniw:भु॒जँ॑","BU:avakalkane miSrIkaraRa ityeke cintana ityanye:BU:10:0382:u:sew:भू॑","BU:prAptO:BU:10:0277:u:sew:भू॑","BU:sattAyAm:BU:01:0001:pa:sew:भू॑","BUza!:alaNkAre:BUz:01:0777:pa:sew:भू॑षँ॑","BUza!:alaNkAre:BUz:10:0255:u:sew:भू॑षँ॑","quBfY:DAraRapozaRayoH:Bf:03:0318:u:aniw:डुभृ॒ञ्","BfY:BaraRe:Bf:01:0137:u:aniw:भृ॒ञ्","BfSi!:BAzArTaH ca:BfMS:10:1045:u:sew:भृ॑शिँ॑","BfMSu!:aDaHpatane:BfMS:04:0006:pa:sew:भृं॑शुँ॑","BfjI!:Barjane:Bfj:01:0202:A:sew:भृ॑जीँ॒","Bfqa!:nimajjane ityeke:Bfq:06:0129:pa:sew:भृ॑डँ॑","BfSu!:aDaHpatane:BfS:04:0136:pa:sew:भृ॑शुँ॑","BF:Bartsane Barane'pyeke:BF:09:0024:pa:sew:भॄ॑","Bezf!:Baye gatAvityeke:Bez:01:1026:u:sew:भे॑षृँ॒॑","Byasa!:Baye:Byas:01:0715:A:sew:भ्य॑सँ॒","BraMSu!:avasraMsane ityapi kecit:BraMS:01:0860:A:sew:भ्रं॑शुँ॑","BraMSu!:aDaHpatane:BraMS:04:0138:pa:sew:भ्रं॑शुँ॑","BraMsu!:avasraMsane:BraMs:01:0859:A:sew:भ्रं॑सुँ॒","Brakza!:adane:Brakz:01:1037:u:sew:भ्र॑क्षँ॒॑","Brasja!:pAke:Brajj:06:0004:u:aniw:भ्र॒स्जँ॒॑","BraRa!:SabdArTaH:BraR:01:0520:pa:sew:भ्र॑णँ॑","Bramu!:anavasTAne:Bram:04:0102:pa:sew:भ्र॑मुँ॑","Bramu!:calane:Bram:01:0985:pa:sew:भ्र॑मुँ॑","Brasja!:pAke:Brasj:06:0004:u:aniw:भ्र॒स्जँ॒॑","wuBrAjf!:dIptO:BrAj:01:0205:A:sew:टुभ्रा॑जृँ॒","BrAjf!:dIptO:BrAj:01:0957:A:sew:भ्रा॑जृँ॒","wuBrASf!:dIptO:BrAS:01:0958:A:sew:टुभ्रा॑शृँ॒","BrI:Baye BaraRa ityeke:BrI:09:0041:pa:aniw:भ्री॒","BrURa!:ASAviSaNkayoH ASAyAm:BrUR:10:0213:A:sew:भ्रू॑णँ॒","Brejf!:dIptO:Brej:01:0204:A:sew:भ्रे॑जृँ॒","Brezf!:gatO:Brez:01:1027:u:sew:भ्रे॑षृँ॒॑","Blakza!:adane:Blakz:01:1038:u:sew:भ्ल॑क्षँ॒॑","wuBlASf!:dIptO:BlAS:01:0959:A:sew:टुभ्ला॑शृँ॒","Blezf!:gatO:Blez:01:1028:u:sew:भ्ले॑षृँ॒॑","mahi!:BAzArTaH ca:maMh:10:0330:u:sew:म॑हिँ॑","mahi!:vfdDO:maMh:01:0721:A:sew:म॑हिँ॒","maKa!:gatyarTaH:maK:01:0140:pa:sew:म॑खँ॑","maki!:maRqane:maNk:01:0094:A:sew:म॑किँ॒","maKi!:gatyarTaH:maNK:01:0141:pa:sew:म॑खिँ॑","magi!:gatyarTaH:maNg:01:0157:pa:sew:म॑गिँ॑","maGi!:gatyAkzepe gatO gatyAramBe cetyapare maGi! kEtave ca:maNG:01:0117:A:sew:म॑घिँ॒","maGi!:maRqane:maNG:01:0183:pa:sew:म॑घिँ॑","maca!:kalkane kaTana ityanye:mac:01:0195:A:sew:म॑चँ॒","wumasjo!:SudDO:majj:06:0151:pa:aniw:टुम॒स्जोँ॑","maci!:DAraRocCrAyapUjanezu:maYc:01:0197:A:sew:म॑चिँ॒","maWa!:madanivAsayoH:maW:01:0384:pa:sew:म॑ठँ॑","maRa!:SabdArTaH:maR:01:0516:pa:sew:म॑णँ॑","maWi!:Soke:maRW:01:0296:A:sew:म॑ठिँ॒","maqi!:ca viBAjane:maRq:01:0305:A:sew:म॑डिँ॒","maqi!:BUzAyAM harze ca:maRq:10:0076:u:sew:म॑डिँ॑","maqi!:BUzAyAm:maRq:01:0361:pa:sew:म॑डिँ॑","maTe!:viloqane:maT:01:0983:pa:sew:म॑थेँ॑","mada!:tfptiyoge:mad:10:0105:A:sew:म॑दँ॒","madI!:harze harzaglepanayoH mit 1927:mad:04:0229:pa:sew:म॑दीँ॑","manu!:avaboDane:man:08:0233:A:sew:म॑नुँ॒","mana!:jYAne:man:04:0009:A:aniw:म॒नँ॒","mAna!:stamBe:man:10:0073:A:sew:मा॑नँ॒","matri!:guptapariBAzaRe:mantr:10:0199:A:sew:म॑त्रिँ॒","manTa!:viloqane:manT:09:0047:pa:sew:म॑न्थँ॑","manTa!:viloqane:manT:01:0048:pa:sew:म॑न्थँ॑","maTi!:hiMsAsaNkleSanayoH:manT:01:0044:pa:sew:म॑थिँ॑","madi!:stutimodamadasvapnakAntigatizu:mand:01:0013:A:sew:म॑दिँ॒","maBra!:gatyarTaH:maBr:01:0639:pa:sew:म॑भ्रँ॑","maya!:gatO:may:01:0549:A:sew:म॑यँ॒","marca!:SabdArTaH ca:marc:10:0151:u:sew:म॑र्चँ॑","marba!:gatO:marb:01:0485:pa:sew:म॑र्बँ॑","marva!:pUraRe:marv:01:0659:pa:sew:म॑र्वँ॑","mala!:DAraRe:mal:01:0566:A:sew:म॑लँ॒","malla!:DAraRe:mall:01:0567:A:sew:म॑ल्लँ॒","mava!:banDane:mav:01:0683:pa:sew:म॑वँ॑","mavya!:banDane:mavy:01:0585:pa:sew:म॑व्यँ॑","maSa!:Sabde:maS:01:0825:pa:sew:म॑शँ॑","maza!:hiMsArTaH:maz:01:0788:pa:sew:म॑षँ॑","maska!:gatyarTaH:mazk:01:0107:A:sew:म॑स्कँ॒","masI!:parimAne:mas:04:0131:pa:sew:म॑सीँ॑","maska!:gatyarTaH:mask:01:0107:A:sew:म॑स्कँ॒","wumasjo!:SudDO:masj:06:0151:pa:aniw:टुम॒स्जोँ॑","maha:pUjAyAm:maha:10:0406:u:sew:म॑ह॑","maha!:pUjAyAm:mah:01:0831:pa:sew:म॑हँ॑","mAN:mAne:mA:04:0037:A:aniw:मा॒ङ्","mA:mAne:mA:02:0057:pa:aniw:मा॒","mAN:mAne Sabde ca:mA:03:0007:A:aniw:मा॒ङ्","mAkzi!:kANkzAyAm:mANkz:01:0762:pa:sew:मा॑क्षिँ॑","mana!:stamBe ityeke:mAn:10:0234:A:sew:म॑नँ॒","mAna!:pUjAyAm:mAn:10:0381:u:sew:मा॑नँ॑","mAna!:pUjAyAm:mAn:01:1127:A:sew:मा॑नँ॒","mArga!:anvezaRe:mArg:10:0384:u:sew:मा॑र्गँ॑","mArja!:SabdArTO:mArj:10:0150:u:sew:मा॑र्जँ॑","mAhf!:mAne:mAh:01:1042:u:sew:मा॑हृँ॒॑","qumiY:prakzepane:mi:05:0004:u:aniw:डुमि॒ञ्","miCa!:utkleSe:miC:06:0017:pa:sew:मि॑छँ॑","miji!:BAzArTaH:miYj:10:0286:u:sew:मि॑जिँ॑","miTf!:meDAhiMsanayoH ityeke:miT:01:1008:u:sew:मि॑थृँ॒॑","midf!:meDAhiMsanayoH:mid:01:1006:u:sew:मि॑दृँ॒॑","mida!:snehane ityeke:mid:10:0158:u:sew:मि॑दँ॑","YimidA!:snehane:mid:04:0012:pa:sew:ञिमि॑दाँ॑","miDf!:meDAhiMsanayoH ityanye:miD:01:1010:u:sew:मि॑धृँ॒॑","midi!:snehane:mind:10:0011:u:sew:मि॑दिँ॑","mivi!:secane secane cetyeke:minv:01:0672:pa:sew:मि॑विँ॑","mila!:SlezaRe:mil:06:0091:pa:sew:मि॑लँ॑","mila!:saNgame saNgamane:mil:06:0165:u:sew:मि॑लँ॒॑","miSa!:Sabde:miS:01:0824:pa:sew:मि॑शँ॑","miSra:samparke:miSra:10:0466:u:sew:मि॑श्र॑","mizu!:secane:miz:01:0795:pa:sew:मि॑षुँ॑","miza!:sparDAyAm:miz:06:0079:pa:sew:मि॑षँ॑","miha!:secane:mih:01:1147:pa:aniw:मि॒हँ॑","mI:gatO:mI:10:0032:u:sew:मी॑","mIN:hiMsAyAm:mI:04:0004:A:aniw:मी॒ङ्","mIY:hiMsAyAm banDane mAne:mI:09:0361:u:aniw:मी॒ञ्","mImf!:gatO mImf! Sabde ca:mIm:01:0539:pa:sew:मी॑मृँ॑","mIla!:nimezaRe:mIl:01:0595:pa:sew:मी॑लँ॑","mIva!:sTOlye:mIv:01:0645:pa:sew:मी॑वँ॑","muKi!:gatyarTaH ityapi kecit:muNK:01:0166:pa:sew:मु॑खिँ॑","muca!:pramocane modane ca pramocanamodanayoH:muc:10:0166:u:sew:मु॑चँ॑","mucx!:mokzaRe mocane:muc:06:0272:u:aniw:मु॒चॢँ॒॑॑","muja!:SabdArTaH:muj:01:0283:pa:sew:मु॑जँ॑","muci:kalkane kaTana ityanye:muYc:01:0196:A:sew:मु॑चि॒","muji!:SabdArTAH:muYj:01:0284:pa:sew:मु॑जिँ॑","muwa!:mardane pramardane ityeke:muw:01:0366:pa:sew:मु॑टँ॑","muwa!:AkzepapramardanayoH:muw:06:0104:pa:sew:मु॑टँ॑","muwa!:saYcUrRane:muw:10:0101:u:sew:मु॑टँ॑","muqa!:muwa!' mardane pramardane:muq:01:0364:pa:sew:मु॑डँ॑","muRa!:pratijYAne:muR:06:0060:pa:sew:मु॑णँ॑","muWi!:pAlane:muRW:01:0298:A:sew:मु॑ठिँ॒","muqi!:KaRqane:muRq:01:0369:pa:sew:मु॑डिँ॑","muqi!:mArjane:muRq:01:0308:A:sew:मु॑डिँ॒","muda!:saMsarge:mud:10:0268:u:sew:मु॑दँ॑","muda!:harze:mud:01:0016:A:sew:मु॑दँ॒","mura!:saMvezwane saYcezwane:mur:06:0069:pa:sew:मु॑रँ॑","murCA!:mohanasamucCrAyayoH:murC:01:0240:pa:sew:मु॑र्छाँ॑","murvI!:banDane:murv:01:0656:pa:sew:मु॑र्वीँ॑","muza!:steye:muz:09:0066:pa:sew:मु॑षँ॑","musa!:KaRqane:mus:04:0130:pa:sew:मु॑सँ॑","musta!:saNGAte:must:10:0126:u:sew:मु॑स्तँ॑","muha!:vEcittye:muh:04:0095:pa:aniw:मु॒हँ॑","mUY:banDane:mU:09:0015:u:sew:मू॑ञ्","mUN:banDane:mU:01:1122:A:sew:मू॑ङ्","mUtra:prasravaRe:mUtra:10:0451:u:sew:मू॑त्र॑","mUla!:pratizWAyAm:mUl:01:0607:pa:sew:मू॑लँ॑","mUla!:rohane:mUl:10:0092:u:sew:मू॑लँ॑","mUza!:steye:mUz:01:0770:pa:sew:मू॑षँ॑","mfN:prARatyAge:mf:06:0139:A:aniw:मृ॒ङ्","mfkza!:saNGAte:mfkz:01:0754:pa:sew:मृ॑क्षँ॑","mfga:anvezaRe:mfga:10:0442:A:sew:मृ॑ग॒","mfjU!:mfjU!S SudDO:mfj:02:0386:pa:sew:मृ॑जूँ॑","mfjU!:SOcAlaNkArayoH:mfj:10:0061:u:sew:मृ॑जूँ॑","mfqa!:kzode suKe ca:mfq:09:0052:pa:sew:मृ॑डँ॑","mfqa!:suKane:mfq:06:0053:pa:sew:मृ॑डँ॑","mfRa!:hiMsAyAm:mfR:06:0057:pa:sew:मृ॑णँ॑","mfqi!:preraRe:mfRq:10:0165:u:sew:मृ॑डिँ॑","mfda!:kzode:mfd:09:0051:pa:sew:मृ॑दँ॑","mfDu!:undane:mfD:01:1015:u:sew:मृ॑धुँ॒॑","mfSa!:AmarSaRe:mfS:06:0161:pa:aniw:मृ॒शँ॑","mfza!:titikzAyAm:mfz:10:0060:u:sew:मृ॑षँ॒॑","mfza!:titikzAyAm:mfz:04:0387:u:sew:मृ॑षँ॒॑","mfzu!:secane mfzu! sahane ca:mfz:01:0804:pa:sew:मृ॑षुँ॑","mF:hiMsAyAm:mF:09:0025:pa:sew:मॄ॑","meN:praRidAne:me:01:1116:A:aniw:मे॒ङ्","meTf!:meDAhiMsanayoH ityeke:meT:01:1009:u:sew:मे॑थृँ॒॑","medf!:meDAhiMsanayoH:med:01:1007:u:sew:मे॑दृँ॒॑","meDf!:meDAhiMsanayoH ityanye meDf! saNgame ca:meD:01:1011:u:sew:मे॑धृँ॒॑","mepf!:gatO:mep:01:0429:A:sew:मे॑पृँ॒","mevf!:sevane:mev:01:0578:A:sew:मे॑वृँ॒","mokza!:Asane asane:mokz:10:0256:u:sew:मो॑क्षँ॑","mnA:aByAse:mnA:01:1078:pa:aniw:म्ना॒","mrakza!:saNGAte ityeke:mrakz:01:0755:pa:sew:म्र॑क्षँ॑","mrakza!:Cedane:mrakz:10:0168:u:sew:म्र॑क्षँ॑","mrakza!:mlecCane:mrakz:10:0171:u:sew:म्र॑क्षँ॑","mraCa!:mlecCane ityeke:mraC:10:0169:u:sew:म्र॑छँ॑","mrada!:mardane:mrad:01:0871:A:sew:म्र॑दँ॒","mrucu!:gatyarTaH:mruc:01:0222:pa:sew:म्रु॑चुँ॑","mruYcu!:gatyarTaH:mruYc:01:0220:pa:sew:म्रु॑ञ्चुँ॑","mrewf!:unmAde:mrew:01:0327:pa:sew:म्रे॑टृँ॑","mreqf!:unmAde:mreq:01:0328:pa:sew:म्रे॑डृँ॑","mlucu!:gatyarTAH:mluc:01:0223:pa:sew:म्लु॑चुँ॑","mluYcu!:gatyarTaH:mluYc:01:0221:pa:sew:म्लु॑ञ्चुँ॑","mleCa!:Cedane mleCa! avyaktAyAM vAci:mleC:10:0170:u:sew:म्ले॑छँ॑","mleCa!:avyakte Sabde:mleC:01:0233:pa:sew:म्ले॑छँ॑","mlewf!:unmAde ityeke:mlew:01:0329:pa:sew:म्ले॑टृँ॑","mlevf!:sevane:mlev:01:0579:A:sew:म्ले॑वृँ॒","mlE:harzakzaye:mlE:01:1052:pa:aniw:म्लै॒","yakza!:pUjAyAm:yakz:10:0215:A:sew:य॑क्षँ॒","yaja!:devapUjAsaNgatikaraRadAnezu:yaj:01:1157:u:aniw:य॒जँ॒॑","yata!:nikAropaskArayoH:yat:10:0261:u:sew:य॑तँ॑","yatI!:prayatne:yat:01:0030:A:sew:य॑तीँ॒","yatri!:saNkocane:yantr:10:0003:u:sew:य॑त्रिँ॑","yaBa!:mETune viparItamETune:yaB:01:1135:pa:aniw:य॒भँ॑","yama!:uparame yamo'parivezaRe na mit 1953:yam:01:1139:pa:aniw:य॒मँ॑","yama!:parivezaRe mit 1953:yam:10:0119:u:sew:य॑मँ॑","yasu!:prayatne:yas:04:0107:pa:sew:य॑सुँ॑","yA:prApaRe:yA:02:0044:pa:aniw:या॒","wuyAcf!:yAcYAyAm:yAc:01:1001:u:sew:टुया॑चृँ॒॑","yu:jugupsAyAm:yu:10:0027:A:sew:यु॑","yuY:banDane:yu:09:0235:u:aniw:यु॒ञ्","yu:miSreRe'BiSraRe ca:yu:02:0011:pa:sew:यु॑","yugi!:varjane:yuNg:01:0175:pa:sew:यु॑गिँ॑","yuCa!:pramAde:yuC:01:0242:pa:sew:यु॑छँ॑","yuja!:saMyamane:yuj:10:0074:u:sew:यु॑जँ॑","yuji!r:yoge:yuj:07:0338:u:aniw:यु॒जिँ॒॑र्","yuja!:samADO:yuj:04:0007:A:aniw:यु॒जँ॒","yutf!:BAsaRe:yut:01:0031:A:sew:यु॑तृँ॒","yuDa!:samprahAre:yuD:04:0069:A:aniw:यु॒धँ॒","yupa!:vimohane:yup:04:0148:pa:sew:यु॑पँ॑","yUza!:hiMsAyAm:yUz:01:0775:pa:sew:यू॑षँ॑","yezf!:prayatne ityanye:yez:01:0702:A:sew:ये॑षृँ॒","yOwf!:banDe:yOw:01:0326:pa:sew:यौ॑टृँ॑","rahi!:BAzArTaH ca:raMh:10:0329:u:sew:र॑हिँ॑","rahi!:gatO:raMh:01:0833:pa:sew:र॑हिँ॑","raka!:AsvAdane:rak:10:0262:u:sew:र॑कँ॑","rakza!:pAlane:rakz:01:0746:pa:sew:र॑क्षँ॑","raKa!:gatyarTaH:raK:01:0144:pa:sew:र॑खँ॑","raga!:AsvAdane ityanye:rag:10:0265:u:sew:र॑गँ॑","rage!:SaNkAyAm:rag:01:0894:pa:sew:र॑गेँ॑","raGa!:AsvAdane ityeke:raG:10:0264:u:sew:र॑घँ॑","raKi!:gatyarTaH:raNK:01:0145:pa:sew:र॑खिँ॑","raNga!:gatO:raNg:10:0397:u:sew:र॑ङ्गँ॑","ragi!:gatyarTaH:raNg:01:0153:pa:sew:र॑गिँ॑","raGi!:BAzArTaH ca:raNG:10:0326:u:sew:र॑घिँ॑","raGi!:gatyarTaH:raNG:01:0112:A:sew:र॑घिँ॒","raca:pratiyatne:raca:10:0403:u:sew:र॑च॑","raYja!:rAge mit 1940:raYj:04:0063:u:aniw:र॒ञ्जँ॒॑","raYja!:rAge mit 1940:raYj:01:1154:u:aniw:र॒ञ्जँ॒॑","rawa!:pariBAzaRe:raw:10:0462:u:sew:र॑टँ॑","rawa!:pariBAzaRe ityeke:raw:01:0334:pa:sew:र॑टँ॑","rawa!:pariBAzaRe:raw:01:0387:pa:sew:र॑टँ॑","raWa!:pariBAzaRe:raW:01:0386:pa:sew:र॑ठँ॑","raRa!:SabdArTaH mit iti BojaH 0932:raR:01:0904:pa:sew:र॑णँ॑","raRa!:gatO mit iti BojaH 0932:raR:01:0513:pa:sew:र॑णँ॑","ravi!:gatyarTaH:raRv:01:0680:pa:sew:र॑विँ॑","rada!:vileKane:rad:01:0055:pa:sew:र॑दँ॑","raDa!:hiMsAsaMrAdDyoH:raD:04:0090:pa:aniw:र॒धँ॑","rapa!:vyaktAyAM vAci:rap:01:0467:pa:sew:र॑पँ॑","raPa!:gatO:raP:01:0479:pa:sew:र॑फँ॑","raBa!:rABasye:raB:01:1129:A:aniw:र॒भँ॒","ramu!:krIqAyAm rama! iti mADavaH:ram:01:0989:A:aniw:र॒मुँ॒","raPi!:gatO:ramP:01:0480:pa:sew:र॑फिँ॑","rabi!:Sabde:ramb:01:0436:A:sew:र॑बिँ॒","raBi!:Sabde kvacitpaWyate ityeke:ramB:01:0449:A:sew:र॑भिँ॒","raya!:gatO:ray:01:0554:A:sew:र॑यँ॒","rasa:AsvAdanasnehanayoH:rasa:10:0477:u:sew:र॑स॑","rasa!:Sabde:ras:01:0810:pa:sew:र॑सँ॑","raha:tyAge:raha:10:0396:u:sew:र॑ह॑","raha:tyAge:raha:10:0122:u:sew:र॑ह॑","raha!:tyAge:rah:01:0832:pa:sew:र॑हँ॑","rA:dAne:rA:02:0052:pa:aniw:रा॒","rAKf!:SozaRAlamarTyoH:rAK:01:0130:pa:sew:रा॑खृँ॑","rAGf!:sAmarTye:rAG:01:0118:A:sew:रा॑घृँ॒","rAjf!:dIptO:rAj:01:0956:u:sew:रा॑जृँ॒॑","rADa!:saMsidDO:rAD:05:0018:pa:aniw:रा॒धँ॑","rADa!:akarmakAdvfdDAveva:rAD:04:0077:pa:aniw:राधँ॑","rAsf!:Sabde:rAs:01:0713:A:sew:रा॑सृँ॒","ri:f' hiMsAyAm:ri:05:0032:pa:sew:रि॑","ri:gatO:ri:06:0140:pa:aniw:रि॒","riKa!:gatyarTaH ityapi kecit:riK:01:0168:pa:sew:रि॑खँ॑","riKi!:gatyarTaH ityapi kecit:riNK:01:0169:pa:sew:रि॑खिँ॑","rigi!:gatyarTaH:riNg:01:0164:pa:sew:रि॑गिँ॑","rica!:viyojanasamparcanayoH:ric:10:0004:u:sew:रि॑चँ॑","rici!r:virecane:ric:07:0348:u:aniw:रि॒चिँ॒॑र्","rivi!:gatyarTaH:riRv:01:0679:pa:sew:रि॑विँ॑","riPa!:katTanayudDanindAhiMsAdAnezu:riP:06:0026:pa:sew:रि॑फँ॑","riSa!:hiMsAyAm:riS:06:0156:pa:aniw:रि॒शँ॑","riza!:hiMsAyAm:riz:04:0144:pa:sew:रि॑षँ॑","riza!:hiMsArTAH:riz:01:0790:pa:sew:रि॑षँ॑","riha!:katTanayudDanindAhiMsAdAnezu ityeke:rih:06:0027:pa:sew:रि॑हँ॑","rI:gatirezaRayoH:rI:09:0035:pa:aniw:री॒","rIN:SravaRe:rI:04:0033:A:aniw:री॒ङ्","ruN:gatirozaRayoH:ru:01:0319:A:aniw:रु॒ङ्","ru:Sabde:ru:02:0321:pa:sew:रु॑","ruSi!:BAzArTaH ca:ruMS:10:1114:u:sew:रु॑शिँ॑","rusi!:BAzArTaH ca:ruMs:10:0028:u:sew:रु॑सिँ॑","ruca!:dIptAvaBiprItO ca:ruc:01:0847:A:sew:रु॑चँ॒","rujo!:BaNge:ruj:06:0335:pa:aniw:रु॒जोँ॑","ruja!:hiMsAyAm:ruj:10:0152:u:sew:रु॑जँ॑","ruwa!:BAzArTaH ca:ruw:10:0314:u:sew:रु॑टँ॑","ruwa!:upaGAte pratiGAte:ruw:01:0849:A:sew:रु॑टँ॒","ruwa!:roze ityeke:ruw:10:0188:u:sew:रु॑टँ॑","ruWa!:upaGAte:ruW:01:0389:pa:sew:रु॑ठँ॑","ruwi!:steye:ruRw:01:0371:pa:sew:रु॑टिँ॑","ruWi!:steye ityeke:ruRW:01:0400:pa:sew:रु॑ठिँ॑","ruWi!:gatO:ruRW:01:0373:pa:sew:रु॑ठिँ॑","ruqi!:steye ityapare:ruRq:01:0375:pa:sew:रु॑डिँ॑","rudi!r:aSruvimocane:rud:02:0062:pa:sew:रु॑दिँ॑र्","ruDi!r:AvaraRe:ruD:07:0001:u:aniw:रु॒धिँ॒॑र्","rupa!:vimohane:rup:04:0149:pa:sew:रु॑पँ॑","ruSa!:hiMsAyAm:ruS:06:0155:pa:aniw:रु॒शँ॑","ruza!:hiMsAyAm roze:ruz:04:0187:pa:sew:रु॑षँ॑","ruza!:hiMsArTaH:ruz:01:0789:pa:sew:रु॑षँ॑","ruza!:roze:ruz:10:0143:u:sew:रु॑षँ॑","ruha!:bIjajanmani prAdurBAve ca:ruh:01:0995:pa:aniw:रु॒हँ॑","rUkza:pAruzye:rUkza:10:0452:u:sew:रू॑क्ष॑","rUpa:rUpakriyAyAm:rUpa:10:0479:u:sew:रू॑प॑","rUza!:BUzAyAm:rUz:01:0772:pa:sew:रू॑षँ॑","rekf!:SaNkAyAm:rek:01:0085:A:sew:रे॑कृँ॒","rejf!:dIptO:rej:01:0206:A:sew:रे॑जृँ॒","rewf!:pariBAzaRe:rew:01:1002:u:sew:रे॑टृँ॒॑","repf!:gatO:rep:01:0430:A:sew:रे॑पृँ॒","reBf!:Sabde:reB:01:0447:A:sew:रे॑भृँ॒","revf!:plavagatO:rev:01:0584:A:sew:रे॑वृँ॒","rezf!:avyakte Sabde:rez:01:0707:A:sew:रे॑षृँ॒","rE:Sabde:rE:01:1057:pa:aniw:रै॒","roqf!:unmAde:roq:01:0412:pa:sew:रो॑डृँ॑","rOqf!:anAdare:rOq:01:0411:pa:sew:रौ॑डृँ॑","lakza!:Alocane:lakz:10:0219:A:sew:ल॑क्षँ॒","lakza!:darSanANkanayoH:lakz:10:0006:u:sew:ल॑क्षँ॑","laKa!:gatyarTaH:laK:01:0146:pa:sew:ल॑खँ॑","laga!:AsvAdane:lag:10:0263:u:sew:ल॑गँ॑","lage!:saNge:lag:01:0895:pa:sew:ल॑गेँ॑","laKi!:gatyarTaH:laNK:01:0147:pa:sew:ल॑खिँ॑","lagi!:gatyarTaH:laNg:01:0154:pa:sew:ल॑गिँ॑","laGi!:BAzArTaH ca:laNG:10:0291:u:sew:ल॑घिँ॑","laGi!:BAzArTaH:laNG:10:0327:u:sew:ल॑घिँ॑","laGi!:gatyarTaH laGi! BojananivfttAvapi:laNG:01:0113:A:sew:ल॑घिँ॒","laGi!:SozaRe BAzAyAM dIptO sImAtikrame ca:laNG:01:0182:pa:sew:ल॑घिँ॑","laCa!:lakzaRe:laC:01:0234:pa:sew:ल॑छँ॑","laja:prakASane:laja:10:0463:u:sew:ल॑ज॑","laja:apavAraRe ityeke:laja:10:0010:u:sew:ल॑ज॑","laja!:Barjane:laj:01:0271:pa:sew:ल॑जँ॑","o!lajI!:vrIqAyAm vrIqe:laj:06:0016:A:sew:ओँ॑ल॑जीँ॒","o!lasjI!:vrIqAyAm vrIqe:lajj:06:0011:A:sew:ओँ॑ल॑स्जीँ॒","laji!:BAzArTaH ca:laYj:10:0315:u:sew:ल॑जि॑","laji!:hiMsAbalAdAnaniketanezu:laYj:10:0048:u:sew:ल॑जि॑","laji!:Barjane:laYj:01:0272:pa:sew:ल॑जिँ॑","laji!:prakASane ityeke:laYj:10:0465:u:sew:ल॑जि॑","lawa!:bAlye:law:01:0335:pa:sew:ल॑टँ॑","laqa!:upasevAyAm jihvonmaTane laqiH mit 1926:laq:10:0010:u:sew:ल॑डँ॑","laqa!:vilAse:laq:01:0415:pa:sew:ल॑डँ॑","laqi!:BAzArTaH ca:laRq:10:0331:u:sew:ल॑डिँ॑","o!laqi!:olaqi! utkzepane u!laqi! ityanye:laRq:10:0013:u:sew:ओँ॑ल॑डिँ॑","lapa!:vyaktAyAM vAci:lap:01:0468:pa:sew:ल॑पँ॑","qulaBa!z:prAptO:laB:01:1130:A:aniw:डुल॒भँ॒ष्","labi!:Sabde:lamb:01:0439:A:sew:ल॑बिँ॒","labi!:Sabde avasraMsane ca:lamb:01:0437:A:sew:ल॑बिँ॒","laBi!:ca Sabde kvacitpaWyate:lamB:01:0450:A:sew:ल॑भिँ॒","laya!:ca gatO:lay:01:0555:A:sew:ल॑यँ॒","larba!:gatO:larb:01:0483:pa:sew:ल॑र्बँ॑","lala!:vilAse ityeke IpsAyAm:lal:01:0416:pa:sew:ल॑लँ॑","lala!:IpsAyAm:lal:10:0210:A:sew:ल॑लँ॒","laza!:kAntO:laz:01:1033:u:sew:ल॑षँ॒॑","lasa!:Sabde SlezaRakrIqanayoH ca:las:01:0811:pa:sew:ल॑सँ॑","lasa!:Silpayoge:las:10:0253:u:sew:ल॑सँ॑","o!lasjI!:vrIqAyAm vrIqe:lasj:06:0011:A:sew:ओँ॑ल॑स्जीँ॒","lA:AdAne dAne:lA:02:0053:pa:aniw:ला॒","lAKf!:SozaRAlamarTyoH:lAK:01:0131:pa:sew:ला॑खृँ॑","lAGf!:sAmarTye:lAG:01:0119:A:sew:ला॑घृँ॒","lAja!:Barjane Bartsane ca:lAj:01:0273:pa:sew:ला॑जँ॑","lACi!:lakzaRe:lAYC:01:0235:pa:sew:ला॑छिँ॑","lAji!:Barjane Bartsane ca:lAYj:01:0274:pa:sew:ला॑जिँ॑","lABa:preraRe:lABa:10:0482:u:sew:ला॑भ॑","liKa!:gatyarTaH ityapi kecit:liK:01:0170:pa:sew:लि॑खँ॑","liKa!:akzaravinyAse:liK:06:0092:pa:sew:लि॑खँ॑","liKi!:gatyarTaH ityapi kecit:liNK:01:0171:pa:sew:लि॑खिँ॑","ligi!:gatyarTAH:liNg:01:0165:pa:sew:लि॑गिँ॑","ligi!:citrIkaraRe:liNg:10:0267:u:sew:लि॑गिँ॑","liji!:BAzArTaH:liYj:10:0288:u:sew:लि॑जिँ॑","lipa!:upadehe:lip:06:0169:u:aniw:लि॒पँ॒॑","liSa!:alpIBAve:liS:04:0076:A:aniw:लि॒शँ॒","liSa!:gatO:liS:06:0157:pa:aniw:लि॒शँ॑","liha!:AsvAdane:lih:02:0006:u:aniw:लि॒हँ॒॑","lI:dravIkaraRe:lI:10:0034:u:sew:ली॑","lIN:SlezaRe:lI:04:0036:A:aniw:ली॒ङ्","lI:SlezaRe:lI:09:0343:pa:aniw:ली॒","luYca!:apanayane:luYc:01:0214:pa:sew:लु॑ञ्चँ॑","luji!:BAzArTaH:luYj:10:0049:u:sew:लु॑जिँ॑","luji!:hiMsAbalAdAnaniketanezu:luYj:10:0289:u:sew:लु॑जिँ॑","luwa!:upaGAte pratiGAte:luw:01:0351:A:sew:लु॑टँ॒","luwa!:BAzArTaH:luw:10:0133:u:sew:लु॑टँ॑","luwa!:viloqane:luw:04:0109:pa:sew:लु॑टँ॑","luwa!:viloqane:luw:01:0850:pa:sew:लु॑टँ॑","luwa!:saMSlezaRe:luw:06:0284:pa:sew:लु॑टँ॑","luWa!:upaGAte pratiGAte:luW:01:0390:A:sew:लु॑ठँ॒","luWa!:upaGAte:luW:01:0851:pa:sew:लु॑ठँ॑","luWa!:viloqane ityeke:luW:04:0134:pa:sew:लु॑ठँ॑","luWa!:saMSlezaRe ityeke:luW:06:0110:pa:sew:लु॑ठँ॑","luqa!:viloqane ityeke:luq:01:0352:pa:sew:लु॑डँ॑","luqa!:saMSlezaRe ityanye:luq:06:0111:pa:sew:लु॑डँ॑","luRwa!:steye:luRw:10:0039:u:sew:लु॑ण्टँ॑","luwi!:steye:luRw:01:0372:pa:sew:लु॑टिँ॑","luRWa!:steye iti kecit:luRW:10:0040:u:sew:लु॑ण्ठँ॑","luWi!:steye ityeke:luRW:01:0374:pa:sew:लु॑ठिँ॑","luWi!:Alasye pratiGAte ca:luRW:01:0398:pa:sew:लु॑ठिँ॑","luWi!:gatO:luRW:01:0401:pa:sew:लु॑ठिँ॑","luqi!:steye ityapare:luRq:01:0376:pa:sew:लु॑डिँ॑","luTi!:hiMsAsaNkleSanayoH:lunT:01:0047:pa:sew:लु॑थिँ॑","lupx!:Cedane:lup:06:0167:u:aniw:लु॒पॢँ॒॑॑","lupa!:vimohane:lup:04:0150:pa:sew:लु॑पँ॑","luBa!:gArdDye gArDnye:luB:04:0153:pa:sew:लु॑भँ॑","luBa!:vimohane:luB:06:0025:pa:sew:लु॑भँ॑","lubi!:adarSane ardana ityeke:lumb:10:0159:u:sew:लु॑बिँ॑","lubi!:ardane:lumb:01:0493:pa:sew:लु॑बिँ॑","lUY:Cedane:lU:09:0016:u:sew:लू॑ञ्","lUza!:BUzAyAm:lUz:01:0771:pa:sew:लू॑षँ॑","lUza!:hiMsAyAm:lUz:10:0100:u:sew:लू॑षँ॑","lepf!:gatO:lep:01:0431:A:sew:ले॑पृँ॒","lokf!:BAzArTaH:lok:10:0307:u:sew:लो॑कृँ॑","lokf!:darSane:lok:01:0080:A:sew:लो॑कृँ॒","locf!:BAzArTaH:loc:10:0308:u:sew:लो॑चृँ॑","locf!:darSane:loc:01:0188:A:sew:लो॑चृँ॒","loqf!:unmAde:loq:01:0413:pa:sew:लो॑डृँ॑","lozwa!:saNGAte:lozw:01:0291:A:sew:लो॑ष्टँ॒","vakza!:roze saNGAta ityeke:vakz:01:0753:pa:sew:व॑क्षँ॑","vaKa!:gatyarTaH:vaK:01:0138:pa:sew:व॑खँ॑","vaki!:gatyarTaH:vaNk:01:0093:A:sew:व॑किँ॒","vaki!:kOwilye:vaNk:01:0100:A:sew:व॑किँ॒","vaKi!:gatyarTaH:vaNK:01:0139:pa:sew:व॑खिँ॑","vagi!:gatyarTaH:vaNg:01:0156:pa:sew:व॑गिँ॑","vaGi!:gatyAkzepe gatO gatyAramBe cetyapare:vaNG:01:0116:A:sew:व॑घिँ॒","vaca!:pariBAzaRe:vac:10:0058:u:sew:व॑चँ॑","vaca!:pariBAzaRe:vac:02:0380:pa:aniw:व॒चँ॑","vaja!:gatO:vaj:01:0285:pa:sew:व॑जँ॑","vaYcu!:gatyarTaH:vaYc:01:0216:pa:sew:व॑ञ्चुँ॑","vaYcu!:pralamBane:vaYc:10:0227:A:sew:व॑ञ्चुँ॒","vawa:granTe:vawa:10:0395:u:sew:व॑ट॑","vawa:viBAjane:vawa:10:0461:u:sew:व॑ट॑","vawa!:pariBAzaRe:vaw:01:0888:pa:sew:व॑टँ॑","vawa!:vezwane:vaw:01:0337:pa:sew:व॑टँ॑","vaWa!:sTOlye:vaW:01:0382:pa:sew:व॑ठँ॑","vaRa!:SabdArTaH:vaR:01:0514:pa:sew:व॑णँ॑","vawi!:viBAjane:vaRw:10:0073:u:sew:व॑टि॑","vawi!:viBAjane:vaRw:01:0377:pa:sew:व॑टिँ॑","vawi!:prakASane ityeke:vaRw:10:0464:u:sew:व॑टि॑","vaWi!:ekacaryAyAm:vaRW:01:0295:A:sew:व॑ठिँ॒","vaqi!:viBAjane ityeke:vaRq:10:0074:u:sew:व॑डिँ॑","vaqi!:viBAjane:vaRq:01:0304:A:sew:व॑डिँ॒","vada!:sandeSavacane:vad:10:0379:u:sew:व॑दँ॒॑","vada!:vyaktAyAM vAci:vad:01:1164:pa:sew:व॑दँ॑","vana!:samBaktO:van:01:0534:pa:sew:व॑नँ॑","vanu!:ca nocyate nopalaByate:van:01:0915:pa:sew:व॑नुँ॑","vanu!:yAcane mit anupasargAdvA 1947:van:08:0008:A:sew:व॑नुँ॒","vana!:Sabde:van:01:0533:pa:sew:व॑नँ॑","vadi!:aBivAdanastutyoH:vand:01:0011:A:sew:व॑दिँ॒","quvapa!:bIjasantAne Cedane'pi:vap:01:1158:u:aniw:डुव॒पँ॒॑","vaBra!:gatyarTaH:vaBr:01:0638:pa:sew:व॑भ्रँ॑","wuvama!:udgiraRe mit anupasargAdvA 1948:vam:01:0984:pa:sew:टुव॑मँ॑","vaya!:gatO:vay:01:0547:A:sew:व॑यँ॒","vara:IpsAyAm:vara:10:0390:u:sew:व॑र॑","varca!:dIptO:varc:01:0186:A:sew:व॑र्चँ॒","varRa:varRakriyAvistAraguRavacanezu bahulametannidarSanam ityeke:varRa:10:0484:u:sew:व॑र्ण॑","varRa:preraRe varRa! varRana ityeke:varRa:10:0025:u:sew:व॑र्ण॑","varDa!:CedanapUranayoH:varD:10:0156:u:sew:व॑र्धँ॑","varza!:snehane:varz:01:0697:A:sew:व॑र्षँ॒","barha!:BAzArTaH:varh:10:0175:u:sew:ब॑र्हँ॑","varha!:pariBAzaRahiMsAcCAdanezu:varh:01:0727:A:sew:व॑र्हँ॒","varha!:hiMsAyAm ityeke:varh:10:0300:u:sew:व॑र्हँ॑","vala:saMvaraRe saYcalane ca mit iti BojaH 0930:val:01:0564:A:sew:व॑ल॒","valka!:pariBAzaRe:valk:10:0054:u:sew:व॑ल्कँ॑","valga!:gatyarTaH:valg:01:0152:pa:sew:व॑ल्गँ॑","valBa!:Bojane:valB:01:0456:A:sew:व॑ल्भँ॒","valla!:saMvaraRe saYcalane ca:vall:01:0565:A:sew:व॑ल्लँ॒","balha!:BAzArTaH:valh:10:0301:u:sew:ब॑ल्हँ॑","valha!:pariBAzaRahiMsAcCAdanezu:valh:01:0728:A:sew:व॑ल्हँ॒","vaSa!:kAntO:vaS:02:0075:pa:sew:व॑शँ॑","vaza!:hiMsArTaH:vaz:01:0787:pa:sew:व॑षँ॑","vaska!:gatyarTaH:vazk:01:0106:A:sew:व॑स्कँ॒","vasa:nivAse:vasa:10:0488:u:sew:व॑स॑","vasa!:AcCAdane:vas:02:0111:A:sew:व॑सँ॒","vasa!:nivAse:vas:01:1160:pa:aniw:व॒सँ॑","vasu!:stamBe:vas:04:0273:pa:sew:व॑सुँ॑","vasa:snehacCedApaharaRezu:vasa:10:0013:u:sew:व॑स॑","vaska!:gatyarTaH:vask:01:0106:A:sew:व॑स्कँ॒","vasta!:ardane ityeke:vast:10:0205:A:sew:व॑स्तँ॒","vaha!:prApaRe:vah:01:1159:u:aniw:व॒हँ॒॑","vA:gatiganDanayoH:vA:02:0045:pa:aniw:वा॒","vAkzi!:kANkzAyAm:vANkz:01:0761:pa:sew:वा॑क्षिँ॑","vACi!:icCAyAm:vAYC:01:0236:pa:sew:वा॑छिँ॑","vAqf:AplAvye ityeke:vAq:01:0321:A:sew:वा॑डृ॒","vAta:suKasevanayoH:vAta:10:0424:u:sew:वा॑त॑","vAvftu!:varaRe vartane iti kecit:vAvft:04:0056:A:sew:वा॑वृ॑तुँ॒","vASf!:Sabde:vAS:04:0059:A:sew:वा॑शृँ॒","vAsa:upasevAyAm:vAsa:10:0426:u:sew:वा॑स॑","bAhf!:prayatne:vAh:01:0732:A:sew:बा॑हृँ॒","vici!r:pfTagBAve:vic:07:0005:u:aniw:वि॒चिँ॒॑र्","viCa!:BAzArTaH:viC:10:0159:u:sew:वि॑छँ॑","viCa!:gatO:viC:06:0304:pa:sew:वि॑छँ॑","viji!r:pfTagBAve:vij:03:0013:u:aniw:वि॒जिँ॒॑र्","o!vijI!:BayacalanayoH:vij:06:0009:A:sew:ओँ॑वि॑जीँ॒","o!vijI!:BayacalanayoH:vij:07:0023:pa:sew:ओँ॑वि॑जीँ॑","viwa!:Sabde:viw:01:0354:pa:sew:वि॑टँ॑","viTf!:yAcane:viT:01:0033:A:sew:वि॑थृँ॒","vida!:cetanAKyAnanivAsezu:vid:10:0059:A:sew:वि॑दँ॒","vida!:jYAne:vid:02:0067:pa:sew:वि॑दँ॑","vidx!:lABe:vid:06:0013:u:sew:वि॑दॢँ॒॑॑","vida!:vicAraRe:vid:07:0232:A:aniw:वि॒दँ॒","vida!:sattAyAm:vid:04:0168:A:aniw:वि॒दँ॒","viDa!:viDAne:viD:06:0050:pa:sew:वि॑धँ॑","vipa!:kzepe cetyeke:vip:10:0138:u:sew:वि॑पँ॑","vila!:kzepe:vil:10:0085:u:sew:वि॑लँ॑","vila!:saMvaraRe:vil:06:0094:pa:sew:वि॑लँ॑","viSa!:praveSane:viS:06:0160:pa:aniw:वि॒शँ॑","vizu!:secane:viz:01:0794:pa:sew:वि॑षुँ॑","viza!:viprayoge:viz:09:0062:pa:aniw:वि॒षँ॑","vizx!:vyAptO:viz:03:0014:u:aniw:वि॒षॢँ॒॑॑","vizka:darSane:vizka:10:0486:u:sew:वि॑ष्क॑","vizka:hiMsAyAm:vizka:10:0207:A:sew:वि॑ष्क॒","visa!:gatO:vis:01:0818:pa:sew:वि॑सँ॑","bisa!:preraRe ityeke:vis:04:0124:pa:sew:बि॑सँ॑","vI:gatiprajanakAntyasanaKAdanezu:vI:02:0043:pa:aniw:वी॒","vIja!:gatO:vIj:01:0209:A:sew:वी॑जँ॒","vIra:vikrAntO:vIra:10:0445:A:sew:वी॑र॒","vugi!:varjane ityeke:vuNg:01:0178:pa:sew:वु॑गिँ॑","vusa!:viBAge iti kecit:vus:04:0118:pa:sew:वु॑सँ॑","vfY:AvaraRe:vf:10:0837:u:sew:वृ॑ञ्","vfY:varaRe:vf:05:0008:u:sew:वृ॑ञ्","vfN:samBaktO:vf:09:0299:A:sew:वृ॑ङ्","bfhi!:BAzArTaH:vfMh:10:0345:u:sew:बृ॑हिँ॑","bfhi!:vfdDO bfhi! vfhi! Sabde ca:vfMh:01:0045:pa:sew:बृ॑हिँ॑","vfka!:AdAne:vfk:01:0097:A:sew:वृ॑कँ॒","vfkza!:varaRe:vfkz:01:0688:A:sew:वृ॑क्षँ॒","vfjI!:varjane:vfj:10:0022:u:sew:वृ॑जीँ॑","vfjI!:varjane:vfj:02:0024:A:sew:वृ॑जीँ॒","vfjI!:varjane:vfj:07:0344:pa:sew:वृ॑जीँ॑","vfji!:varjane ityeke:vfYj:02:0023:A:sew:वृ॑जिँ॒","vfRa!:ca prIRane:vfR:06:0056:pa:sew:वृ॑णँ॑","vftu!:BAzArTaH:vft:10:0055:u:sew:वृ॑तुँ॑","vftu!:varaRe vartane:vft:04:0312:A:sew:वृ॑तुँ॒","vftu!:vartane:vft:01:0862:A:sew:वृ॑तुँ॒","vfDu!:BAzArTAH:vfD:10:0313:u:sew:वृ॑धुँ॑","vfDu!:vfDO:vfD:01:0863:A:sew:वृ॑धुँ॒","vfSa!:varaRe:vfS:04:0139:pa:sew:वृ॑शँ॑","vfzu!:secane hiMsAsaNkleSanayoSca:vfz:01:0803:pa:sew:वृ॑षुँ॑","vfza!:SaktibanDane:vfz:10:0228:A:sew:वृ॑षँ॒","bfha!:vfdDO bfhi!r vfhi!r vfdDO Sabde ca ityeke:vfh:01:0836:pa:sew:बृ॑हँ॑","vfhU!:udyamane:vfh:06:0073:pa:sew:वृ॑हूँ॑","vFY:varaRe:vF:09:0019:u:sew:वॄ॑ञ्","vF:varaRe BaraRa ityeke:vF:09:0023:pa:sew:वॄ॑","veY:tantusantAne:ve:01:1161:u:aniw:वे॒ञ्","veRf!:gatijYAnacintAniSAmanavAditragrahaRezu:veR:01:1018:u:sew:वे॑णृँ॒॑","veTf!:yAcane:veT:01:0034:A:sew:वे॑थृँ॒","venf!:gatijYAnacintAniSAmanavAditragrahaRezu ityeke:ven:01:1019:u:sew:वे॑नृँ॒॑","wuvepf:kampane:vep:01:0425:A:sew:टुवे॑पृ॒","vela:kAlopadeSe:vela:10:0421:u:sew:वे॑ल॑","velf!:calane:vel:01:0614:pa:sew:वे॑लृँ॑","vella!:calane:vell:01:0619:pa:sew:वे॑ल्लँ॑","vevIN:vetinA tulye:vevI:02:0072:A:sew:वे॑वी॑ङ्","vezwa!:vezwane:vezw:01:0288:A:sew:वे॑ष्टँ॒","vesa!:gatO:ves:01:0819:pa:sew:वे॑सँ॑","vehf!:prayatne:veh:01:0730:A:sew:वे॑हृँ॒","vella!:calane:vehl:01:0620:pa:sew:वे॑ल्लँ॑","o!vE:SozaRe:vE:01:1070:pa:aniw:ओँ॑वै॑","vyaca!:vyAjIkaraRe:vyac:06:0013:pa:sew:व्य॑चँ॑","vyaTa!:BayasaYcalanayoH:vyaT:01:0868:A:sew:व्य॑थँ॒","vyaDa!:tAqane:vyaD:04:0078:pa:aniw:व्य॒धँ॑","vyapa!:kzepe:vyap:10:0136:u:sew:व्य॑पँ॑","vyaya:vittasamutsarge:vyaya:10:0478:u:sew:व्य॑य॑","vyaya:kzepe catyeke:vyaya:10:0137:u:sew:व्य॑य॑","vyaya!:gatO:vyay:01:1024:u:sew:व्य॑यँ॒॑","vyuza!:dAhe:vyuz:04:0114:pa:sew:व्यु॑षँ॑","vyuza!:viBAge:vyuz:04:0008:pa:sew:व्यु॑षँ॑","vyusa!:viBAge ityeke:vyus:04:0276:pa:sew:व्यु॑सँ॑","vyusa!:hasane sahane cetyeke ityeke:vyus:10:0115:u:sew:व्यु॑सँ॑","vyeY:saMvaraRe:vye:01:1162:u:aniw:व्ये॒ञ्","vraja!:gatO:vraj:01:0247:pa:sew:व्र॑जँ॑","vraja!:gatO:vraj:01:0286:pa:sew:व्र॑जँ॑","vraja!:mArgasaMskAragatyoH:vraj:10:0109:u:sew:व्र॑जँ॑","vraji!:gatO:vraYj:01:0248:pa:sew:व्र॑जिँ॑","vraRa:gAtravicUrRane:vraRa:10:0483:u:sew:व्र॑ण॑","vraRa!:SabdArTaH:vraR:01:0519:pa:sew:व्र॑णँ॑","o!vraScU!:Cedane:vraSc:06:0012:pa:sew:ओँ॑व्र॑श्चूँ॑","vrI:varaRe:vrI:09:0040:pa:aniw:व्री॒","vrIN:vfRotyarTe!:vrI:04:0035:A:aniw:व्री॒ङ्","vrIqa!:codane lajjAyAM ca:vrIq:04:0021:pa:sew:व्री॑डँ॑","vruqa!:saMvaraRe:vruq:06:0127:pa:sew:व्रु॑डँ॑","vrUza!:hiMsAyAm ityanye:vrUz:10:0176:u:sew:व्रू॑षँ॑","vrUsa!:hiMsAyAm ityeke:vrUs:10:0174:u:sew:व्रू॑सँ॑","vlI:varaRe:vlI:09:0037:pa:aniw:व्ली॒","SaMsu!:stutO durgatAvapItyeke iti durgaH:SaMs:01:0829:pa:sew:शं॑सुँ॑","Saka!:viBAzito marzaRe:Sak:04:0084:u:aniw:श॒कँ॒॑","Sakx!:SaktO:Sak:05:0017:pa:aniw:श॒कॢँ॑","Saki!:SaNkAyAm:SaNk:01:0091:A:sew:श॑किँ॒","Saca!:vyaktAyAM vAci:Sac:01:0189:A:sew:श॑चँ॒","Sawa!:rujAviSaraRagatyavasAdanezu:Saw:01:0336:pa:sew:श॑टँ॑","SaWa:samyagavaBAzaRe:SaWa:10:0392:u:sew:श॑ठ॑","SaWa:asaMskAragatyoH:SaWa:10:0041:u:sew:श॑ठ॑","SaWa!:hiMsAsaNkleSanayoH kEtave ca:SaW:01:0394:pa:sew:श॑ठँ॑","SaWa:SlAGAyAm:SaWa:10:0214:A:sew:श॑ठ॒","SaRa!:gatO dAne ca SaRa! gatAvityanye:SaR:01:0906:pa:sew:श॑णँ॑","Saqi!:rujAyAM saNGAte ca:SaRq:01:0313:A:sew:श॑डिँ॒","Sadx!:SAtane:Sad:06:0164:pa:aniw:श॒दॢँ॑","Sadx!:SAtane:Sad:01:0991:pa:aniw:श॒दॢँ॑","Sapa!:AkroSe:Sap:04:0064:u:aniw:श॒पँ॒॑","Sapa!:AkroSe:Sap:01:1155:u:aniw:श॒पँ॒॑","Sabda!:BAzaRe SabdakriyAyAm upasargAdAvizkAre ca:Sabd:10:0239:u:sew:श॑ब्दँ॑","Sama!:Alocane Samo darSane na mit 1952:Sam:10:0098:A:sew:श॑मँ॒","Samu!:upaSame:Sam:04:0218:pa:sew:श॑मुँ॑","Samba!:sambanDane ca:Samb:10:0031:u:sew:श॑म्बँ॑","Sarba!:gatO:Sarb:01:0489:pa:sew:श॑र्बँ॑","Sarva!:hiMsAyAm:Sarv:01:0668:pa:sew:श॑र्वँ॑","Sala!:gatO:Sal:01:0977:pa:sew:श॑लँ॑","Sala!:calanasaMvaraRayoH:Sal:01:0563:A:sew:श॑लँ॒","SalBa!:katTane:SalB:01:0455:A:sew:श॑ल्भँ॒","Sava!:gatO:Sav:01:0826:pa:sew:श॑वँ॑","SaSa!:plutagatO:SaS:01:0827:pa:sew:श॑शँ॑","Saza!:hiMsArTaH:Saz:01:0786:pa:sew:श॑षँ॑","Sasu!:hiMsAyAm:Sas:01:0828:pa:sew:श॑सुँ॑","SAKf!:vyAptO:SAK:01:0134:pa:sew:शा॑खृँ॑","SAqf!:SlAGAyAm:SAq:01:0324:A:sew:शा॑डृँ॒","SAna!:tejane avatejane:SAn:01:1150:u:sew:शा॑नँ॒॑","SAntva!:sAmaprayoge ityeke:SAntv:10:0052:u:sew:शा॑न्त्वँ॑","SAsu!:anuSizwO:SAs:02:0070:pa:sew:शा॑सुँ॑","SiY:niSAne:Si:05:0003:u:aniw:शि॒ञ्","Sikza!:vidyopAdAne:Sikz:01:0689:A:sew:शि॑क्षँ॒","SiKi!:gatyarTaH ityapi kecit:SiNK:01:0174:pa:sew:शि॑खिँ॑","SiGi!:AGrARe:SiNG:01:0184:pa:sew:शि॑घिँ॑","Siji!:avyakte Sabde:SiYj:02:0019:A:sew:शि॑जिँ॒","Siwa!:anAdare:Siw:01:0340:pa:sew:शि॑टँ॑","Sila!:uYCe:Sil:06:0089:pa:sew:शि॑लँ॑","Siza!:hiMsArTaH:Siz:01:0783:pa:sew:शि॑षँ॑","Siza!:asarvopayoge:Siz:10:0014:u:sew:शि॑षँ॑","Sizx!:viSezaRe:Siz:07:0349:pa:aniw:शि॒षॢँ॑","SIN:svapne:SI:02:0026:A:sew:शी॑ङ्","SIka!:BAzArTaH ca:SIk:10:0363:u:sew:शी॑कँ॑","SIka!:AmarzaRe:SIk:10:0320:u:sew:शी॑कँ॑","SIkf!:secane:SIk:01:0078:A:sew:शी॑कृँ॒","SIBf!:katTane ca:SIB:01:0444:A:sew:शी॑भृँ॒","SIla:upaDAraRe:SIla:10:0419:u:sew:शी॑ल॑","SIla!:samADO:SIl:01:0601:pa:sew:शी॑लँ॑","Suka!:gatO:Suk:01:0127:pa:sew:शु॑कँ॑","I!Suci!r:pUtIBAve:Suc:04:0061:u:sew:ईँ॑शु॑चिँ॒॑र्","Suca!:Soke:Suc:01:0210:pa:sew:शु॑चँ॑","Sucya!:aBizave:Sucy:01:0590:pa:sew:शु॑च्यँ॑","SuWa!:Alasye:SuW:10:0146:u:sew:शु॑ठँ॑","SuWa!:gatipratiGAte pratiGAte:SuW:01:0395:pa:sew:शु॑ठँ॑","SuWi!:gatipratiGAte pratiGAte ityeke:SuRW:01:0396:pa:sew:शु॑ठिँ॑","SuWi!:SozaRe:SuRW:10:0147:u:sew:शु॑ठिँ॑","SuWi!:SozaRe:SuRW:01:0399:pa:sew:शु॑ठिँ॑","SuDa!:SOce:SuD:04:0088:pa:aniw:शु॒धँ॑","Suna!:gatO:Sun:06:0062:pa:sew:शु॑नँ॑","SunDa!:SudDO:SunD:01:0077:pa:sew:शु॑न्धँ॑","SunDa!:SOcakarmaRi:SunD:10:0369:u:sew:शु॑न्धँ॑","SuBa!:BAzane BAsana ityeke hiMsAyAmityanye:SuB:01:0853:pa:sew:शु॑भँ॑","SuBa!:SoBArTe:SuB:06:0046:pa:sew:शु॑भँ॑","SuBa!:dIptO:SuB:01:0500:A:sew:शु॑भँ॒","SumBa!:BAzane BAsana ityeke hiMsAyAmityanye:SumB:01:0501:pa:sew:शु॑म्भँ॑","SumBa!:SoBArTe:SumB:06:0047:pa:sew:शु॑म्भँ॑","Sulka!:atisarjane atisparSane:Sulk:10:0110:u:sew:शु॑ल्कँ॑","Sulba!:mAne:Sulb:10:0101:u:sew:शु॑ल्बँ॑","Suza!:SozaRe:Suz:04:0080:pa:aniw:शु॒षँ॑","SUra:vikrAntO:SUra:10:0444:A:sew:शू॑र॒","SUrI!:hiMsAstamBanayoH hiMsastamBayoH:SUr:04:0052:A:sew:शू॑रीँ॒","SUrpa!:ca mAne:SUrp:10:0102:u:sew:शू॑र्पँ॑","SUla!:rujAyAM saNGAte ca:SUl:01:0604:pa:sew:शू॑लँ॑","SUza!:prasave:SUz:01:0773:pa:sew:शू॑षँ॑","SfDu!:undane:SfD:01:0864:u:sew:शृ॑धुँ॒॑","SfDu!:prasahane:SfD:10:0260:u:sew:शृ॑धुँ॑","SfDu!:SabdakutsAyAm:SfD:01:1014:A:sew:शृ॑धुँ॒","SF:hiMsAyAm:SF:09:0021:pa:sew:शॄ॑","Self!:gatO:Sel:01:0623:pa:sew:शे॑लृँ॑","Sevf!:sevane ityapyeke:Sev:01:0580:A:sew:शे॑वृँ॒","SE:pAke:SE:01:1066:pa:aniw:शै॒","So:tanUkaraRe:So:04:0040:pa:aniw:शो॒","SoRf!:varRagatyoH:SoR:01:0524:pa:sew:शो॑णृँ॑","SOwf!:garve:SOw:01:0325:pa:sew:शौ॑टृँ॑","Scuti!r:Asecane ityeke:Scut:01:0041:pa:sew:श्चु॑तिँ॑र्","Scyuti!r:kzaraRe:Scyut:01:0042:pa:sew:श्च्यु॑तिँ॑र्","SnaTa!:hiMsArTaH:SnaT:01:0909:pa:sew:श्न॑थँ॑","SmIla!:nimezaRe:SmIl:01:0596:pa:sew:श्मी॑लँ॑","syandU!:prasravaRe:Syand:01:0865:A:sew:स्य॑न्दूँ॒","cyuN:gatO:Syu:01:1108:A:aniw:च्यु॒ङ्","SyEN:gatO:SyE:01:1118:A:aniw:श्यै॒ङ्","sraMsu!:avasraMsane:SraMS:01:0857:A:sew:स्रं॑सुँ॒","sraMsu!:avasraMsane:SraMs:01:0857:A:sew:स्रं॑सुँ॒","Sraki!:gatO:SraNk:01:0089:A:sew:श्र॑किँ॒","Sragi!:gatyarTaH:SraNg:01:0161:pa:sew:श्र॑गिँ॑","SraRa!:gatO dAne ca:SraR:01:0907:pa:sew:श्र॑णँ॑","SraRa!:dAne:SraR:10:0063:u:sew:श्र॑णँ॑","SraTa:dOrbalye:SraTa:10:0409:u:sew:श्र॑थ॑","SraTa!:hiMsArTaH:SraT:01:0908:pa:sew:श्र॑थँ॑","SraTa:prayatne prasTAna ityeke:SraTa:10:0019:u:sew:श्र॑थ॑","SraTa:mokzaRe hiMsAyAmityeke:SraTa:10:0360:u:sew:श्र॑थ॑","SranTa!:sandarBe:SranT:10:0046:u:sew:श्र॑न्थँ॑","SranTa!:sandarBe:SranT:09:0374:pa:sew:श्र॑न्थँ॑","SranTa!:vimocanapratiharzayoH:SranT:09:0048:pa:sew:श्र॑न्थँ॑","SraTi!:SETilye:SranT:01:0035:A:sew:श्र॑थिँ॒","Sramu!:tapasi Kede ca:Sram:04:0101:pa:sew:श्र॑मुँ॑","SramBu!:pramAde:SramB:01:0458:A:sew:श्र॑म्भुँ॒","SrA:pAke:SrA:02:0048:pa:aniw:श्रा॒","SrA:pAke:SrA:01:0922:pa:sew:श्रा॑","SriY:sevAyAm:Sri:01:1044:u:sew:श्रि॑ञ्","Srizu!:dAhe:Sriz:01:0798:pa:sew:श्रि॑षुँ॑","SrIY:pAke:SrI:09:0003:u:aniw:श्री॒ञ्","Sru:SravaRe:Sru:01:1092:pa:aniw:श्रु॒","SrE:pAke:SrE:01:1067:pa:aniw:श्रै॒","SroRf!:saNGAte:SroR:01:0525:pa:sew:श्रो॑णृँ॑","Slaki!:gatO gatyarTaH:SlaNk:01:0090:A:sew:श्ल॑किँ॒","Slagi!:gatyarTaH:SlaNg:01:0162:pa:sew:श्ल॑गिँ॑","SlaTa!:hiMsArTaH:SlaT:01:0910:pa:sew:श्ल॑थँ॑","SlAKf!:vyAptO:SlAK:01:0135:pa:sew:श्ला॑खृँ॑","SlAGf!:katTane:SlAG:01:0122:A:sew:श्ला॑घृँ॒","Slizu!:dAhe:Sliz:01:0799:pa:sew:श्लि॑षुँ॑","Sliza!:AliNgane:Sliz:04:0059:pa:aniw:श्लि॒षँ॑","Sliza!:SlezaRe:Sliz:10:0083:u:sew:श्लि॑षँ॑","Slokf!:saNGAte:Slok:01:0081:A:sew:श्लो॑कृँ॒","SloRf!:ca saNGAte:SloR:01:0526:pa:sew:श्लो॑णृँ॑","Svaki!:gatyarTaH:SvaNk:01:0101:A:sew:श्व॑किँ॒","Sragi!:gatyarTaH:SvaNg:01:0161:pa:sew:श्र॑गिँ॑","Svaca!:gatO:Svac:01:0190:A:sew:श्व॑चँ॒","Svaci!:gatO:SvaYc:01:0191:A:sew:श्व॑चिँ॒","SvaWa:samyagavaBAzaRe:SvaWa:10:0393:u:sew:श्व॑ठ॑","SvaWa:asaMskAragatyoH:SvaWa:10:0042:u:sew:श्व॑ठ॑","SvaWi!:asaMskAragatyoH ityeke:SvaRW:10:0043:u:sew:श्व॑ठिँ॑","SvaBra!:gatyAm ca:SvaBr:10:0117:u:sew:श्व॑भ्रँ॑","Svarta!:gatyAm:Svart:10:0115:u:sew:श्व॑र्तँ॑","Svala!:ASugamane:Sval:01:0630:pa:sew:श्व॑लँ॑","Svalka!:pariBAzaRe:Svalk:10:0053:u:sew:श्व॑ल्कँ॑","Svalla!:ASugamane:Svall:01:0631:pa:sew:श्व॑ल्लँ॑","Svasa!:prARane:Svas:02:0064:pa:sew:श्व॑सँ॑","wuo!Svi:gativfdDyoH:Svi:01:1165:pa:sew:टुओँश्वि॑","SvitA!:varRe:Svit:01:0843:A:sew:श्वि॑ताँ॑","Svidi!:SvEtye:Svind:01:0010:A:sew:श्वि॑दिँ॒","zwyE:SabdasaNGAtayoH:zwyE:01:1059:pa:aniw:ष्ट्यै॒","zWivu!:nirasane:zWiv:01:0641:pa:sew:ष्ठि॑वुँ॑","zWivu!:nirasane kecidihemaM na paWanti:zWiv:04:0004:pa:sew:ष्ठि॑वुँ॑","zvaska!:gatyarTaH:zvazk:01:0105:A:sew:ष्व॑स्कँ॒","zvaska!:gatyarTaH:zvask:01:0105:A:sew:ष्व॑स्कँ॒","zasti!:svapne:saMst:02:0074:pa:sew:ष॑स्तिँ॑","zage!:saMvaraRe:sag:01:0898:pa:sew:ष॑गेँ॑","saNketa!:AmantraRe:saNket:10:0433:u:sew:स॑ङ्के॑तँ॑","saNgrAma:yudDe ayamanudAttet:saNgrAma:10:0467:A:sew:स॑ङ्ग्रा॑म॒","zaca!:samavAye:sac:01:0187:u:sew:ष॑चँ॒॑","zaca!:secane sevane ca:sac:01:1152:A:sew:ष॑चँ॒","zasja!:gatO:sajj:01:0229:pa:sew:ष॑स्जँ॑","zaYja!:saNge:saYj:01:1142:pa:aniw:ष॒ञ्जँ॑","zawa!:avayave:saw:01:0350:pa:sew:ष॑टँ॑","zawwa!:hiMsAyAm:saww:10:0128:u:sew:ष॑ट्टँ॑","satra:santAnakriyAyAm:sattra:10:0448:A:sew:स॑त्र॒","satra:santAnakriyAyAm:satra:10:0448:A:sew:स॑त्र॒","zadx!:viSaraRagatyavasAdanezu:sad:06:0163:pa:aniw:ष॒दॢँ॑","zadx!:viSaraRagatyavasAdanezu:sad:01:0990:pa:aniw:ष॒दॢँ॑","zaGa!:hiMsAyAm:saD:05:0024:pa:sew:ष॑घँ॑","zanu!:dAne:san:08:0002:u:sew:ष॑नुँ॒॑","zana!:samBaktO:san:01:0535:pa:sew:ष॑नँ॑","zapa!:samavAye:sap:01:0466:pa:sew:ष॑पँ॑","saBAja:prItidarSanayoH prItisevanayorityeke:samAja:10:0429:u:sew:स॑भा॑ज॑","zama!:avEkalye vEkalye:sam:01:0963:pa:sew:ष॑मँ॑","samI!:parimAne ityeke:sam:04:0132:pa:sew:स॑मीँ॑","zamba!:sambanDane:samb:10:0030:u:sew:ष॑म्बँ॑","sAra:dOrbalye:sara:10:0407:u:sew:सा॑र॑","zarkza!:Adare iti kecit:sarkz:01:0759:pa:sew:ष॑र्क्षँ॑","zarja!:arjane:sarj:01:0257:pa:sew:ष॑र्जँ॑","zarba!:gatO:sarb:01:0490:pa:sew:ष॑र्बँ॑","zarva!:hiMsAyAm:sarv:01:0669:pa:sew:ष॑र्वँ॑","zala!:gatO:sal:01:0628:pa:sew:ष॑लँ॑","zasa!:svapne:sas:02:0073:pa:sew:ष॑सँ॑","zasja!:gatO:sasj:01:0229:pa:sew:ष॑स्जँ॑","zaha!:cakyarTe:sah:04:0341:pa:sew:ष॑हँ॑","zaha!:marzaRe:sah:10:0023:u:sew:ष॑हँ॑","zaha!:marzaRe:sah:01:0988:A:sew:ष॑हँ॒","sADa!:saMsidDO:sAD:05:0019:pa:aniw:सा॒धँ॑","zAntva!:sAmaprayoge:sAntv:10:0051:u:sew:षा॑न्त्वँ॑","sAma:sAntvaprayoge:sAma:10:0420:u:sew:सा॑म॑","sAmba!:sambanDane ityeke:sAmb:10:0032:u:sew:सा॑म्बँ॑","sAra:dOrbalye:sAra:10:0407:u:sew:सा॑र॑","ziY:banDane:si:05:0002:u:aniw:षि॒ञ्","ziY:banDane:si:09:0005:u:aniw:षि॒ञ्","zica!:kzaraRe:sic:06:0170:u:aniw:षि॒चँ॒॑","ziwa!:anAdare:siw:01:0341:pa:sew:षि॑टँ॑","ziDa!:gatyAm:siD:01:0049:pa:sew:षि॑धँ॑","ziDU!:SAstre mANgalye ca:siD:01:0050:pa:sew:षि॑धूँ॑","ziDu!:saMrAdDO:siD:04:0089:pa:aniw:षि॒धुँ॑","zivi!:secane ityeke sevana iti taraNgiRyAm:sinv:01:0674:pa:sew:षि॑विँ॑","ziBu!:hiMsArTaH ityeke:siB:01:0498:pa:sew:षि॑भुँ॑","zimBu!:hiMsArTaH ityeke:simB:01:0499:pa:sew:षि॑म्भुँ॑","zila!:uYCe:sil:06:0090:pa:sew:षि॑लँ॑","zivu!:tantusantAne:siv:04:0002:pa:sew:षि॑वुँ॑","sIkf!:secane ityeke:sIk:01:0079:A:sew:सी॑कृँ॒","zuY:aBizave:su:05:0001:u:aniw:षु॒ञ्","zu:prasavasESvaryayoH:su:01:1091:pa:aniw:षु॒","zu:prasavESvaryayoH:su:02:0036:pa:aniw:षु॒","suKa:tatkriyAyAm:suKa:10:0475:u:sew:सु॑ख॑","zuwwa!:anAdare:suww:10:0038:u:sew:षु॑ट्टँ॑","zura!:ESvaryadIptyoH:sur:06:0066:pa:sew:षु॑रँ॑","zuha!:cakyarTe:suh:04:0024:pa:sew:षु॑हँ॑","zUN:prARigarBavimocane:sU:02:0025:A:sew:षू॑ङ्","zUN:prARiprasave:sU:04:0027:A:sew:षू॑ङ्","zU:preraRe:sU:06:0144:pa:sew:षू॑","sUca:pESunye:sUca:10:0412:u:sew:सू॑च॑","sUtra:vezwane vimocana ityanye:sUtra:10:0450:u:sew:सू॑त्र॑","zUda!:kzaraRe:sUd:01:0025:A:sew:षू॑दँ॒","zUda!:kzaraRe:sUd:10:0242:u:sew:षू॑दँ॑","sUrkza!:Adare:sUrkz:01:0758:pa:sew:सू॑र्क्षँ॑","zUrkzya!:IrzyArTaH:sUrkzy:01:0586:pa:sew:षू॑र्क्ष्यँ॑","sUza!:prasave ityeke:sUz:01:0774:pa:sew:सू॑षँ॑","sf:gatO:sf:03:0018:pa:aniw:सृ॒","sf:gatO:sf:01:1085:pa:aniw:सृ॒","sfja!:visarge:sfj:04:0075:A:aniw:सृ॒जँ॒","sfja!:visarge:sfj:06:0150:pa:aniw:सृ॒जँ॑","sfpx!:gatO:sfp:01:1138:pa:aniw:सृ॒पॢँ॑","zfBu!:hiMsArTaH:sfB:01:0496:pa:sew:षृ॑भुँ॑","zfmBu!:hiMsArTO:sfmB:01:0497:pa:sew:षृ॑म्भुँ॑","sekf!:gatO:sek:01:0086:A:sew:से॑कृँ॒","zelf!:gatO ityeke:sel:01:0624:pa:sew:षे॑लृँ॑","zevf!:sevane:sev:01:0574:A:sew:षे॑वृँ॒","zE:kzaye:sE:01:1063:pa:aniw:षै॒","zo:antakarmaRi:so:04:0042:pa:aniw:षो॒","skandi!r:gatiSozaRayoH:skand:01:1134:pa:aniw:स्क॒न्दिँ॑र्","skamBu!:roDana ityeke stamBa iti mADavaH:skamB:09:0009:pa:aniw:स्क॒म्भुँ॑","skaBi!:pratibanDe:skamB:01:0452:A:sew:स्क॑भिँ॒","skuY:Apravane:sku:09:0006:u:aniw:स्कु॒ञ्","skudi!:ApravaRe:skund:01:0009:A:sew:स्कु॑दिँ॒","skumBu!:roDana ityeke DAraRa ityanye:skumB:09:0010:pa:aniw:स्कु॒म्भुँ॑","sKada!:sKadane sKadir avapariByAM ca na mit 1954:sKad:01:0872:A:sew:स्ख॑दँ॒","sKala!:saYcalane mit iti BojaH 0931:sKal:01:0625:pa:sew:स्ख॑लँ॑","zwaka!:pratiGAte pratIGAte:stak:01:0891:pa:sew:ष्ट॑कँ॑","stana:devaSabde:stana:10:0398:u:sew:स्त॑न॑","zwana!:Sabde:stan:01:0532:pa:sew:ष्ट॑नँ॑","zwama!:avEkalye vEkalye:stam:01:0964:pa:sew:ष्ट॑मँ॑","zwaBi!:pratibanDe:stamB:01:0451:A:sew:ष्ट॑भिँ॒","stamBu!:roDana ityeke stamBa iti mADavaH:stamB:09:0007:pa:aniw:स्त॒म्भुँ॑","zWala!:sTAne:stal:01:0970:pa:sew:ष्ठ॑लँ॑","zwiGa!:Askandane:stiG:05:0021:A:sew:ष्टि॑घँ॒","zwipf!:kzaraRArTaH:stip:01:0422:A:sew:ष्टि॑पृँ॒","zwima!:ArdrIBAve:stim:04:0019:pa:sew:ष्टि॑मँ॑","zwIma!:ArdrIBAve:stIn:04:0020:pa:sew:ष्टी॑मँ॑","zwuY:stutO:stu:02:0038:u:aniw:ष्टु॒ञ्","zwuca!:prasAde:stuc:01:0199:A:sew:ष्टु॑चँ॒","zwupa!:zwUpa! samucCrAye:stup:10:0151:u:sew:ष्टु॑पँ॑","zwupa!:samucCrAye:stup:04:0190:pa:sew:ष्टु॑पँ॑","zwuBu!:stamBe:stuB:01:0460:A:sew:ष्टु॑भुँ॒","stumBu!:roDana ityeke nizkozaRe ityanye:stumB:09:0008:pa:aniw:स्तु॒म्भुँ॑","zwUpa!:samucCrAye ityeke:stUp:10:0152:u:sew:ष्टू॑पँ॑","zwUpa!:samucCrAye ityeke:stUp:04:0191:pa:sew:ष्टू॑पँ॑","stfY:AcCAdane:stf:05:0006:u:aniw:स्तृ॒ञ्","zwfkza!:gatO:stfkz:01:0751:pa:sew:ष्टृ॑क्षँ॑","stfhU!:hiMsArTaH:stfh:06:0076:pa:sew:स्तृ॑हूँ॑","stFY:AcCAdane:stF:09:0017:u:sew:स्तॄ॑ञ्","stena:cOrye:stena:10:0439:u:sew:स्ते॑न॑","zwepf!:kzaraRArTaH:step:01:0423:A:sew:ष्टे॑पृँ॒","zwE:vezwane SoBAyAM cetyeke:stE:01:1071:pa:aniw:ष्टै॒","stoma!:SlAGAyAm:stom:10:0468:u:sew:स्तो॑मँ॑","styE:SabdasaNGAtayoH:styE:01:1058:pa:aniw:स्त्यै॒","zwrakza!:gatO:strakz:01:0749:pa:sew:ष्ट्र॑क्षँ॑","zWage!:saMvaraRe:sTag:01:0899:pa:sew:ष्ठ॑गेँ॑","zWA:gatinivfttO:sTA:01:1077:pa:aniw:ष्ठा॒","sTuqa!:saMvaraRe:sTuq:06:0118:pa:sew:स्थु॑डँ॑","sTUla:paribfMhaRe:sTUla:10:0446:A:sew:स्थू॑ल॒","zRasu!:nirasane:snas:04:0006:pa:sew:ष्ण॑सुँ॑","zRA:SOce mit anupasargAdvA 1946:snA:02:0047:pa:aniw:ष्णा॒","zRiha!:prItO:snih:04:0055:pa:aniw:ष्णि॒हँ॑","zRiha!:snehane:snih:10:0097:u:sew:ष्णि॑हँ॑","zRu:prasravaRe:snu:02:0033:pa:sew:ष्णु॑","zRusu!:adane! AdAna ityeke! adarSana ityapare:snus:04:0005:pa:sew:ष्णु॑सुँ॑","zRuha!:udgiraRe:snuh:04:0096:pa:aniw:ष्णु॒हँ॑","zRE:vezwane SoBAyAM cetyeke:snE:01:1072:pa:aniw:ष्णै॒","spadi!:kiYciccalane:spand:01:0014:A:sew:स्प॑दिँ॒","sparDa!:saNGarze:sparD:01:0003:A:sew:स्प॑र्धँ॒","spaSa!:grahaRasaMSlezaRayoH:spaS:10:0200:A:sew:स्प॑शँ॒","spaSa!:bADanasparSanayoH:spaS:01:1032:u:sew:स्प॑शँ॒॑","spf:prItipAlanayoH prIticalanayorityanye:spf:05:0014:pa:aniw:स्पृ॒","spfSa!:saMsparSane:spfS:06:0158:pa:aniw:स्पृ॒शँ॑","spfha:IpsAyAm:spfha:10:0410:u:sew:स्पृ॑ह॑","sPara!:saYcalane ityanye:sPar:06:0123:pa:sew:स्फ॑रँ॑","sPala!:saYcalane ityanye:sPal:06:0124:pa:sew:स्फ॑लँ॑","sPAyI!:vfdDO:sPAy:01:0560:A:sew:स्फा॑यीँ॒","sPiwa!:snehane ityeke:sPiw:10:0129:u:sew:स्फि॑टँ॑","sPiwwa!:hiMsAyAm:sPiw:10:0056:u:sew:स्फि॑ट्टँ॑","sPuwa!:Bedane:sPuw:10:0100:u:sew:स्फु॑टँ॑","sPuwa!:vikasane:sPuw:06:0247:pa:sew:स्फु॑टँ॑","sPuwa!:vikasane:sPuw:01:0293:A:sew:स्फु॑टँ॒","sPuwi!r:viSaraRe:sPuw:01:0379:pa:sew:स्फु॑टिँ॑र्","sPuqa!:saMvaraRe:sPuq:06:0125:pa:sew:स्फु॑डँ॑","sPuwi!:viSaraRe ityapi kecit:sPuRw:01:0380:pa:sew:स्फु॑टिँ॑","sPuwi!:ityapi parihAse:sPuRw:10:0005:u:sew:स्फु॑टिँ॑","sPuqi!:parihAse:sPuRq:10:0004:u:sew:स्फु॑डिँ॑","sPuqi!:vikasane:sPuRq:01:0311:A:sew:स्फु॑डिँ॒","sPura!:saYcalane sPura! sPuraRa ityeke:sPur:06:0121:pa:sew:स्फु॑रँ॑","sPurCA!:vistftO:sPurC:01:0241:pa:sew:स्फु॑र्छाँ॑","sPula!:saYcalane:sPul:06:0122:pa:sew:स्फु॑लँ॑","wuo!sPUrjA!:vajranirGoze:sPUrj:01:0268:pa:sew:टुओँस्फू॑र्जाँ॑","zmiN:anAdare ityeke:smi:10:0058:u:sew:ष्मि॑ङ्","zmiN:IzadDasane:smi:01:1099:A:aniw:ष्मि॒ङ्","smiwa!:anAdare:smiw:10:0057:u:sew:स्मि॑टँ॑","smIla!:nimezaRe:smIl:01:0597:pa:sew:स्मी॑लँ॑","smf:prItipAlanayoH prIticalanayorityanye ityeke:smf:05:0015:pa:aniw:स्मृ॒","smf:ADyAne:smf:01:0919:pa:sew:स्मृ॑","smf:cintAyAm:smf:01:1082:pa:aniw:स्मृ॒","syamu!:Sabde:syam:01:0960:pa:sew:स्य॑मुँ॑","syama!:vitarke:syam:10:0216:A:sew:स्य॑मँ॒","sraMsu!:avasraMsane:sraMs:01:0857:A:sew:स्रं॑सुँ॒","sraki!:gatO:sraNk:01:0088:A:sew:स्र॑किँ॒","sramBu!:pramAde ityeke:sramB:01:0459:A:sew:स्र॑म्भुँ॒","sramBu!:viSvAse:sramB:01:0861:A:sew:स्र॑म्भुँ॒","srivu!:gatiSozaRayoH:sriv:04:0003:pa:sew:स्रि॑वुँ॑","sru:gatO:sru:01:1090:pa:aniw:स्रु॒","srekf!:gatO:srek:01:0087:A:sew:स्रे॑कृँ॒","srE:pAke iti kezucitpAWaH:srE:01:1068:pa:aniw:स्रै॒","srokf!:saNGAte iti pAWAntaram:srok:01:0082:A:sew:स्रो॑कृँ॒","zvaki!:gatyarTaH ityeke:svaNk:01:0114:A:sew:ष्व॑किँ॒","Sragi!:gatyarTaH:svaNg:01:0161:pa:sew:श्र॑गिँ॑","zvaYja!:parizvaNge:svaYj:01:1131:A:aniw:ष्व॒ञ्जँ॒","zvada!:AsvAdane:svad:01:0018:A:sew:ष्व॑दँ॒","zvada!:AsvAdane:svad:10:0336:u:sew:ष्व॑दँ॑","svana!:Sabde:svan:01:0961:pa:sew:स्व॑नँ॑","svana!:avataMsane mit:svan:01:0936:pa:sew:स्व॑नँ॑","Yizvapa!:Saye:svap:02:0063:pa:aniw:ञिष्व॒पँ॑","svara:Akzepe:svara:10:0402:u:sew:स्व॑र॑","svarta!:gatyAm ityeke:svart:10:0116:u:sew:स्व॑र्तँ॑","svarda!:AsvAdane:svard:01:0019:A:sew:स्व॑र्दँ॒","zvaska!:gatyarTaH:svazk:01:0105:A:sew:ष्व॑स्कँ॒","zvaska!:gatyarTaH:svask:01:0105:A:sew:ष्व॑स्कँ॒","svAda!:AsvAdane ityeke:svAd:10:0337:u:sew:स्वा॑दँ॑","svAda!:AsvAdane:svAd:01:0028:A:sew:स्वा॑दँ॒","zvidA!:gAtraprakzaraRe YizvidA! ityeke:svid:04:0085:pa:aniw:ष्वि॒दाँ॑","YizvidA!:snehanamocanayoH gAtraprasravaRe snehanamohanayorityeke:svid:01:0845:A:sew:ञिष्वि॑दाँ॒","svf:SabdopatApayoH:svf:01:1081:pa:aniw:स्वृ॒","hawa!:SabdasaNGAtayoH dIptO ca:haw:01:0349:pa:sew:ह॑टँ॑","haWa!:plutiSaWatvayoH balAtkAra ityanye:haW:01:0388:pa:sew:ह॑ठँ॑","hada!:purIzotsarge:had:01:1132:A:aniw:ह॒दँ॒","hana!:hiMsAgatyoH:han:02:0002:pa:aniw:ह॒नँ॑","hamma!:gatO:hamm:01:0538:pa:sew:ह॑म्मँ॑","harya!:gatikAntyoH:hay:01:0592:pa:sew:ह॑र्यँ॑","haya!:gatO:hay:01:0589:pa:sew:ह॑यँ॑","hala!:vileKane:hal:01:0971:pa:sew:ह॑लँ॑","hase!:hasane:has:01:0822:pa:sew:ह॑सेँ॑","hasta!:ardane ityanye:hast:10:0206:A:sew:ह॑स्तँ॒","o!hAN:gatO:hA:03:0008:A:aniw:ओँ॑हा॒ङ्","o!hAk:tyAge:hA:03:0009:pa:aniw:ओँ॑हा॒क्","hi:gatO vfdDO ca:hi:05:0019:pa:aniw:हि॒","hisi!:hiMsAyAm:hiMs:10:0012:u:sew:हि॑सिँ॑","hisi!:hiMsAyAm:hiMs:07:0366:pa:sew:हि॑सिँ॑","hikka!:avyakte Sabde:hikk:01:0997:u:sew:हि॑क्कँ॒॑","hiwa!:AkroSe ityeke:hiw:01:0356:pa:sew:हि॑टँ॑","hiqi!:gatyanAdarayoH:hiRq:01:0301:A:sew:हि॑डिँ॒","hivi!:prIRanArTaH:hinv:01:0675:pa:sew:हि॑विँ॑","hila!:BAvakaraRe:hil:06:0088:pa:sew:हि॑लँ॑","hizka!:hiMsAyAm ityeke:hizk:10:0208:A:sew:हि॑ष्कँ॒","hu:dAnAdanayoH AdAne cetyeke prIRane'pIti BAzyam:hu:03:0001:pa:aniw:हु॒","huqf!:gatO:huq:01:0408:pa:sew:हु॑डृँ॑","huqa!:saNGAte:huq:06:0130:pa:sew:हु॑डँ॑","huqi!:varaRe haraRa ityeke:huRq:01:0302:A:sew:हु॑डिँ॒","huqi!:saNGAte:huRq:01:0310:A:sew:हु॑डिँ॒","hurCA!:kOwilye:hurC:01:0239:pa:sew:हु॑र्छाँ॑","hula!:gatO:hul:01:0980:pa:sew:हु॑लँ॑","hula!:hiMsAsaMvaraRayoSca hiMsAyAM saMvaraRe ca:hul:01:0978:pa:sew:हु॑लँ॑","hUqf!:gatO:hUq:01:0409:pa:sew:हू॑डृँ॑","hf:prasahyakaraRe:hf:03:0016:pa:aniw:हृ॒","hfY:haraRe:hf:01:1046:u:aniw:हृ॒ञ्","hfzu!:alIke:hfz:01:0806:pa:sew:हृ॑षुँ॑","hfza!:tuzwO:hfz:04:0142:pa:sew:हृ॑षँ॑","hrasa!:Sabde:hfs:01:0808:pa:sew:ह्र॑सँ॑","heWa!:heQa! ca BUtaprAdurBAve:heW:09:0069:pa:sew:हे॑ठँ॑","heWa!:vibADAyAm:heW:01:0299:A:sew:हे॑ठँ॒","heWa!:vibADAyAm:heW:01:0360:pa:sew:हे॑ठँ॑","heqf!:anAdare:heq:01:0318:A:sew:हे॑डृँ॒","heqa!:vezwane:heq:01:0887:pa:sew:हे॑डँ॑","heQa!:ca BUtaprAdurBAve ityeke:heQ:09:0070:pa:sew:हे॑ढँ॑","hepf!:ca gatO:hep:01:0432:A:sew:हे॑पृँ॒","hezf!:avyakte Sabde:hez:01:0708:A:sew:हे॑षृँ॒","hoqf!:anAdare:hoq:01:0319:A:sew:हो॑डृँ॒","hoqf!:gatO:hoq:01:0410:pa:sew:हो॑डृँ॑","hnuN:apanayane:hnu:02:0076:A:aniw:ह्नु॒ङ्","hmala!:saYcalane calane mit anupasargAdvA 1943:hmal:01:0918:pa:sew:ह्म॑लँ॑","hrage!:saMvaraRe:hrag:01:0896:pa:sew:ह्र॑गेँ॑","hrapa!:vyaktAyAM vAci ityanye:hrap:10:0163:u:sew:ह्र॑पँ॑","hrasa!:Sabde:hras:01:0808:pa:sew:ह्र॑सँ॑","hrAda!:avyakte Sabde:hrAd:01:0026:A:sew:ह्रा॑दँ॒","hrI:lajjAyAm:hrI:03:0003:pa:aniw:ह्री॒","hrICa!:lajjAyAm:hrIC:01:0238:pa:sew:ह्री॑छँ॑","hrezf!:avyakte Sabde:hrez:01:0709:A:sew:ह्रे॑षृँ॒","hlage!:saMvaraRe:hlag:01:0897:pa:sew:ह्ल॑गेँ॑","hlapa!:vyaktAyAM vAci:hlap:10:0161:u:sew:ह्ल॑पँ॑","hlasa!:Sabde:hlas:01:0809:pa:sew:ह्ल॑सँ॑","hlAdI!:avyakte Sabde suKe ca:hlAd:01:0027:A:sew:ह्ला॑दीँ॒","hvala!:saYcalane calane mit anupasargAdvA 1942:hval:01:0917:pa:sew:ह्व॑लँ॑","hvf:saMvaraRe varaRe ityeke:hvf:01:1080:pa:aniw:ह्वृ॒","hvf:kOwilye:hvf:01:1084:pa:aniw:ह्वृ॒","hveY:sparDAyAM Sabde ca:hve:01:1163:u:aniw:ह्वे॒ञ्");
$bhvAdi=array("ahi!","aka!","akzU!","aga!","aki!","agi!","aGi!","acu!","aja!","aci!","aYcu!","aYcu!","awa!","awwa!","aqa!","aqqa!","aRa!","aWi!","ata!","aqqa!","ati!","adi!","aBra!","ama!","abi!","aBi!","aya!","aya!","arGa!","arca!","arja!","arda!","arba!","arva!","arha!","ala!","ava!","aza!","asa!","ACi!","ASasi","iKa!","iKi!","igi!","iwa!","idi!","ivi!","Ikza!","IKi!","IKi!","Ija","Iji!","Irkzya!","Irzya!","Iza!","Iza!","Iha!","uN","ukza!","uKa!","uKi!","uCI!","uCi!","uWa!","uWa!","urda!","urvI!","uza!","uhi!r","UWa!","UyI!","Uza!","Uha!","f","fja!","fji!","ejf!","ejf!","eWa!","eDa!","ezf!","ezf!","oKf!","oRf!","kaka!","kaKa!","kaKe!","kage!","kaki!","kaca!","kaja!","kaci!","kawI!","kawe!","kaWa!","kaqa!","kaqqa!","kaRa!","kaRa!","kaWi!","kaqi!","kaqi!","katTa!","kada!","kaqqa!","kanI!","kadi!","kadi!","kapa!","kabf!","kamu!","kapi!","karja!","karda!","karba!","karva!","kala!","kalla!","kaza!","kasa!","kAkzi!","kAci!","kASf!","kAsf!","kiwa!","kiwa!","kita!","kIla!","kuN","kuka!","kuca!","kuca!","kuju!","kuYca!","kuji!","kuwi!","kuWi!","kuqi!","kuqi!","kuTi!","kubi!","kurda","kula!","kUja!","kUla!","kfY","kfvi!","kfpa!","kfpU!","kfza!","kfpU!","kepf!","kelf!","kevf!","kE","knaTa!","knUyI!","kmara!","kraTa!","krada!","kradi!","kradi!","krapa!","kramu!","krIqf!","kruYca!","kruSa!","klaTa!","klada!","kladi!","kladi!","klidi!","klidi!","klIbf!","kluN","kleSa!","kvaRa!","kvaTe!","kzaji!","kzapayaSca","kzamU!z","kzara!","kzi","kzivu!","kzIja!","kzIbf!","kzIvf!","kzuBa!","kzura!","kzevu!","kzE","kzmAyI!","kzmIla!","YikzvidA!","YikzvidA!","kzvelf!","Kaja!","Kaji!","Kawa!","Kaqi!","Kada!","Kanu!","Karja!","Karda!","Karba!","Karva!","Kala!","Kaza!","KAdf!","Kiwa!","KuN","Kuju!","Kurda","Kelf!","Kevf!","KE","Korf!","Kolf!","gaja!","gaji!","gaqa!","gaqi!","gaqi!","gada!","gamx!","garja!","garda!","garba!","garva!","garha!","gala!","galBa!","galha!","gAN","gADf!","gAhU!","guN","guN","guja!","guji!","guda!","gupa!","gupU!","gurda","gurvI!","guhU!","gfhU!","gf","gfja!","gfji!","gepf!","gevf!","gezf!","gE","gozwa!","graTi!","grasu!","grucu!","glasu!","glaha!","glucu!","gluYca!","glepf!","glepf!","glevf!","glezf!","glE","GagGa!","GaGa!","Gawa!","Gawwa!","Gaza!","Gasx!","GiRi!","GuN","Guzi!","Guwa!","GuRa!","GuRi!","Guzi!r","GUrRa!","Gf","GfRi!","Gfzu!","GrA","DrAGf!","NuN","caka!","caka!","caYcu!","cawe!","caRa!","caqi!","cate!","cade!","cana!","cadi!","capa!","camu!","caya!","cara!","carca!","carba!","carva!","cala!","caza!","caha!","cAyf!","ciwa!","citI!","cilla!","cIbf!","cIBf!","cIvf!","cucya!","cuqqa!","cuqi!","cuqqa!","cupa!","cubi!","culla!","cUza!","celf!","cezwa!","cyuti!r","Camu!","Caza!","jaja!","jaji!","jawa!","japa!","jaBI!","jamu!","jartsa!","jartsa!","jartsa!","jala!","jalpa!","jaza!","ji","ji!","jivi!","jimu!","jizu!","jIva!","juN","ju","jugi!","jutf!","jUza!","jfBi!","jezf!","jehf!","jE","jyuN","jyuti!r","jri","jvara!","jvala!","jvala!","Jawa!","Jamu!","Jartsa!","Jartsa!","Jartsa!","Jaza!","Jaza!","wala!","wikf!","wIkf!","wvala!","qIN","QOkf!","tasi!","taka!","takzU!","takza!","taki!","tagi!","taYcu!","tawa!","taqi!","tapa!","taya!","tarja!","tarda!","tAyf!","tikf!","tija!","tipf!","tila!","tilla!","tIkf!","tIva!","tuja!","tuji!","tuqf!","tuqi!","tupa!","tuPa!","tuBa!","tumpa!","tumPa!","tubi!","turvI","tusa!","tuhi!r","tUqf!","tUla!","tUza!","tfkza!","tF","teja!","tepf!","tevf!","tyaja!","trakza!","traKa!","traki!","tragi!","tradi!","trapU!z","triKi!","trupa!","truPa!","trumpa!","trumPa!","trEN","trOkf!","tvakzU!","tvagi!","tvaYcu!","YitvarA!","tviza!","tsara!","Taki!","TurvI","daMSa!","dakza!","dakza!","daGi!","dada!","daDa!","daya!","dala!","daha!","dAR","dAna!","dASf!","dAsf!","divi!","dIkza!","du","durvI!","duhi!r","dfhi!","dfha!","dF","deN","devf!","dEp","dfSi!r","dyuta!","dyE","drama!","drAKf!","drAGf!","drAkzi!","drAqf!","drAhf!","dru","drekf!","drE","dvf","DaRa!","Davi!","DAvu!","Dikza!","Divi!","Dukza!","DurvI!","DUpa!","DfN","DfY","Dfja!","Dfji!","Dew","Depf!","Dorf!","DmA","DmAkzi!","DyE","Draja!","Draji!","DraRa!","DrAKf!","DrAkzi!","DrAqf!","Drija!","Dru","Drekf!","DrE","DvaMsu!","Dvaja!","Dvaji!","DvaRa!","Dvana!","Dvana!","DvAkzi!","Dvf","Rakza!","RaKa!","RaKi!","Rawa!","Rawa!","Rada!","wunadi!","RaBa!","Rama!","Raya!","narda!","Rala!","Rasa!","nATf!","nADf!","RAsf!","Rikza!","Ridf!","Ridi!","Rivi!","RiSa!","Rizu!","RIY","RIla!","RIva!","nF","Redf!","Rezf!","pakza!","qupaca!z","paci!","pawa!","paWa!","paRa!","paqi!","patx!","paTe!","pana!","paya!","parda!","parpa!","parba!","parva!","pala!","pelf!","pA","piwa!","piWa!","piqi!","pivi!","pisf!","pIla!","pIva!","puwa!","puqa!","puqi!","puTi!","purva!","pula!","puza!","pUN","pUyI!","purva!","pUla!","pUza!","pfzu!","pelf!","pevf!","pezf!","pesf!","pE","pERf!","o!pyAyI!","pyEN","praTa!","prasa!","pruN","pruzu!","prezf!","prERf!","proTf!","plakza!","pliha!","pluN","pluzu!","plevf!","Pakka!","PaRa!","Pala!","YiPalA!","Pulla!","Pelf!","bahi!","baWa!","baRa!","bawi!","bada!","baDa!","vaBra!","barba!","barha!","bala!","balha!","bAqf","bADf!","bAhf!","biwa!","bidi!","bisa!","bIBf!","bukka!","bugi!","buDa!","buDi!r","u!bundi!r","bfhi!","bfha!","besa!","vehf!","vraRa!","Bakza!","Baja!","Bawa!","Bawa!","BaRa!","Baqi!","Badi!","Barba!","BarBa!","Barva!","Bala!","Balla!","Baza!","BAma!","BAza!","BAsf!","Bikza!","YimidA!","Bidi!","BU","BUza!","BfY","BfjI!","Bezf!","Byasa!","BraMSu!","BraMsu!","Brakza!","BraRa!","Bramu!","wuBrAjf!","BrAjf!","wuBrASf!","Brejf!","Brezf!","Blakza!","wuBlASf!","Blezf!","mahi!","maKa!","maki!","maKi!","magi!","maGi!","maGi!","maca!","maci!","maWa!","maRa!","maWi!","maqi!","maqi!","maTe!","manTa!","maTi!","madi!","maBra!","maya!","marba!","marva!","mala!","malla!","mava!","mavya!","maSa!","maza!","maska!","maska!","maha!","mAkzi!","mAna!","mAhf!","miTf!","midf!","miDf!","mivi!","miSa!","mizu!","miha!","mImf!","mIla!","mIva!","muKi!","muja!","muci","muji!","muwa!","muqa!","muWi!","muqi!","muqi!","muda!","murCA!","murvI!","mUN","mUla!","mUza!","mfkza!","mfDu!","mfzu!","meN","meTf!","medf!","meDf!","mepf!","mevf!","mnA","mrakza!","mrada!","mrucu!","mruYcu!","mrewf!","mreqf!","mlucu!","mluYcu!","mleCa!","mlewf!","mlevf!","mlE","yaja!","yatI!","yaBa!","yama!","wuyAcf!","yugi!","yuCa!","yutf!","yUza!","yezf!","yOwf!","rahi!","rakza!","raKa!","rage!","raKi!","ragi!","raGi!","raYja!","rawa!","rawa!","raWa!","raRa!","raRa!","ravi!","rada!","rapa!","raPa!","raBa!","ramu!","raPi!","rabi!","raBi!","raya!","rasa!","raha!","rAKf!","rAGf!","rAjf!","rAsf!","riKa!","riKi!","rigi!","rivi!","riza!","ruN","ruca!","ruwa!","ruWa!","ruwi!","ruWi!","ruWi!","ruqi!","ruza!","ruha!","rUza!","rekf!","rejf!","rewf!","repf!","reBf!","revf!","rezf!","rE","roqf!","rOqf!","laKa!","lage!","laKi!","lagi!","laGi!","laGi!","laCa!","laja!","laji!","lawa!","laqa!","lapa!","qulaBa!z","labi!","labi!","laBi!","laya!","larba!","lala!","laza!","lasa!","lAKf!","lAGf!","lAja!","lACi!","lAji!","liKa!","liKi!","ligi!","luYca!","luwa!","luwa!","luWa!","luWa!","luqa!","luwi!","luWi!","luWi!","luWi!","luqi!","luTi!","lubi!","lUza!","lepf!","lokf!","locf!","loqf!","lozwa!","vakza!","vaKa!","vaki!","vaki!","vaKi!","vagi!","vaGi!","vaja!","vaYcu!","vawa!","vawa!","vaWa!","vaRa!","vawi!","vaWi!","vaqi!","vada!","vana!","vanu!","vana!","vadi!","quvapa!","vaBra!","wuvama!","vaya!","varca!","varza!","varha!","vala","valga!","valBa!","valla!","valha!","vaza!","vaska!","vasa!","vaska!","vaha!","vAkzi!","vACi!","vAqf","bAhf!","viwa!","viTf!","vizu!","visa!","vIja!","vugi!","bfhi!","vfka!","vfkza!","vftu!","vfDu!","vfzu!","bfha!","veY","veRf!","veTf!","venf!","wuvepf","velf!","vella!","vezwa!","vesa!","vehf!","vella!","o!vE","vyaTa!","vyaya!","vyeY","vraja!","vraja!","vraji!","vraRa!","SaMsu!","Saki!","Saca!","Sawa!","SaWa!","SaRa!","Saqi!","Sadx!","Sapa!","Sarba!","Sarva!","Sala!","Sala!","SalBa!","Sava!","SaSa!","Saza!","Sasu!","SAKf!","SAqf!","SAna!","Sikza!","SiKi!","SiGi!","Siwa!","Siza!","SIkf!","SIBf!","SIla!","Suka!","Suca!","Sucya!","SuWa!","SuWi!","SuWi!","SunDa!","SuBa!","SuBa!","SumBa!","SUla!","SUza!","SfDu!","SfDu!","Self!","Sevf!","SE","SoRf!","SOwf!","Scuti!r","Scyuti!r","SnaTa!","SmIla!","syandU!","cyuN","SyEN","sraMsu!","sraMsu!","Sraki!","Sragi!","SraRa!","SraTa!","SraTi!","SramBu!","SrA","SriY","Srizu!","Sru","SrE","SroRf!","Slaki!","Slagi!","SlaTa!","SlAKf!","SlAGf!","Slizu!","Slokf!","SloRf!","Svaki!","Sragi!","Svaca!","Svaci!","Svala!","Svalla!","wuo!Svi","SvitA!","Svidi!","zwyE","zWivu!","zvaska!","zvaska!","zage!","zaca!","zaca!","zasja!","zaYja!","zawa!","zadx!","zana!","zapa!","zama!","zarkza!","zarja!","zarba!","zarva!","zala!","zasja!","zaha!","ziwa!","ziDa!","ziDU!","zivi!","ziBu!","zimBu!","sIkf!","zu","zUda!","sUrkza!","zUrkzya!","sUza!","sf","sfpx!","zfBu!","zfmBu!","sekf!","zelf!","zevf!","zE","skandi!r","skaBi!","skudi!","sKada!","sKala!","zwaka!","zwana!","zwama!","zwaBi!","zWala!","zwipf!","zwuca!","zwuBu!","zwfkza!","zwepf!","zwE","styE","zwrakza!","zWage!","zWA","zRE","spadi!","sparDa!","spaSa!","sPAyI!","sPuwa!","sPuwi!r","sPuwi!","sPuqi!","sPurCA!","wuo!sPUrjA!","zmiN","smIla!","smf","smf","syamu!","sraMsu!","sraki!","sramBu!","sramBu!","sru","srekf!","srE","srokf!","zvaki!","Sragi!","zvaYja!","zvada!","svana!","svana!","svarda!","zvaska!","zvaska!","svAda!","YizvidA!","svf","hawa!","haWa!","hada!","hamma!","harya!","haya!","hala!","hase!","hikka!","hiwa!","hiqi!","hivi!","huqf!","huqi!","huqi!","hurCA!","hula!","hula!","hUqf!","hfY","hfzu!","hrasa!","heWa!","heWa!","heqf!","heqa!","hepf!","hezf!","hoqf!","hoqf!","hmala!","hrage!","hrasa!","hrAda!","hrICa!","hrezf!","hlage!","hlasa!","hlAdI!","hvala!","hvf","hvf","hveY");
$divAdi=array("aRa!","anuruDa!","ana!","asu!","iza!","IN","uca!","fDu!","kASf!","kuMSa!","kuMsa!","kuTa!","kupa!","kuSa!","kusa!","kfSa!","knasu!","kruDa!","klamu!","klidU!","kliSa!","kzamU!","kzipa!","kzuDa!","kzuBa!","YikzvidA!","Kida!","guDa!","gupa!","gUrI!","gfDu!","GUrI","cUrI!","Co","janI!","jasu!","jUrI!","jFz","JFz","qipa!","qIN","tapa!","tamu!","tasu!","tima!","tIma!","tuBa!","tuza!","tUrI!","tfpa!","Yitfza!","trasI!","damu!","dasu!","divu!","dIN","dIpI!","duza!","dUN","dfpa!","do","druha!","DIN","DUrI","RaBa!","RaSa!","Raha!","nftI!","pada!","pIN","puTa!","puza!","puza!","puzpa!","pUrI!","pyuza!","pyusa!","prIN","pluza!","pluza!","basu!","visa!","buDa!","busa!","busa!","byusa!","Basu!","BfMSu!","BfSu!","BraMSu!","Bramu!","madI!","mana!","masI!","mAN","YimidA!","mIN","musa!","muha!","mfza!","yasu!","yuja!","yuDa!","yupa!","raYja!","raDa!","rADaH","riza!","rIN","rupa!","ruza!","liSa!","lIN","luwa!","luWa!","lupa!","luBa!","vasu!","vAvftu!","vASf!","vida!","bisa!","vusa!","vftu!","vfSa!","vyaDa!","vyuza!","vyuza!","vyusa!","vrIN","vrIqa!","Saka!","Sapa!","Samu!","I!Suci!r","SuDa!","Suza!","SUrI!","So","Sramu!","Sliza!","zWivu!","samI!","zaha!","ziDu!","zivu!","zuha!","zUN","sfja!","zo","zwima!","zwIma!","zwupa!","zwUpa!","zRasu!","zRiha!","zRusu!","zRuha!","srivu!","zvidA!","hfza!");
$tudAdi=array("ila!","iza!","uCI!","ujJa!","uCi!","ujJa!","ubja!","uBa!","umBa!","fca!","fCa!","fPa!","fmPa!","fzI!","kaqa!","kila!","kuN","kuca!","kuwa!","kuqa!","kuRa!","kura!","kUN","kfqa!","kftI!","kfza!","kF","kruqa!","kzi","kzipa!","kzura!","Kida!","Kuqa!","Kura!","gu","guja!","guqa!","guPa!","gumPa!","gurI!","gF","Guwa!","GuRa!","Gura!","GUrRa!","carca!","cala!","cila!","cuwa!","cuqa!","cftI!","Cuwa!","Cuqa!","Cupa!","Cura!","jarja!","juwa!","juqa!","juqa!","juna!","juzI!","JarJa!","qipa!","tila!","tuwa!","tuqa!","tuRa!","tuda!","tupa!","tuPa!","tumpa!","tumPa!","tfMhU!","tfpa!","tfPa!","tfmpa!","tfmPa!","tfhU!","truwa!","tvaca!","Tuqa!","diSa!","dfN","dfpa!","dfPa!","dfBI!","dfmpa!","dfmPa!","druRa!","Di","DU","DU","DfN","Dru","Rila!","RU","Ruda!","Ruda!","RU","pi","piSa!","puwa!","puqa!","puRa!","pura!","pfN","pfqa!","pfRa!","praCa!","bila!","bfhU!","Bujo!","Bfqa!","Brasja!","Brasja!","wumasjo!","wumasjo!","miCa!","mila!","mila!","miza!","mucx!","muwa!","muRa!","mura!","mfN","mfqa!","mfRa!","mfSa!","ri","riPa!","riSa!","riha!","rujo!","ruSa!","o!lajI!","o!lasjI!","o!lasjI!","liKa!","lipa!","liSa!","luwa!","luWa!","luqa!","lupx!","luBa!","viCa!","o!vijI!","vidx!","viDa!","vila!","viSa!","vfRa!","vfhU!","vyaca!","o!vraScU!","vruqa!","Sadx!","Sila!","Suna!","SuBa!","SumBa!","zadx!","zica!","zila!","zura!","zU","sfja!","stfhU!","sTuqa!","spfSa!","sPara!","sPala!","sPuwa!","sPuqa!","sPura!","sPula!","hila!","huqa!");
$curAdi=array("aMsa","ahi!","aNka","aNga","aYcu!","aji!","awwa!","anDa","ama!","arka!","arca!","arja!","arTa","arda!","arha!","arha!","Akranda!","Apx!","Azada!","ila!","Iqa!","Ira!","kaWi!","uGrasa!","Una","Urja!","o!laqi!","kaRa!","kaWi!","kaqi!","katra","katra","kaTa","karRa!","karta!","kala","kala","kAla","kIwa!","kuSi!","kusi!","kuwa!","kuwwa!","kuwwa!","kuRa","kuWi!","kuqi!","kuqi!","kutsa!","kudf!","kudri!","kupa!","kumAra","kubi!","kuBi!","kusma!","kuha","kUwa","kUwa","kURa!","kURa!","kfpa","kfpeSca","kFta!","keta","klapa!","kzaji!","kzapa!","kzapi!","kzala!","kzowa","Kawwa!","Kaqa!","Kaqi!","Kuqi!","Kewa","Keqa!","Kowa","gaja!","gaRa","gadI!","ganDa!","garja!","garda!","garDa!","garva","garha!","gala!","gaveza","guRa","guWi!","guqi!","gupa!","gurda!","gUra!","gfha","gF","goma","granTa!","granTa!","grasa!","grAma","Gawa!","Gawa!","Gawwa!","Gawi!","Guzi!r","Gf","cakka!","cawa!","caqi!","cana!","capa!","capi!","cara!","carca!","cala!","caha","caha","ci","ciY","cita!","citra","citi!","cIka!","cIva!","cIva!","cukka!","cuwa!","cuwwa!","cuwi!","cuda!","cubi!","cura!","cula!","cUrRa!","cUrRa!","cfpa!","cyu","Caji!","Cada","Cada","Cada","Cadi!","Carda","Cidra","CfdI!","Cfpa!","Ceda","jasi!","jaBi!","jala!","jasu!","jasu!","ji","ci","ci","juqa!","juza!","jF","jYapa!","jYA","jri","waki!","qapa!","qipa!","qipa!","tasi!","taqa!","taqa!","tanu!","tatri!","tapa!","tarka!","tarja!","tala!","tija!","tila!","tIra","tuja!","tuji!","tuji!","tuqi!","tutTa","tubi!","tula!","tURa!","tfpa!","tfpa!","trasi!","trasa!","truwa!","daSi!","daSi!","dasi!","dasi!","daRqa","dala!","dasa!","divu!","divu!","duHKa","dula!","dfpa!","dfBI!","dfBa!","Dakka!","DUpa!","DUY","DUpa!","DUSa!","DUza!","DUsa!","Dfza!","u!Drasa!","Dvana","nakka!","nawa!","nawa!","Raqa!","nala!","nivAsa","nizka!","pasi!","pasi!","pakza!","paci!","pawa","pawa","paqi!","pata","paTa!","pada","paTi!","parRa","pala!","palyUla","paSa!","paza","pAra","pAla!","pisi!","piCa!","pija!","piji!","piji!","piWi!","piqi!","piSa!","pisa!","pIqa!","puMsa!","puwa","puwa","puwwa!","puRa!","puwi!","puTa!","pula!","puza!","pusta!","pUja!","pUrI!","pUrRa!","pUrva!","pUla!","pfca!","pfTa!","pF","praTa!","prIY","baDa!","banDa!","barha!","barha!","bala!","balha!","bazka!","basta!","bila!","bukka!","busta!","bfhi!","brUsa!","Bakza!","Baja!","Baji!","Baqi!","Bartsa!","Bala!","BAja","BAma","BU","BU","BUza!","BfSi!","BrURa!","mahi!","maqi!","mada!","mAna!","matri!","marca!","maha","mana!","mAna!","mArga!","mArja!","miji!","mida!","midi!","miSra","mI","muca!","muwa!","muda!","musta!","mUtra","mUla!","mfga","mfjU!","mfqi!","mfza!","mokza!","mrakza!","mrakza!","mraCa!","mleCa!","yakza!","yata!","yatri!","yama!","yu","yuja!","rahi!","raka!","raga!","raGa!","raNga!","raGi!","raca","rawa!","rasa","raha","raha","rica!","ruSi!","rusi!","ruja!","ruwa!","ruwa!","ruza!","rUkza","rUpa","lakza!","lakza!","laga!","laGi!","laGi!","laja","laja","laji!","laji!","laji!","laqa!","laqi!","o!laqi!","lala!","lasa!","lABa","ligi!","liji!","lI","luji!","luji!","luwa!","luRwa!","luRWa!","lubi!","lUza!","lokf!","locf!","vaca!","vaYcu!","vawa","vawa","vawi!","vawi!","vaqi!","vada!","vara","varRa","varRa","varDa!","barha!","varha!","valka!","balha!","vasa","vasa","vasta!","vAta","vAsa","viCa!","vida!","vipa!","vila!","vizka","vizka","vIra","vfY","bfhi!","vfjI!","vftu!","vfDu!","vfza!","vela","vyapa!","vyaya","vyaya","vyusa!","vraja!","vraRa","vrUza!","vrUsa!","SaWa","SaWa","SaWa","Sabda!","Sama!","Samba!","SAntva!","Siza!","SIka!","SIka!","SIla","SuWa!","SuWi!","SunDa!","Sulka!","Sulba!","SUra","SUrpa!","SfDu!","SraRa!","SraTa","SraTa","SraTa","SranTa!","Sliza!","SvaWa","SvaWa","SvaWi!","SvaBra!","Svarta!","Svalka!","saNketa!","saNgrAma","zawwa!","satra","satra","saBAja","zamba!","sAra","zaha!","zAntva!","sAma","sAmba!","sAra","suKa","zuwwa!","sUca","sUtra","zUda!","stana","zwupa!","zwUpa!","stena","stoma!","sTUla","zRiha!","spaSa!","spfha","sPiwa!","sPiwwa!","sPuwa!","sPuwi!","sPuqi!","zmiN","smiwa!","syama!","zvada!","svara","svarta!","svAda!","hasta!","hisi!","hizka!","hrapa!","hlapa!");
$adAdi=array("ada!","iN","ik","ana!","asa!","ASAsu!","Asa!","iN","iR","ik","Iqa!","Ira!","ISa!","UrRuY","kasi!","kaSa!","kasa!","ku","wukzu","kzRu","KyA","cakAsf!","cakzi!N","jakza!","jAgf","tu","daridrA","dAp","diha!","dIDIN","duha!","dyu","drA","dviza!","Risi!","Riji!","Ru","pA","piji!","pfcI!","pfji!","prA","psA","brUY","BA","mA","mfjU!","yA","yu","rA","ru","rudi!r","lA","liha!","vaca!","vaSa!","vasa!","vA","vida!","vI","vfjI!","vfji!","vevIN","SAsu!","Siji!","SIN","SrA","Svasa!","zasti!","zasa!","zu","zUN","zwuY","zRA","zRu","Yizvapa!","hana!","hnuN");
$juhotyAdi=array("f","ki","kita!","gA","Gf","jana!","tura!","qudAY","Dana!","quDAY","Diza!","Riji!r","pf","pF","Basa!","YiBI","quBfY","mAN","viji!r","vizx!","sf","o!hAN","o!hAk","hu","hf","hrI");
$juhotyAdireplace=array("if","kiki","kikit","gigA","GiGf","jajan","tutur","dadA","daDan","daDA","diDiz","nenij","pipf","pipF","baBas","biBI","biBf","mimA","vevij","veviz","sisf","hihA","hahA","huhu","hihf","jihrI");
$svAdi=array("aSU!","aha!","Apx!","f","fDu!","kfY","kzi","kzI","camu!","ciY","ciri","jiri","tika!","tiga!","tfpa!","daGa!","damBu!","dASa!","wudu","dF","DuY","DUY","YiDfzA!","pf","qumiY","rADa!","ri","vfY","Sakx!","SiY","zaGa!","sADa!","ziY","zuY","zwiGa!","stfY","spf","smf","hi");
$rudhAdi=array("aYjU!","YiinDI!","undI!","kftI!","kzudi!r","Kida!","Cidi!r","u!Cfdi!r","taYcU!","u!tfdi!r","tfha!","pizx!","pfcI!","BaYjo!","Bidi!r","Buja!","yuji!r","rici!r","ruDi!r","vici!r","o!vijI!","vida!","vfjI!","Sizx!","hisi!");
$tanAdi=array("fRu!","qukfY","kzaRu!","kziRu!","GfRu!","tanu!","tfRu!","manu!","vanu!","zanu!");
$kryAdi=array("aSa!","iza!","F","kunTa!","kuza!","kFY","kF","knUY","qukrIY","kliSU!","kzIz","kzuBa!","Kaca!","Kava!","guDa!","gF","granTa!","graha!","jF","jYA","jyA","JF","tuBa!","dF","drUY","DUY","DF","u!Drasa!","RaBa!","nF","puza!","pUY","pF","prIY","pruza!","plI","pluza!","banDa!","blI","BF","BrI","manTa!","mIY","muza!","mUY","mfqa!","mfda!","mF","yuY","rI","lI","lUY","viza!","vfN","vFY","vF","vrI","vlI","SF","SranTa!","SranTa!","SrIY","ziY","skamBu!","skuY","skumBu!","stamBu!","stumBu!","stFY","heWa!","heQa!");
$allverbs=array("aMsa","ahi!","ahi!","aka!","akzU!","aga!","aNka","aki!","aNga","agi!","aGi!","acu!","aja!","aci!","aYcu!","aYcu!","aYcu!","aji!","aYjU!","awa!","awwa!","awwa!","aqa!","aqqa!","aRa!","aRa!","aWi!","ata!","ada!","aqqa!","iN","ik","anuruDa!","ana!","ana!","ati!","adi!","anDa","aBra!","ama!","ama!","abi!","aBi!","aya!","aya!","arka!","arGa!","arca!","arca!","arja!","arja!","arTa","arda!","arda!","arba!","arva!","arha!","arha!","arha!","ala!","ava!","aSa!","aSU!","aza!","asu!","asa!","asa!","aha!","Akranda!","ACi!","Apx!","Apx!","ASasi","ASAsu!","Azada!","Asa!","iN","iR","ik","iKa!","iKi!","igi!","iwa!","idi!","YiinDI!","ivi!","ila!","ila!","iza!","iza!","iza!","IN","Ikza!","IKi!","IKi!","Ija","Iji!","Iqa!","Iqa!","Ira!","Ira!","Irkzya!","Irzya!","ISa!","Iza!","Iza!","Iha!","uN","ukza!","uKa!","uKi!","uca!","uCI!","uCI!","ujJa!","uCi!","uCi!","uWa!","uWa!","kaWi!","ujJa!","uGrasa!","undI!","ubja!","uBa!","umBa!","urda!","urvI!","uza!","uhi!r","UWa!","Una","UyI!","Urja!","UrRuY","Uza!","Uha!","f","f","f","fca!","fCa!","fja!","fji!","fRu!","fDu!","fDu!","fPa!","fmPa!","fzI!","F","ejf!","ejf!","eWa!","eDa!","ezf!","ezf!","oKf!","oRf!","o!laqi!","kasi!","kaka!","kaKa!","kaKe!","kage!","kaki!","kaca!","kaja!","kaci!","kawI!","kawe!","kaWa!","kaqa!","kaqa!","kaqqa!","kaRa!","kaRa!","kaRa!","kaWi!","kaWi!","kaqi!","kaqi!","kaqi!","katra","katTa!","katra","kaTa","kada!","kaqqa!","kanI!","kadi!","kadi!","kapa!","kabf!","kamu!","kapi!","karja!","karRa!","karta!","karda!","karba!","karva!","kala","kala","kala!","kalla!","kaSa!","kaza!","kasa!","kasa!","kAkzi!","kAci!","kAla","kASf!","kASf!","kAsf!","ki","kiwa!","kiwa!","kita!","kita!","kila!","kIwa!","kIla!","kuN","ku","kuN","kuSi!","kuMSa!","kusi!","kuMsa!","kuka!","kuca!","kuca!","kuca!","kuju!","kuYca!","kuji!","kuwa!","kuwa!","kuwwa!","kuwwa!","kuqa!","kuRa","kuRa!","kuwi!","kuWi!","kuWi!","kuqi!","kuqi!","kuqi!","kuqi!","kutsa!","kuTa!","kudf!","kuTi!","kunTa!","kudri!","kupa!","kupa!","kumAra","kubi!","kubi!","kuBi!","kura!","kurda","kula!","kuSa!","kuza!","kusa!","kusma!","kuha","kUN","kUja!","kUwa","kUwa","kURa!","kURa!","kUla!","qukfY","kfY","kfY","kfqa!","kfvi!","kftI!","kftI!","kfpa","kfpeSca","kfpa!","kfpU!","kfSa!","kfza!","kfza!","kF","kFY","kF","kFta!","kfpU!","keta","kepf!","kelf!","kevf!","kE","knaTa!","knasu!","knUY","knUyI!","kmara!","kraTa!","krada!","kradi!","kradi!","krapa!","kramu!","qukrIY","krIqf!","kruYca!","kruqa!","kruDa!","kruSa!","klaTa!","klada!","kladi!","kladi!","klapa!","klamu!","klidU!","klidi!","klidi!","kliSa!","kliSU!","klIbf!","kluN","kleSa!","kvaRa!","kvaTe!","kzaji!","kzaji!","kzaRu!","kzapa!","kzapayaSca","kzamU!","kzamU!z","kzapi!","kzara!","kzala!","kzi","kzi","kzi","kziRu!","kzipa!","kzipa!","kzivu!","kzI","kzIja!","kzIbf!","kzIvf!","kzIz","wukzu","kzudi!r","kzuDa!","kzuBa!","kzuBa!","kzuBa!","kzura!","kzura!","kzevu!","kzE","kzowa","kzRu","kzmAyI!","kzmIla!","YikzvidA!","YikzvidA!","YikzvidA!","kzvelf!","Kaca!","Kaja!","Kaji!","Kawa!","Kawwa!","Kaqa!","Kaqi!","Kaqi!","Kada!","Kanu!","Karja!","Karda!","Karba!","Karva!","Kala!","Kava!","Kaza!","KAdf!","Kiwa!","Kida!","Kida!","Kida!","KuN","Kuju!","Kuqa!","Kuqi!","Kura!","Kurda","Kewa","Keqa!","Kelf!","Kevf!","KE","Kowa","Korf!","Kolf!","KyA","gaja!","gaja!","gaji!","gaqa!","gaRa","gaqi!","gaqi!","gadI!","gada!","ganDa!","gamx!","garja!","garja!","garda!","garda!","garDa!","garba!","garva","garva!","garha!","garha!","gala!","gala!","galBa!","galha!","gaveza","gAN","gA","gADf!","gAhU!","guN","guN","gu","guja!","guja!","guji!","guqa!","guRa","guWi!","guqi!","guda!","guDa!","guDa!","gupa!","gupa!","gupU!","gupa!","guPa!","gumPa!","gurI!","gurda","gurda!","gurvI!","guhU!","gUra!","gUrI!","gfhU!","gf","gfja!","gfji!","gfDu!","gfha","gF","gF","gF","gepf!","gevf!","gezf!","gE","goma","gozwa!","graTi!","granTa!","granTa!","granTa!","grasu!","grasa!","graha!","grAma","grucu!","glasu!","glaha!","glucu!","gluYca!","glepf!","glepf!","glevf!","glezf!","glE","GagGa!","GaGa!","Gawa!","Gawa!","Gawa!","Gawwa!","Gawwa!","Gawi!","Gaza!","Gasx!","GiRi!","GuN","Guzi!","Guwa!","Guwa!","GuRa!","GuRa!","GuRi!","Gura!","Guzi!r","Guzi!r","GUrI","GUrRa!","GUrRa!","Gf","Gf","Gf","GfRu!","GfRi!","Gfzu!","GrA","DrAGf!","NuN","cakAsf!","caka!","caka!","cakka!","cakzi!N","caYcu!","cawa!","cawe!","caRa!","caqi!","caqi!","cate!","cade!","cana!","cana!","cadi!","capa!","capa!","camu!","camu!","capi!","caya!","cara!","cara!","carca!","carca!","carca!","carba!","carva!","cala!","cala!","cala!","caza!","caha","caha!","caha","cAyf!","ci","ciY","ciY","ciwa!","cita!","citI!","citra","citi!","ciri","cila!","cilla!","cIka!","cIva!","cIbf!","cIBf!","cIva!","cIvf!","cukka!","cucya!","cuwa!","cuwa!","cuwwa!","cuqa!","cuqqa!","cuwi!","cuqi!","cuda!","cuqqa!","cupa!","cubi!","cubi!","cura!","cula!","culla!","cUrI!","cUrRa!","cUrRa!","cUza!","cftI!","cfpa!","celf!","cezwa!","cyu","cyuti!r","Caji!","Cada","Cada","Cada","Cadi!","Camu!","Carda","Caza!","Cidi!r","Cidra","Cuwa!","Cuqa!","Cupa!","Cura!","u!Cfdi!r","CfdI!","Cfpa!","Ceda","Co","jasi!","jakza!","jaja!","jaji!","jawa!","jana!","janI!","japa!","jaBI!","jamu!","jaBi!","jartsa!","jartsa!","jarja!","jartsa!","jala!","jala!","jalpa!","jaza!","jasu!","jasu!","jasu!","jAgf","ji","ji","ji!","ci","jivi!","jimu!","jiri","jizu!","jIva!","juN","ju","jugi!","ci","juwa!","juqa!","juqa!","juqa!","jutf!","juna!","juza!","juzI!","jUrI!","jUza!","jfBi!","jFz","jF","jF","jezf!","jehf!","jE","jYapa!","jYA","jYA","jyA","jyuN","jyuti!r","jri","jri","jvara!","jvala!","jvala!","Jawa!","Jamu!","Jartsa!","Jartsa!","JarJa!","Jartsa!","Jaza!","Jaza!","JF","JFz","waki!","wala!","wikf!","wIkf!","wvala!","qapa!","qipa!","qipa!","qipa!","qipa!","qIN","qIN","QOkf!","tasi!","tasi!","taka!","takzU!","takza!","taki!","tagi!","taYcu!","taYcU!","tawa!","taqa!","taqa!","taqi!","tanu!","tanu!","tatri!","tapa!","tapa!","tapa!","tamu!","taya!","tarka!","tarja!","tarja!","tarda!","tala!","tasu!","tAyf!","tika!","tikf!","tiga!","tija!","tija!","tipf!","tima!","tila!","tila!","tila!","tilla!","tIkf!","tIma!","tIra","tIva!","tu","tuja!","tuja!","tuji!","tuji!","tuji!","tuwa!","tuqa!","tuqf!","tuRa!","tuqi!","tuqi!","tutTa","tuda!","tupa!","tupa!","tuPa!","tuPa!","tuBa!","tuBa!","tuBa!","tumpa!","tumpa!","tumPa!","tumPa!","tubi!","tubi!","tura!","turvI","tula!","tuza!","tusa!","tuhi!r","tUqf!","tURa!","tUrI!","tUla!","tUza!","tfMhU!","tfkza!","tfRu!","u!tfdi!r","tfpa!","tfpa!","tfpa!","tfpa!","tfpa!","tfPa!","tfmpa!","tfmPa!","Yitfza!","tfhU!","tfha!","tF","teja!","tepf!","tevf!","tyaja!","trasi!","trakza!","traKa!","traki!","tragi!","tradi!","trapU!z","trasI!","trasa!","triKi!","truwa!","truwa!","trupa!","truPa!","trumpa!","trumPa!","trEN","trOkf!","tvakzU!","tvagi!","tvaca!","tvaYcu!","YitvarA!","tviza!","tsara!","Taki!","Tuqa!","TurvI","daSi!","daSi!","daMSa!","dasi!","dasi!","dakza!","dakza!","daGa!","daGi!","daRqa","dada!","daDa!","damu!","damBu!","daya!","daridrA","dala!","dala!","dASa!","dasa!","dasu!","daha!","qudAY","dAR","dAp","dAna!","dASf!","dAsf!","divi!","divu!","divu!","divu!","diSa!","diha!","dIN","dIkza!","dIDIN","dIpI!","du","wudu","duHKa","durvI!","dula!","duza!","duhi!r","duha!","dUN","dfN","dfhi!","dfpa!","dfpa!","dfpa!","dfPa!","dfBI!","dfBI!","dfBa!","dfmpa!","dfmPa!","dfha!","dF","dF","dF","deN","devf!","dEp","dfSi!r","do","dyu","dyuta!","dyE","drama!","drA","drAKf!","drAGf!","drAkzi!","drAqf!","drAhf!","dru","druRa!","druha!","drUY","drekf!","drE","dviza!","dvf","Dakka!","DaRa!","Dana!","Davi!","quDAY","DAvu!","Di","Dikza!","Divi!","Diza!","DIN","DU","DuY","Dukza!","DUpa!","DurvI!","DU","DUY","DUY","DUY","DUpa!","DUpa!","DUrI","DUSa!","DUza!","DUsa!","DfN","DfN","DfY","Dfja!","Dfji!","Dfza!","YiDfzA!","DF","Dew","Depf!","Dorf!","DmA","DmAkzi!","DyE","Draja!","Draji!","DraRa!","u!Drasa!","u!Drasa!","DrAKf!","DrAkzi!","DrAqf!","Drija!","Dru","Dru","Drekf!","DrE","DvaMsu!","Dvaja!","Dvaji!","DvaRa!","Dvana","Dvana!","Dvana!","DvAkzi!","Dvf","nakka!","Rakza!","RaKa!","RaKi!","Rawa!","nawa!","nawa!","Rawa!","Raqa!","Rada!","wunadi!","RaBa!","RaBa!","RaBa!","Rama!","Raya!","narda!","nala!","Rala!","RaSa!","Rasa!","Raha!","nATf!","nADf!","RAsf!","Risi!","Rikza!","Riji!r","Riji!","Ridf!","Ridi!","Rivi!","Rila!","nivAsa","RiSa!","Rizu!","nizka!","RIY","RIla!","RIva!","RU","Ru","Ruda!","Ruda!","RU","nftI!","nF","nF","Redf!","Rezf!","pasi!","pasi!","pakza!","pakza!","qupaca!z","paci!","paci!","pawa","pawa","pawa!","paWa!","paRa!","paqi!","paqi!","pata","patx!","paTa!","paTe!","pada","pada!","pana!","paTi!","paya!","parRa","parda!","parpa!","parba!","parva!","pala!","pala!","palyUla","pelf!","paSa!","paza","pA","pA","pAra","pAla!","pi","pisi!","piCa!","pija!","piji!","piji!","piji!","piwa!","piWa!","piWi!","piqi!","piqi!","pivi!","piSa!","piSa!","pizx!","pisf!","pisa!","pIN","pIqa!","pIla!","pIva!","puMsa!","puwa","puwa","puwa!","puwa!","puwwa!","puqa!","puqa!","puRa!","puRa!","puwi!","puqi!","puTa!","puTa!","puTi!","pura!","purva!","pula!","pula!","puza!","puza!","puza!","puza!","puza!","puzpa!","pusta!","pUY","pUN","pUja!","pUyI!","pUrI!","pUrI!","pUrRa!","purva!","pUrva!","pUla!","pUla!","pUza!","pf","pf","pfN","pfca!","pfcI!","pfcI!","pfji!","pfqa!","pfRa!","pfTa!","pfzu!","pF","pF","pF","pelf!","pevf!","pezf!","pesf!","pE","pERf!","o!pyAyI!","pyuza!","pyusa!","pyEN","praCa!","praTa!","praTa!","prasa!","prA","prIY","prIY","prIN","pruN","pruzu!","pruza!","prezf!","prERf!","proTf!","plakza!","pliha!","plI","pluN","pluza!","pluza!","pluzu!","pluza!","plevf!","psA","Pakka!","PaRa!","Pala!","YiPalA!","Pulla!","Pelf!","bahi!","baWa!","baRa!","bawi!","bada!","baDa!","baDa!","banDa!","banDa!","vaBra!","barba!","barha!","barha!","barha!","bala!","bala!","balha!","balha!","bazka!","basu!","basta!","bAqf","bADf!","bAhf!","biwa!","bidi!","bila!","bila!","bisa!","visa!","bIBf!","bukka!","bukka!","bugi!","buDa!","buDa!","buDi!r","u!bundi!r","busa!","busa!","busta!","bfhi!","bfhi!","bfha!","bfhU!","besa!","vehf!","byusa!","vraRa!","brUY","brUsa!","blI","Bakza!","Bakza!","Baja!","Baja!","Baji!","BaYjo!","Bawa!","Bawa!","BaRa!","Baqi!","Baqi!","Badi!","Bartsa!","Barba!","BarBa!","Barva!","Bala!","Bala!","Balla!","Baza!","Basu!","Basa!","BA","BAja","BAma","BAma!","BAza!","BAsf!","Bikza!","Bidi!r","YimidA!","Bidi!","YiBI","Bujo!","Buja!","BU","BU","BU","BUza!","BUza!","quBfY","BfY","BfSi!","BfMSu!","BfjI!","Bfqa!","BfSu!","BF","Bezf!","Byasa!","BraMSu!","BraMSu!","BraMsu!","Brakza!","Brasja!","BraRa!","Bramu!","Bramu!","Brasja!","wuBrAjf!","BrAjf!","wuBrASf!","BrI","BrURa!","Brejf!","Brezf!","Blakza!","wuBlASf!","Blezf!","mahi!","mahi!","maKa!","maki!","maKi!","magi!","maGi!","maGi!","maca!","wumasjo!","maci!","maWa!","maRa!","maWi!","maqi!","maqi!","maqi!","maTe!","mada!","madI!","manu!","mana!","mAna!","matri!","manTa!","manTa!","maTi!","madi!","maBra!","maya!","marca!","marba!","marva!","mala!","malla!","mava!","mavya!","maSa!","maza!","maska!","masI!","maska!","wumasjo!","maha","maha!","mAN","mA","mAN","mAkzi!","mana!","mAna!","mAna!","mArga!","mArja!","mAhf!","qumiY","miCa!","miji!","miTf!","midf!","mida!","YimidA!","miDf!","midi!","mivi!","mila!","mila!","miSa!","miSra","mizu!","miza!","miha!","mI","mIN","mIY","mImf!","mIla!","mIva!","muKi!","muca!","mucx!","muja!","muci","muji!","muwa!","muwa!","muwa!","muqa!","muRa!","muWi!","muqi!","muqi!","muda!","muda!","mura!","murCA!","murvI!","muza!","musa!","musta!","muha!","mUY","mUN","mUtra","mUla!","mUla!","mUza!","mfN","mfkza!","mfga","mfjU!","mfjU!","mfqa!","mfqa!","mfRa!","mfqi!","mfda!","mfDu!","mfSa!","mfza!","mfza!","mfzu!","mF","meN","meTf!","medf!","meDf!","mepf!","mevf!","mokza!","mnA","mrakza!","mrakza!","mrakza!","mraCa!","mrada!","mrucu!","mruYcu!","mrewf!","mreqf!","mlucu!","mluYcu!","mleCa!","mleCa!","mlewf!","mlevf!","mlE","yakza!","yaja!","yata!","yatI!","yatri!","yaBa!","yama!","yama!","yasu!","yA","wuyAcf!","yu","yuY","yu","yugi!","yuCa!","yuja!","yuji!r","yuja!","yutf!","yuDa!","yupa!","yUza!","yezf!","yOwf!","rahi!","rahi!","raka!","rakza!","raKa!","raga!","rage!","raGa!","raKi!","raNga!","ragi!","raGi!","raGi!","raca","raYja!","raYja!","rawa!","rawa!","rawa!","raWa!","raRa!","raRa!","ravi!","rada!","raDa!","rapa!","raPa!","raBa!","ramu!","raPi!","rabi!","raBi!","raya!","rasa","rasa!","raha","raha","raha!","rA","rAKf!","rAGf!","rAjf!","rADa!","rADaH","rAsf!","ri","ri","riKa!","riKi!","rigi!","rica!","rici!r","rivi!","riPa!","riSa!","riza!","riza!","riha!","rI","rIN","ruN","ru","ruSi!","rusi!","ruca!","rujo!","ruja!","ruwa!","ruwa!","ruwa!","ruWa!","ruwi!","ruWi!","ruWi!","ruqi!","rudi!r","ruDi!r","rupa!","ruSa!","ruza!","ruza!","ruza!","ruha!","rUkza","rUpa","rUza!","rekf!","rejf!","rewf!","repf!","reBf!","revf!","rezf!","rE","roqf!","rOqf!","lakza!","lakza!","laKa!","laga!","lage!","laKi!","lagi!","laGi!","laGi!","laGi!","laGi!","laCa!","laja","laja","laja!","o!lajI!","o!lasjI!","laji!","laji!","laji!","laji!","lawa!","laqa!","laqa!","laqi!","o!laqi!","lapa!","qulaBa!z","labi!","labi!","laBi!","laya!","larba!","lala!","lala!","laza!","lasa!","lasa!","o!lasjI!","lA","lAKf!","lAGf!","lAja!","lACi!","lAji!","lABa","liKa!","liKa!","liKi!","ligi!","ligi!","liji!","lipa!","liSa!","liSa!","liha!","lI","lIN","lI","luYca!","luji!","luji!","luwa!","luwa!","luwa!","luwa!","luwa!","luWa!","luWa!","luWa!","luWa!","luqa!","luqa!","luRwa!","luwi!","luRWa!","luWi!","luWi!","luWi!","luqi!","luTi!","lupx!","lupa!","luBa!","luBa!","lubi!","lubi!","lUY","lUza!","lUza!","lepf!","lokf!","lokf!","locf!","locf!","loqf!","lozwa!","vakza!","vaKa!","vaki!","vaki!","vaKi!","vagi!","vaGi!","vaca!","vaca!","vaja!","vaYcu!","vaYcu!","vawa","vawa","vawa!","vawa!","vaWa!","vaRa!","vawi!","vawi!","vawi!","vaWi!","vaqi!","vaqi!","vada!","vada!","vana!","vanu!","vanu!","vana!","vadi!","quvapa!","vaBra!","wuvama!","vaya!","vara","varca!","varRa","varRa","varDa!","varza!","barha!","varha!","varha!","vala","valka!","valga!","valBa!","valla!","balha!","valha!","vaSa!","vaza!","vaska!","vasa","vasa!","vasa!","vasu!","vasa","vaska!","vasta!","vaha!","vA","vAkzi!","vACi!","vAqf","vAta","vAvftu!","vASf!","vAsa","bAhf!","vici!r","viCa!","viCa!","viji!r","o!vijI!","o!vijI!","viwa!","viTf!","vida!","vida!","vidx!","vida!","vida!","viDa!","vipa!","vila!","vila!","viSa!","vizu!","viza!","vizx!","vizka","vizka","visa!","bisa!","vI","vIja!","vIra","vugi!","vusa!","vfY","vfY","vfN","bfhi!","bfhi!","vfka!","vfkza!","vfjI!","vfjI!","vfjI!","vfji!","vfRa!","vftu!","vftu!","vftu!","vfDu!","vfDu!","vfSa!","vfzu!","vfza!","bfha!","vfhU!","vFY","vF","veY","veRf!","veTf!","venf!","wuvepf","vela","velf!","vella!","vevIN","vezwa!","vesa!","vehf!","vella!","o!vE","vyaca!","vyaTa!","vyaDa!","vyapa!","vyaya","vyaya","vyaya!","vyuza!","vyuza!","vyusa!","vyusa!","vyeY","vraja!","vraja!","vraja!","vraji!","vraRa","vraRa!","o!vraScU!","vrI","vrIN","vrIqa!","vruqa!","vrUza!","vrUsa!","vlI","SaMsu!","Saka!","Sakx!","Saki!","Saca!","Sawa!","SaWa","SaWa","SaWa!","SaWa","SaRa!","Saqi!","Sadx!","Sadx!","Sapa!","Sapa!","Sabda!","Sama!","Samu!","Samba!","Sarba!","Sarva!","Sala!","Sala!","SalBa!","Sava!","SaSa!","Saza!","Sasu!","SAKf!","SAqf!","SAna!","SAntva!","SAsu!","SiY","Sikza!","SiKi!","SiGi!","Siji!","Siwa!","Sila!","Siza!","Siza!","Sizx!","SIN","SIka!","SIka!","SIkf!","SIBf!","SIla","SIla!","Suka!","I!Suci!r","Suca!","Sucya!","SuWa!","SuWa!","SuWi!","SuWi!","SuWi!","SuDa!","Suna!","SunDa!","SunDa!","SuBa!","SuBa!","SuBa!","SumBa!","SumBa!","Sulka!","Sulba!","Suza!","SUra","SUrI!","SUrpa!","SUla!","SUza!","SfDu!","SfDu!","SfDu!","SF","Self!","Sevf!","SE","So","SoRf!","SOwf!","Scuti!r","Scyuti!r","SnaTa!","SmIla!","syandU!","cyuN","SyEN","sraMsu!","sraMsu!","Sraki!","Sragi!","SraRa!","SraRa!","SraTa","SraTa!","SraTa","SraTa","SranTa!","SranTa!","SranTa!","SraTi!","Sramu!","SramBu!","SrA","SrA","SriY","Srizu!","SrIY","Sru","SrE","SroRf!","Slaki!","Slagi!","SlaTa!","SlAKf!","SlAGf!","Slizu!","Sliza!","Sliza!","Slokf!","SloRf!","Svaki!","Sragi!","Svaca!","Svaci!","SvaWa","SvaWa","SvaWi!","SvaBra!","Svarta!","Svala!","Svalka!","Svalla!","Svasa!","wuo!Svi","SvitA!","Svidi!","zwyE","zWivu!","zWivu!","zvaska!","zvaska!","zasti!","zage!","saNketa!","saNgrAma","zaca!","zaca!","zasja!","zaYja!","zawa!","zawwa!","satra","satra","zadx!","zadx!","zaGa!","zanu!","zana!","zapa!","saBAja","zama!","samI!","zamba!","sAra","zarkza!","zarja!","zarba!","zarva!","zala!","zasa!","zasja!","zaha!","zaha!","zaha!","sADa!","zAntva!","sAma","sAmba!","sAra","ziY","ziY","zica!","ziwa!","ziDa!","ziDU!","ziDu!","zivi!","ziBu!","zimBu!","zila!","zivu!","sIkf!","zuY","zu","zu","suKa","zuwwa!","zura!","zuha!","zUN","zUN","zU","sUca","sUtra","zUda!","zUda!","sUrkza!","zUrkzya!","sUza!","sf","sf","sfja!","sfja!","sfpx!","zfBu!","zfmBu!","sekf!","zelf!","zevf!","zE","zo","skandi!r","skamBu!","skaBi!","skuY","skudi!","skumBu!","sKada!","sKala!","zwaka!","stana","zwana!","zwama!","zwaBi!","stamBu!","zWala!","zwiGa!","zwipf!","zwima!","zwIma!","zwuY","zwuca!","zwupa!","zwupa!","zwuBu!","stumBu!","zwUpa!","zwUpa!","stfY","zwfkza!","stfhU!","stFY","stena","zwepf!","zwE","stoma!","styE","zwrakza!","zWage!","zWA","sTuqa!","sTUla","zRasu!","zRA","zRiha!","zRiha!","zRu","zRusu!","zRuha!","zRE","spadi!","sparDa!","spaSa!","spaSa!","spf","spfSa!","spfha","sPara!","sPala!","sPAyI!","sPiwa!","sPiwwa!","sPuwa!","sPuwa!","sPuwa!","sPuwi!r","sPuqa!","sPuwi!","sPuwi!","sPuqi!","sPuqi!","sPura!","sPurCA!","sPula!","wuo!sPUrjA!","zmiN","zmiN","smiwa!","smIla!","smf","smf","smf","syamu!","syama!","sraMsu!","sraki!","sramBu!","sramBu!","srivu!","sru","srekf!","srE","srokf!","zvaki!","Sragi!","zvaYja!","zvada!","zvada!","svana!","svana!","Yizvapa!","svara","svarta!","svarda!","zvaska!","zvaska!","svAda!","svAda!","zvidA!","YizvidA!","svf","hawa!","haWa!","hada!","hana!","hamma!","harya!","haya!","hala!","hase!","hasta!","o!hAN","o!hAk","hi","hisi!","hisi!","hikka!","hiwa!","hiqi!","hivi!","hila!","hizka!","hu","huqf!","huqa!","huqi!","huqi!","hurCA!","hula!","hula!","hUqf!","hf","hfY","hfzu!","hfza!","hrasa!","heWa!","heWa!","heWa!","heqf!","heqa!","heQa!","hepf!","hezf!","hoqf!","hoqf!","hnuN","hmala!","hrage!","hrapa!","hrasa!","hrAda!","hrI","hrICa!","hrezf!","hlage!","hlapa!","hlasa!","hlAdI!","hvala!","hvf","hvf","hveY");
$pvAdi=array("pUY","lUY","stFY","kFY","vFY","DUY","SF","pF","vF","BF","mF","dF","jF","nF","kF","F","gF","jyA","rI","lI","blI","plI");
$lvAdi=array("lUY","stFY","kFY","vFY","DUY","SF","pF","vF","BF","mF","dF","jF","nF","kF","F","gF","jyA","rI","lI","blI","plI");
$ghuset=array("qudAY","dAR","do","deN","quDAY","Dew");
$aniditverbs=array("skandi!r","sraMsu!","DvaMsu!","BraMsu!","BraMSu!","sraMBu!","sramBu!","maTi!","graTi!","granTa!","SranTa!","SraTi!","kuTi!","kunTa!","SunDa!","kuYca!","kruYca!","luYca!","mfYcu!","mluYcu!","gluYca!","vaYcu!","caYcu!","tvaYcu!","taYcu!","taYcU!","SramBu!","damBu!","zfmBu!","hamma!","SaMsu!","kuMsa!","kusi!","raYja!","syandU!","Baji!","banDa!","aYcu!","aYjU!","undI!","YiinDI!","trumpa!","trumPa!","tfmPa!","tumPa!","dfmPa!","fmPa!","gumPa!","umBa!","SumBa!","tumpa!","tfMhU!","bundi!r","zaYja!","zvaYja!","daMSa!","stamBu!","stumBu!","skamBu!","skumBu!");
//$aniditverbs=array("skand","sraMs","DvaMs","BraMs","BraMS","sraMB","sramB","manT","granT","SranT","kunT","SunD","kuYc","kruYc","luYc","mfYc","mluYc","gluYc","vaYc","caYc","tvaYc","taYc","SramB","damB","zfmB","hamm","SaMs","kuMs","raYj","syand","BaYj","banD","aYc","aYj","und","inD!","trump","trumP","tfmP","tumP","dfmP","fmP","gumP","umB","SumB","tump","tfMh","tfnh","bund","zaYj","zvaYj","daMS","stamB","stumB","skamB","skumB");
$iditverbs=array("ahi!","ahi!","aki!","agi!","aGi!","aci!","aji!","aWi!","ati!","adi!","abi!","aBi!","ACi!","iKi!","igi!","idi!","ivi!","IKi!","IKi!","Iji!","uKi!","uCi!","uCi!","kaWi!","uhi!r","fji!","o!laqi!","kasi!","kaki!","kaci!","kaWi!","kaWi!","kaqi!","kaqi!","kaqi!","kadi!","kadi!","kapi!","kAkzi!","kAci!","kuSi!","kusi!","kuji!","kuwi!","kuWi!","kuWi!","kuqi!","kuqi!","kuqi!","kuqi!","kuTi!","kudri!","kubi!","kubi!","kuBi!","kfvi!","kradi!","kradi!","kladi!","kladi!","klidi!","klidi!","kzaji!","kzaji!","kzapi!","kzudi!r","Kaji!","Kaqi!","Kaqi!","Kuqi!","gaji!","gaqi!","gaqi!","guji!","guWi!","guqi!","gfji!","graTi!","Gawi!","GiRi!","Guzi!","GuRi!","Guzi!r","Guzi!r","GfRi!","cakzi!N","caqi!","caqi!","cadi!","capi!","citi!","cuwi!","cuqi!","cubi!","cubi!","cyuti!r","Caji!","Cadi!","Cidi!r","u!Cfdi!r","jasi!","jaji!","jaBi!","ji!","jivi!","jugi!","jfBi!","jyuti!r","waki!","tasi!","tasi!","taki!","tagi!","taqi!","tatri!","tuji!","tuji!","tuji!","tuqi!","tuqi!","tubi!","tubi!","tuhi!r","u!tfdi!r","trasi!","traki!","tragi!","tradi!","triKi!","tvagi!","Taki!","daSi!","daSi!","dasi!","dasi!","daGi!","divi!","duhi!r","dfhi!","dfSi!r","drAkzi!","Davi!","Divi!","Dfji!","DmAkzi!","Draji!","DrAkzi!","Dvaji!","DvAkzi!","RaKi!","wunadi!","Risi!","Riji!r","Riji!","Ridi!","Rivi!","pasi!","pasi!","paci!","paci!","paqi!","paqi!","paTi!","pisi!","piji!","piji!","piji!","piWi!","piqi!","piqi!","pivi!","puwi!","puqi!","puTi!","pfji!","bahi!","bawi!","bidi!","bugi!","buDi!r","u!bundi!r","bfhi!","bfhi!","Baji!","Baqi!","Baqi!","Badi!","Bidi!r","Bidi!","BfSi!","mahi!","mahi!","maki!","maKi!","magi!","maGi!","maGi!","maci!","maWi!","maqi!","maqi!","maqi!","matri!","maTi!","madi!","mAkzi!","miji!","midi!","mivi!","muKi!","muji!","muWi!","muqi!","muqi!","mfqi!","yatri!","yugi!","yuji!r","rahi!","rahi!","raKi!","ragi!","raGi!","raGi!","ravi!","raPi!","rabi!","raBi!","riKi!","rigi!","rici!r","rivi!","ruSi!","rusi!","ruwi!","ruWi!","ruWi!","ruqi!","rudi!r","ruDi!r","laKi!","lagi!","laGi!","laGi!","laGi!","laGi!","laji!","laji!","laji!","laji!","laqi!","o!laqi!","labi!","labi!","laBi!","lACi!","lAji!","liKi!","ligi!","ligi!","liji!","luji!","luji!","luwi!","luWi!","luWi!","luWi!","luqi!","luTi!","lubi!","lubi!","vaki!","vaki!","vaKi!","vagi!","vaGi!","vawi!","vawi!","vawi!","vaWi!","vaqi!","vaqi!","vadi!","vAkzi!","vACi!","vici!r","viji!r","vugi!","bfhi!","bfhi!","vfji!","vraji!","Saki!","Saqi!","SiKi!","SiGi!","Siji!","I!Suci!r","SuWi!","SuWi!","SuWi!","Scuti!r","Scyuti!r","Sraki!","Sragi!","SraTi!","Slaki!","Slagi!","Svaki!","Sragi!","Svaci!","SvaWi!","Svidi!","zasti!","zivi!","skandi!r","skaBi!","skudi!","zwaBi!","spadi!","sPuwi!r","sPuwi!","sPuwi!","sPuqi!","sPuqi!","sraki!","zvaki!","Sragi!","hisi!","hisi!","hiqi!","hivi!","huqi!","huqi!");
$editverbs=array("kaKe!","kage!","kawe!","kvaTe!","cawe!","cate!","cade!","paTe!","maTe!","rage!","lage!","zage!","zWage!","hase!","hrage!","hlage!");
$iditverbs1=array("anh","anh","ank","ang","anG","anc","anj","anW","ant","and","anb","anB","AnC","inK","ing","ind","inv","InK","InK","Inj","unK","unC","unC","kanW","unh","fnj","lanq","kans","kank","kanc","kanW","kanW","kanq","kanq","kanq","kand","kand","kanp","kAnkz","kAnc","kunS","kuns","kunj","kunw","kunW","kunW","kunq","kunq","kunq","kunq","kunT","kundr","kunb","kunb","kunB","kfnv","krand","krand","kland","kland","klind","klind","kzanj","kzanj","kzanp","kzund","Kanj","Kanq","Kanq","Kunq","ganj","ganq","ganq","gunj","gunW","gunq","gfnj","granT","Ganw","GinR","Gunz","GunR","Gunz","Gunz","GfnR","cankz","canq","canq","cand","canp","cint","cunw","cunq","cunb","cunb","cyunt","Canj","Cand","Cind","Cfnd","jans","janj","janB","j","jinv","jung","jfnB","jyunt","wank","tans","tans","tank","tang","tanq","tantr","tunj","tunj","tunj","tunq","tunq","tunb","tunb","tunh","tfnd","trans","trank","trang","trand","trinK","tvang","Tank","danS","danS","dans","dans","danG","dinv","dunh","dfnh","dfnS","drAnkz","Danv","Dinv","Dfnj","DmAnkz","Dranj","DrAnkz","Dvanj","DvAnkz","nanK","nand","nins","ninj","ninj","nind","ninv","pans","pans","panc","panc","panq","panq","panT","pins","pinj","pinj","pinj","pinW","pinq","pinq","pinv","punw","punq","punT","pfnj","banh","banw","bind","bung","bunD","bunnd","bfnh","bfnh","Banj","Banq","Banq","Band","Bind","Bind","BfnS","manh","manh","mank","manK","mang","manG","manG","manc","manW","manq","manq","manq","mantr","manT","mand","mAnkz","minj","mind","minv","munK","munj","munW","munq","munq","mfnq","yantr","yung","yunj","ranh","ranh","ranK","rang","ranG","ranG","ranv","ranP","ranb","ranB","rinK","ring","rinc","rinv","runS","runs","runw","runW","runW","runq","rund","runD","lanK","lang","lanG","lanG","lanG","lanG","lanj","lanj","lanj","lanj","lanq","lanq","lanb","lanb","lanB","lAnC","lAnj","linK","ling","ling","linj","lunj","lunj","lunw","lunW","lunW","lunW","lunq","lunT","lunb","lunb","vank","vank","vanK","vang","vanG","vanw","vanw","vanw","vanW","vanq","vanq","vand","vAnkz","vAnC","vinc","vinj","vung","bfnh","bfnh","vfnj","vranj","Sank","Sanq","SinK","SinG","Sinj","Sunc","SunW","SunW","SunW","Scunt","Scyunt","Srank","Srang","SranT","Slank","Slang","Svank","Srang","Svanc","SvanW","Svind","sanst","sinv","skannd","skanB","skund","stanB","spand","sPunw","sPunw","sPunw","sPunq","sPunq","srank","svank","Srang","hins","hins","hinq","hinv","hunq","hunq");
$iditverbs2=array("ah","ah","ak","ag","aG","ac","aj","aW","at","ad","ab","aB","AC","iK","ig","id","iv","IK","IK","Ij","uK","uC","uC","kaW","uh","fj","laq","kas","kak","kac","kaW","kaW","kaq","kaq","kaq","kad","kad","kap","kAkz","kAc","kuS","kus","kuj","kuw","kuW","kuW","kuq","kuq","kuq","kuq","kuT","kudr","kub","kub","kuB","kfv","krad","krad","klad","klad","klid","klid","kzaj","kzaj","kzap","kzud","Kaj","Kaq","Kaq","Kuq","gaj","gaq","gaq","guj","guW","guq","gfj","graT","Gaw","GiR","Guz","GuR","Guz","Guz","GfR","cakz","caq","caq","cad","cap","cit","cuw","cuq","cub","cub","cyut","Caj","Cad","Cid","Cfd","jas","jaj","jaB","j","jiv","jug","jfB","jyut","wak","tas","tas","tak","tag","taq","tatr","tuj","tuj","tuj","tuq","tuq","tub","tub","tuh","tfd","tras","trak","trag","trad","triK","tvag","Tak","daS","daS","das","das","daG","div","duh","dfh","dfS","drAkz","Dav","Div","Dfj","DmAkz","Draj","DrAkz","Dvaj","DvAkz","naK","nad","nis","nij","nij","nid","niv","pas","pas","pac","pac","paq","paq","paT","pis","pij","pij","pij","piW","piq","piq","piv","puw","puq","puT","pfj","bah","baw","bid","bug","buD","bund","bfh","bfh","Baj","Baq","Baq","Bad","Bid","Bid","BfS","mah","mah","mak","maK","mag","maG","maG","mac","maW","maq","maq","maq","matr","maT","mad","mAkz","mij","mid","miv","muK","muj","muW","muq","muq","mfq","yatr","yug","yuj","rah","rah","raK","rag","raG","raG","rav","raP","rab","raB","riK","rig","ric","riv","ruS","rus","ruw","ruW","ruW","ruq","rud","ruD","laK","lag","laG","laG","laG","laG","laj","laj","laj","laj","laq","laq","lab","lab","laB","lAC","lAj","liK","lig","lig","lij","luj","luj","luw","luW","luW","luW","luq","luT","lub","lub","vak","vak","vaK","vag","vaG","vaw","vaw","vaw","vaW","vaq","vaq","vad","vAkz","vAC","vic","vij","vug","bfh","bfh","vfj","vraj","Sak","Saq","SiK","SiG","Sij","Suc","SuW","SuW","SuW","Scut","Scyut","Srak","Srag","SraT","Slak","Slag","Svak","Srag","Svac","SvaW","Svid","sast","siv","skand","skaB","skud","zwaB","spad","sPuw","sPuw","sPuw","sPuq","sPuq","srak","svak","Srag","his","his","hiq","hiv","huq","huq");
$irendiditverbs=array("﻿uhi!r","kzudi!r","Guzi!r","Guzi!r","cyuti!r","Cidi!r","u!Cfdi!r","jyuti!r","tuhi!r","u!tfdi!r","duhi!r","dfSi!r","Riji!r","buDi!r","u!bundi!r","Bidi!r","yuji!r","rici!r","rudi!r","ruDi!r","vici!r","viji!r","I!Suci!r","Scuti!r","Scyuti!r","skandi!r","sPuwi!r");
$Uditverbs=array("akzU!","takzU!","tvakzU!","gfhU!","mfjU!","aSU!","vfhU!","tfMhU!","kzamU!","klidU!","aYjU!","kliSU!","ziDU!","trapU!z","kzamU!z","gAhU!","guhU!","syandU!","kfpU!","gupU!","o!vraScU!","tfhU!","stfhU!","taYcU!",);
$AkArAntaverbs=array("KyA","gAN","gA","GrA","jYA","jYA","jyA","daridrA","qudAY","dAR","dAp","drA","quDAY","DmA","pA","pA","prA","psA","BA","mAN","mA","mAN","mnA","yA","rA","lA","vA","SrA","SrA","zWA","zRA","o!hAN","o!hAk");
$nonuniqueverbs=array("ahi!","aYcu!","aYcu!","awwa!","aRa!","aqqa!","ana!","ama!","aya!","arca!","arja!","arda!","arha!","arha!","asa!","Apx!","iN","ik","ila!","iza!","iza!","IKi!","Iqa!","Ira!","Iza!","uCI!","uCi!","uWa!","ujJa!","f","f","fDu!","ejf!","ezf!","kaqa!","kaRa!","kaRa!","kaWi!","kaWi!","kaqi!","kaqi!","katra!","kaqqa!","kadi!","kala!","kala!","kasa!","kASf!","kiwa!","kita!","kuN","kuca!","kuca!","kuwa!","kuwwa!","kuRa!","kuWi!","kuqi!","kuqi!","kuqi!","kupa!","kubi!","kUwa!","kURa!","kfY","kftI!","kfpa!","kfza!","kF","kfpU!","kradi!","kladi!","klidi!","kzaji!","kzi","kzi","kzipa!","kzuBa!","kzuBa!","kzura!","YikzvidA!","YikzvidA!","Kaqi!","Kida!","Kida!","gaja!","gaqi!","garja!","garda!","garva!","garha!","gala!","guN","guja!","guDa!","gupa!","gupa!","gF","gF","granTa!","granTa!","glepf!","Gawa!","Gawa!","Gawwa!","Guwa!","GuRa!","Guzi!r","GUrRa!","Gf","Gf","caka!","caqi!","cana!","capa!","camu!","cara!","carca!","carca!","cala!","cala!","caha!","caha!","ciY","cIva!","cuwa!","cuqqa!","cubi!","cUrRa!","Cada!","Cada!","jartsa!","jartsa!","jala!","jasu!","jasu!","ji","ci","ci","juqa!","juqa!","jF","jYA","jri","jvala!","Jartsa!","Jartsa!","Jaza!","qipa!","qipa!","qipa!","qIN","tasi!","taqa!","tanu!","tapa!","tapa!","tarja!","tija!","tila!","tila!","tuja!","tuji!","tuji!","tuqi!","tupa!","tuPa!","tuBa!","tuBa!","tumpa!","tumPa!","tubi!","tfpa!","tfpa!","tfpa!","tfpa!","truwa!","daSi!","dasi!","dakza!","dala!","divu!","divu!","dfpa!","dfpa!","dfBI!","dF","dF","DU","DUY","DUY","DUpa!","DUpa!","DfN","u!Drasa!","Dru","Dvana!","Dvana!","nawa!","Rawa!","RaBa!","RaBa!","Ruda!","RU","nF","pasi!","pakza!","paci!","pawa!","pawa!","paqi!","pada!","pala!","pA","piji!","piji!","piqi!","piSa!","puwa!","puwa!","puwa!","puqa!","puRa!","puTa!","pula!","puza!","puza!","puza!","puza!","pUrI!","purva!","pUla!","pf","pfcI!","pF","pF","pelf!","praTa!","prIY","pluza!","pluza!","baDa!","banDa!","barha!","barha!","bala!","balha!","bila!","bukka!","buDa!","busa!","bfhi!","Bakza!","Baja!","Bawa!","Baqi!","Bala!","BAma!","BU","BU","BUza!","BraMSu!","Bramu!","Brasja!","mahi!","maGi!","maqi!","maqi!","manTa!","maska!","wumasjo!","maha!","mAN","mana!","mAna!","mAna!","YimidA!","mila!","muwa!","muwa!","muqi!","muda!","mUla!","mfjU!","mfqa!","mfza!","mrakza!","mrakza!","mleCa!","yama!","yu","yuja!","rahi!","raGi!","raYja!","rawa!","rawa!","raRa!","rasa!","raha!","raha!","ri","riza!","ruwa!","ruwa!","ruWi!","ruza!","ruza!","lakza!","laGi!","laGi!","laGi!","laja!","laja!","laji!","laji!","laji!","laqa!","o!laqi!","labi!","lala!","lasa!","o!lasjI!","liKa!","ligi!","liSa!","lI","luji!","luwa!","luwa!","luwa!","luwa!","luWa!","luWa!","luWa!","luqa!","luWi!","luWi!","luBa!","lubi!","lUza!","lokf!","locf!","vaki!","vaca!","vaYcu!","vawa!","vawa!","vawa!","vawi!","vawi!","vaqi!","vada!","vanu!","vana!","vaBra!","varRa!","barha!","varha!","balha!","vasa!","vasa!","vasa!","vaska!","bAhf!","viCa!","o!vijI!","vida!","vida!","vida!","vila!","vizka!","visa!","bisa!","vfY","bfhi!","bfhi!","vfjI!","vfjI!","vftu!","vftu!","vfDu!","bfha!","vehf!","vella!","vyaya!","vyaya!","vyuza!","vyusa!","vraja!","vraja!","vraRa!","vraRa!","SaWa!","SaWa!","SaWa!","Sadx!","Sapa!","Sala!","Siza!","SIka!","SIla!","SuWa!","SuWi!","SuWi!","SunDa!","SuBa!","SuBa!","SumBa!","SfDu!","SfDu!","sraMsu!","SraRa!","SraTa!","SraTa!","SraTa!","SranTa!","SranTa!","SrA","Sliza!","Sragi!","SvaWa!","zWivu!","zvaska!","zaca!","satra!","zadx!","zaha!","zaha!","sAra!","ziY","zu","zUN","zUda!","sf","sfja!","zwupa!","zwUpa!","zRiha!","spaSa!","sPuwa!","sPuwa!","sPuwi!","sPuqi!","zmiN","smf","smf","sraMsu!","sramBu!","Sragi!","zvada!","svana!","zvaska!","zvaska!","svAda!","hisi!","huqi!","hula!","heWa!","heWa!","hoqf!","hrasa!","hvf");
$ghaTAdi_mit=array("kaKe!","rage!","lage!","hvage!","hlage!","zage!","zwage!","kage!","Gawa!","vyaTa!","praTa!","prasa!","mrada!","sKada!","dakza!","heqa!","krapa!","YitvarA!","jvara!","gaqa!","nawa!","Bawa!","Rawa!","caka!","aka!","aga!","kuRa!","raRa!","caRa!","SaRa!","SraRa!","SraTa!","SlaTa!","kraTa!","klaTa!","vana!","jvala!","hvala!","hmala!","zfka!","kzaji!","kadi!","kradi!","kladi!","smf"); // dhAtus 914 to 927 not included. Pending. It needs user input to decide the meaning. See p 91 of sahajabodha 1.
$mitcurAdiverbs=array("jYapa!","yama!","caha!","raha!","bala!","ciY",);
$ugitverbs=array("akzU!","acu!","aYjU!","aSU!","asu!","Apx!","Apx!","ASAsu!","fRu!","fDu!","fDu!","ejf!","ejf!","ezf!","ezf!","oKf!","oRf!","kabf!","kamu!","kASf!","kASf!","kAsf!","kuju!","kudf!","kfpU!","kfpU!","kepf!","kelf!","kevf!","knasu!","kramu!","krIqf!","klamu!","klidU!","kliSU!","klIbf!","kzaRu!","kzamU!","kzamU!z","kziRu!","kzivu!","kzIbf!","kzIvf!","kzevu!","kzvelf!","Kanu!","KAdf!","Kuju!","Kelf!","Kevf!","Korf!","Kolf!","gamx!","gADf!","gAhU!","gupU!","guhU!","gfhU!","gfDu!","gepf!","gevf!","gezf!","grasu!","grucu!","glasu!","glucu!","glepf!","glepf!","glevf!","glezf!","Gasx!","GfRu!","Gfzu!","DrAGf!","cakAsf!","caYcu!","camu!","camu!","cAyf!","cIbf!","cIBf!","cIvf!","celf!","Camu!","u!Cfdi!r","jamu!","jasu!","jasu!","jasu!","jimu!","jizu!","jutf!","jezf!","jehf!","Jamu!","wikf!","wIkf!","QOkf!","takzU!","taYcu!","taYcU!","tanu!","tanu!","tamu!","tasu!","tAyf!","tikf!","tipf!","tIkf!","tuqf!","tUqf!","tfMhU!","tfRu!","u!tfdi!r","tfhU!","tepf!","tevf!","trapU!z","trOkf!","tvakzU!","tvaYcu!","damu!","damBu!","dasu!","dASf!","dAsf!","divu!","divu!","divu!","devf!","drAKf!","drAGf!","drAqf!","drAhf!","drekf!","DAvu!","Depf!","Dorf!","u!Drasa!","u!Drasa!","DrAKf!","DrAqf!","Drekf!","DvaMsu!","nATf!","nADf!","RAsf!","Ridf!","Rizu!","Redf!","Rezf!","patx!","pelf!","pizx!","pisf!","pfzu!","pelf!","pevf!","pezf!","pesf!","pERf!","pruzu!","prezf!","prERf!","proTf!","pluzu!","plevf!","Pelf!","basu!","bADf!","bAhf!","bIBf!","u!bundi!r","bfhU!","vehf!","Basu!","BAsf!","BfMSu!","BfSu!","Bezf!","BraMSu!","BraMSu!","BraMsu!","Bramu!","Bramu!","wuBrAjf!","BrAjf!","wuBrASf!","Brejf!","Brezf!","wuBlASf!","Blezf!","manu!","mAhf!","miTf!","midf!","miDf!","mizu!","mImf!","mucx!","mfjU!","mfjU!","mfDu!","mfzu!","meTf!","medf!","meDf!","mepf!","mevf!","mrucu!","mruYcu!","mrewf!","mreqf!","mlucu!","mluYcu!","mlewf!","mlevf!","yasu!","wuyAcf!","yutf!","yezf!","yOwf!","ramu!","rAKf!","rAGf!","rAjf!","rAsf!","rekf!","rejf!","rewf!","repf!","reBf!","revf!","rezf!","roqf!","rOqf!","lAKf!","lAGf!","lupx!","lepf!","lokf!","lokf!","locf!","locf!","loqf!","vaYcu!","vaYcu!","vanu!","vanu!","vasu!","vAvftu!","vASf!","bAhf!","viTf!","vidx!","vizu!","vizx!","vftu!","vftu!","vftu!","vfDu!","vfDu!","vfzu!","vfhU!","veRf!","veTf!","venf!","velf!","vehf!","o!vraScU!","SaMsu!","Sakx!","Sadx!","Sadx!","Samu!","Sasu!","SAKf!","SAqf!","SAsu!","Sizx!","SIkf!","SIBf!","SfDu!","SfDu!","SfDu!","Self!","Sevf!","SoRf!","SOwf!","syandU!","sraMsu!","sraMsu!","Sramu!","SramBu!","Srizu!","SroRf!","SlAKf!","SlAGf!","Slizu!","Slokf!","SloRf!","zWivu!","zWivu!","zadx!","zadx!","zanu!","ziDU!","ziDu!","ziBu!","zimBu!","zivu!","sIkf!","sfpx!","zfBu!","zfmBu!","sekf!","zelf!","zevf!","skamBu!","skumBu!","stamBu!","zwipf!","zwuBu!","stumBu!","stfhU!","zwepf!","zRasu!","zRusu!","syamu!","sraMsu!","sramBu!","sramBu!","srivu!","srekf!","srokf!","huqf!","hUqf!","hfzu!","heqf!","hepf!","hezf!","hoqf!","hoqf!","hrezf!");
$curAdi_optionalNic_idud=array("pUrI!","ancu!","divu!","jasu!","SfDu!","vftu!","vfDu!","tanu!","uDrasa!","mfjU!","vaYcu!","BU","kfpa!","grasa!","dala!","ruja!","puza!","ji","ci","paw","ciY","pawa!","Gawa!","Rada!","nawa!","taqa!","nala!","puwa!","luwa!","gupa!","puTa!","kupa!","ruwa!","vftu!","vfDu!","tuji!","miji!","piji!","luji!","Baji!","laDi!","trasi!","pisi!","kusi!","daSi!","kuSi!","Gawi!","bfhi!","laji!","aji!","dasi!","BfSi!","ruSi!","rusi!","puwi!","raGi!","laGi!","ahi!","rahi!","mahi!","laqi!","vicCa!","cIva!","lokf!","locf!","tarka!","SIka!","DUpa!",);
$curAdi_optionalNic_Asvada=array("grasa!","dala!","ruja!","puza!","ji","ci","paw","ciY","pawa!","Gawa!","Rada!","nawa!","taqa!","nala!","puwa!","luwa!","gupa!","puTa!","kupa!","ruwa!","vftu!","vfDu!","tuji!","miji!","piji!","luji!","Baji!","laDi!","trasi!","pisi!","kusi!","daSi!","kuSi!","Gawi!","bfhi!","laji!","aji!","dasi!","BfSi!","ruSi!","rusi!","puwi!","raGi!","laGi!","ahi!","rahi!","mahi!","laqi!","vicCa!","cIva!","lokf!","locf!","tarka!","SIka!","DUpa!","pUrI!");
$curAdi_optionalNic_AdhRSIya=array("lI","jri","mI","prIY","BU","DUY","vfY","jF","zaha!","tapa!","SraTa!","Cada!","tanu!","vada!","vaca!","Asada!","rica!","Siza!","yuja!","juza!","pfca!","vfjI!","tfpa!","CfdI!","dfBI!","dfBa!","mfjU!","mfza!","Dfza!","granTa","granTa!","SranTa","SunDa!","hisi!","kaWi!","arca!","Ira!","SIka!","cIka!","arda!","arha!","Aplx!","mAna!","garha!","mArga!",);
$curAdi_optionalNic_extra=array("garva!","arTa!","mUtra!","karta!","pata!","pata");
$curAdi_optionalNic=array_merge($curAdi_optionalNic_AdhRSIya,$curAdi_optionalNic_Asvada,$curAdi_optionalNic_extra,$curAdi_optionalNic_idud);
$AkusmIya=array("yu","gf","qapa!","spaSa!","lala!","SaWa!","smaya!","Sama!","gala!","Bala!","mada!","cita!","qipa!","divu!","vida!","truwa!","vfza!","tarja!","daSi!","tatri!","matri!","Bartsa!","basta!","ganDa!","vizka!","nizka!","kURa!","tURa!","BrURa!","yakza!","gUra!","lakza!","kutsa!","kUwa!","kuwwa!","vaYcu!","mAna!","kusma!");
$AgarvIya=array("pada","gfha","mfga","kuha","SUra","vIra","sTUla","sTUla","satra","arTa","garva");
$curAdi_adanta=array("pada","gfha","mfga","kuha","SUra","vIra","sTUla","sTUla","satra","arTa","garva","kaTa","vara","gaRa","SaWa","SvaWa","pawa","vawa","raha","stana","gadI!","pata","paza","svara","raca","kala","caha","maha","sAra","kfpa","SraTa","spfha","BAma","sUca","Kewa","Kowa","kzowa","goma","kumAra","SIla","sAma","vela","kAla","palyUla","vAta","gaveza","vAsa","nivAsa","BAja","saBAja","Una","Dvana","kUwa","saMketa","grAma","kuRa","guRa","keta","kUwa","stena","sUtra","mUtra","rUkza","pAra","tIra","puwa","Deka","katra","vazka","citra","aMsa","vawa","laja","vawi!","laji!","miSra","saNgrAma","Cidra","anDa","daRqa","aNka","aNga","suKa","duHKa","rasa","vyaya","rUpa","Ceda","Cada","lABa","vraRa","varRa","parRa","vizka","kzipa","vasa","tutTa");
$tudAdi_mucAdi=array("muc","lup","vid","lip","zic","Kid","kft","piS");
$tudAdi_kuTAdi=array("kuN","gu","Dru","RU","DU","kaqa!","qipa!","kuca!","guja!","kuwa!","Guwa!","cuwa!","Cuwa!","juqa!","tuwa!","puwa!","muwa!","truwa!","luwa!","sPuwa!","kuqa!","kruqa!","guqa!","cuqa!","tuqa!","Tuqa!","puqa!","vruqa!","sTuqa!","sPuqa!","gurI!","Cura!","sPura!","sPula!","kfqa!","mfqa!",);
$tudAdi=array("ila!","iza!","uCI!","ujJa!","uCi!","ujJa!","ubja!","uBa!","umBa!","fca!","fCa!","fPa!","fmPa!","fzI!","kaqa!","kila!","kuN","kuca!","kuwa!","kuqa!","kuRa!","kura!","kUN","kfqa!","kftI!","kfza!","kF","kruqa!","kzi","kzipa!","kzura!","Kida!","Kuqa!","Kura!","gu","guja!","guqa!","guPa!","gumPa!","gurI!","gF","Guwa!","GuRa!","Gura!","GUrRa!","carca!","cala!","cila!","cuwa!","cuqa!","cftI!","Cuwa!","Cuqa!","Cupa!","Cura!","jarja!","juwa!","juqa!","juqa!","juna!","juzI!","JarJa!","qipa!","tila!","tuwa!","tuqa!","tuRa!","tuda!","tupa!","tuPa!","tumpa!","tumPa!","tfMhU!","tfpa!","tfPa!","tfmpa!","tfmPa!","tfhU!","truwa!","tvaca!","Tuqa!","diSa!","dfN","dfpa!","dfPa!","dfBI!","dfmpa!","dfmPa!","druRa!","Di","DU","DU","DfN","Dru","Rila!","RU","Ruda!","Ruda!","RU","pi","piSa!","puwa!","puqa!","puRa!","pura!","pfN","pfqa!","pfRa!","praCa!","bila!","bfhU!","Bujo!","Bfqa!","Brasja!","Brasja!","wumasjo!","wumasjo!","miCa!","mila!","mila!","miza!","mucx!","muwa!","muRa!","mura!","mfN","mfqa!","mfRa!","mfSa!","ri","riPa!","riSa!","riha!","rujo!","ruSa!","o!lajI!","o!lasjI!","o!lasjI!","liKa!","lipa!","liSa!","luwa!","luWa!","luqa!","lupx!","luBa!","viCa!","o!vijI!","vidx!","viDa!","vila!","viSa!","vfRa!","vfhU!","vyaca!","o!vraScU!","vruqa!","Sadx!","Sila!","Suna!","SuBa!","SumBa!","zadx!","zica!","zila!","zura!","zU","sfja!","stfhU!","sTuqa!","spfSa!","sPara!","sPala!","sPuwa!","sPuqa!","sPura!","sPula!","hila!","huqa!");
$divAdi_puSAdi=array("Saka!","madI!","raDa!","RaBa!","klamu!","kzamu!","tamu!","damu!","Bramu!","Samu!","Sramu!","RaSa!","asu!","jasu!","tasu!","dasu!","vasu!","yasu!","masI!","klidU!","YikzvidA!","YimidA!","YizvidA!","ziDu!","qipa!","riza!","Sliza!","bisa!","zRiha!","uca!","luwa!","kruDa!","kzuDa!","SuDa!","kupa!","gupa!","yupa!","rupa!","lupa!","kzuBa!","tuBa!","luBa!","tuza!","duza!","puza!","Suza!","pluza!","ruza!","vyuza!","busa!","druha!","muha!","zRuha!","fDu!","kfSa!","gfDu!","tfpa!","dfpa!","BfSu!","vfSa!","tfzA!","hfza!","kuMsa!","BraMSu!",);
$bhvAdi_dyutAdi=array("RaBa!","YiSvitA!","YimidA!","YizvidA!","ruca!","Guwa!","ruwa!","luwa!","luWa!","dyuta!","kzuBa!","tuBa!","SuBa!","vftu!","vfDu!","SfDu!","syandU!","kfpU!","sraMBu!","BraMSu!","DvaMsu!","BraMsu!","sraMsu!",);
$lRdit=array("Sakx!","patx!","Sadx!","zadx!","gamx!","Gasx!","vidx!","Sizx!","pizx!","vizx!","mucx!","lupx!","kfpx!","Apx!");
$Rditverbs=array("ejf!","ejf!","ezf!","ezf!","oKf!","oRf!","kabf!","kASf!","kASf!","kAsf!","kudf!","kepf!","kelf!","kevf!","krIqf!","klIbf!","kzIbf!","kzIvf!","kzvelf!","KAdf!","Kelf!","Kevf!","Korf!","Kolf!","gADf!","gepf!","gevf!","gezf!","glepf!","glepf!","glevf!","glezf!","DrAGf!","cakAsf!","cAyf!","cIbf!","cIBf!","cIvf!","celf!","jutf!","jezf!","jehf!","wikf!","wIkf!","QOkf!","tAyf!","tikf!","tipf!","tIkf!","tuqf!","tUqf!","tepf!","tevf!","trOkf!","dASf!","dAsf!","devf!","drAKf!","drAGf!","drAqf!","drAhf!","drekf!","Depf!","Dorf!","DrAKf!","DrAqf!","Drekf!","nATf!","nADf!","RAsf!","Ridf!","Redf!","Rezf!","pelf!","pisf!","pelf!","pevf!","pezf!","pesf!","pERf!","prezf!","prERf!","proTf!","plevf!","Pelf!","bADf!","bAhf!","bIBf!","vehf!","BAsf!","Bezf!","wuBrAjf!","BrAjf!","wuBrASf!","Brejf!","Brezf!","wuBlASf!","Blezf!","mAhf!","miTf!","midf!","miDf!","mImf!","meTf!","medf!","meDf!","mepf!","mevf!","mrewf!","mreqf!","mlewf!","mlevf!","wuyAcf!","yutf!","yezf!","yOwf!","rAKf!","rAGf!","rAjf!","rAsf!","rekf!","rejf!","rewf!","repf!","reBf!","revf!","rezf!","roqf!","rOqf!","lAKf!","lAGf!","lepf!","lokf!","lokf!","locf!","locf!","loqf!","vASf!","bAhf!","viTf!","veRf!","veTf!","venf!","velf!","vehf!","SAKf!","SAqf!","SIkf!","SIBf!","Self!","Sevf!","SoRf!","SOwf!","SroRf!","SlAKf!","SlAGf!","Slokf!","SloRf!","sIkf!","sekf!","zelf!","zevf!","zwipf!","zwepf!","srekf!","srokf!","huqf!","hUqf!","heqf!","hepf!","hezf!","hoqf!","hoqf!","hrezf!");
// list of 10 gaNas and some upagaNas. With accent, devanagari
$bhvAdi1=array("अ॑हिँ॒","अ॑कँ॑","अ॑क्षूँ॑","अ॑गँ॑","अ॑किँ॒","अ॑गिँ॑","अ॑घिँ॒","अ॑चुँ॒॑","अ॑जँ॑","अ॑चिँ॑","अ॑ञ्चुँ॑","अ॑ञ्चुँ॒॑","अ॑टँ॑","अ॑ट्टँ॒","अ॑डँ॑","अ॑ड्डँ॑","अ॑णँ॑","अ॑ठिँ॒","अ॑तँ॑","अ॑ड्डँ॑","अ॑तिँ॑","अ॑दिँ॑","अ॑भ्रँ॑","अ॑मँ॑","अ॑बिँ॒","अ॑भिँ॒","अ॑यँ॒","अ॑यँ॒॑","अ॑र्घँ॑","अ॑र्चँ॑","अ॑र्जँ॑","अ॑र्दँ॑","अ॑र्बँ॑","अ॑र्वँ॑","अ॑र्हँ॑","अ॑लँ॑","अ॑वँ॑","अ॑षँ॒॑","अ॑सँ॒॑","आ॑छिँ॑","आ॑शसि","इ॑खँ॑","इ॑खिँ॑","इ॑गिँ॑","इ॑टँ॑","इ॑दिँ॑","इ॑विँ॑","ई॑क्षँ॒","ई॑खिँ॑","ई॑खिँ॑","ई॑ज॒","ई॑जिँ॒","ई॑र्क्ष्यँ॑","ई॑र्ष्यँ॑","ई॑षँ॑","ई॑षँ॒","ई॑हँ॒","उ॒ङ्","उ॑क्षँ॑","उ॑खँ॑","उ॑खिँ॑","उ॑छीँ॑","उ॑छिँ॑","उ॑ठँ॑","उ॑ठँ॒","उ॑र्दँ॒","उ॑र्वीँ॑","उ॑षँ॑","उ॑हिँ॑र्","ऊ॑ठँ॑","ऊ॑यीँ॒","ऊ॑षँ॑","ऊ॑हँ॒","ऋ॒","ऋ॑जँ॒","ऋ॑जिँ॒","ए॑जृँ॒","ए॑जृँ॑","ए॑ठँ॒","ए॑धँ॒","ए॑षृँ॒","ए॑षृँ॒","ओ॑खृँ॑","ओ॑णृँ॑","क॑कँ॒","क॑खँ॑","क॑खेँ॑","क॑गेँ॑","क॑किँ॒","क॑चँ॒","क॑जँ॑","क॑चिँ॒","क॑टीँ॑","क॑टेँ॑","क॑ठँ॑","क॑डँ॑","क॑ड्डँ॑","क॑णँ॑","क॑णँ॑","क॑ठिँ॒","क॑डिँ॑","क॑डिँ॒","क॑त्थँ॒","क॑दँ॒","क॑ड्डँ॑","क॑नीँ॑","क॑दिँ॑","क॑दिँ॒","क॑पँ॒","क॑बृँ॒","क॑मुँ॒","क॑पिँ॒","क॑र्जँ॑","क॑र्दँ॑","क॑र्बँ॑","क॑र्वँ॑","क॑लँ॒","क॑ल्लँ॒","क॑षँ॑","क॑सँ॑","का॑क्षिँ॑","का॑चिँ॒","का॑शृँ॒","का॑सृँ॒","कि॑टँ॑","कि॑टँ॑","कि॑तँ॑","की॑लँ॑","कु॒ङ्","कु॑कँ॒","कु॑चँ॑","कु॑चँ॑","कु॑जुँ॑","कु॑ञ्चँ॑","कु॑जिँ॑","कु॑टिँ॑","कु॑ठिँ॑","कु॑डिँ॒","कु॑डिँ॑","कु॑थिँ॑","कु॑बिँ॑","कु॑र्द॒","कु॑लँ॑","कू॑जँ॑","कू॑लँ॑","कृ॒ञ्","कृ॑विँ॑","कृ॑पँ॒","कृ॑पूँ॒","कृ॒षँ॑","कृ॑पूँ॒","के॑पृँ॒","के॑लृँ॑","के॑वृँ॒","कै॒","क्न॑थँ॑","क्नू॑यीँ॒","क्म॑रँ॑","क्र॑थँ॑","क्र॑दँ॒","क्र॑दिँ॑","क्र॑दिँ॒","क्र॑पँ॒","क्र॑मुँ॑","क्री॑डृँ॑","क्रु॑ञ्चँ॑","क्रु॒शँ॑","क्ल॑थँ॑","क्ल॑दँ॒","क्ल॑दिँ॑","क्ल॑दिँ॒","क्लि॑दिँ॒","क्लि॑दिँ॑","क्ली॑बृँ॒","क्लु॒ङ्","क्ले॑शँ॒","क्व॑णँ॑","क्व॑थेँ॑","क्ष॑जिँ॒","क्ष॒प॑य॒॑श्च॑","क्ष॑मूँ॒ष्","क्ष॑रँ॑","क्षि॒","क्षि॑वुँ॑","क्षी॑जँ॑","क्षी॑बृँ॒","क्षी॑वृँ॒","क्षु॑भँ॒","क्षु॑रँ॑","क्षे॑वुँ॑","क्षै॒","क्ष्मा॑यीँ॒","क्ष्मी॑लँ॑","ञिक्ष्वि॑दाँ॑","ञिक्ष्वि॑दाँ॑","क्ष्वे॑लृँ॑","ख॑जँ॑","ख॑जिँ॑","ख॑टँ॑","ख॑डिँ॒","ख॑दँ॑","ख॑नुँ॒॑","ख॑र्जँ॑","ख॑र्दँ॑","ख॑र्बँ॑","ख॑र्वँ॑","ख॑लँ॑","ख॑षँ॑","खा॑दृँ॑","खि॑टँ॑","खु॒ङ्","खु॑जुँ॑","खु॑र्द॒","खे॑लृँ॑","खे॑वृँ॒","खै॒","खो॑रृँ॑","खो॑लृँ॑","ग॑जँ॑","ग॑जिँ॑","ग॑डँ॑","ग॑डिँ॑","ग॑डिँ॑","ग॑दँ॑","ग॒मॢँ॑","ग॑र्जँ॑","ग॑र्दँ॑","ग॑र्बँ॑","ग॑र्वँ॑","ग॑र्हँ॒","ग॑लँ॑","ग॑ल्भँ॒","ग॑ल्हँ॒","गा॒ङ्","गा॑धृँ॒","गा॑हूँ॒","गु॒ङ्","गु॒ङ्","गु॑जँ॑","गु॑जिँ॑","गु॑दँ॒","गु॑पँ॒","गु॑पूँ॑","गु॑र्द॒","गु॑र्वीँ॑","गु॑हूँ॒॑","गृ॑हूँ॒","गृ॒","गृ॑जँ॑","गृ॑जिँ॑","गे॑पृँ॒","गे॑वृँ॒","गे॑षृँ॒","गै॒","गो॑ष्टँ॒","ग्र॑थिँ॒","ग्र॑सुँ॒","ग्रु॑चुँ॑","ग्ल॑सुँ॒","ग्ल॑हँ॒","ग्लु॑चुँ॑","ग्लु॑ञ्चँ॑","ग्ले॑पृँ॒","ग्ले॑पृँ॒","ग्ले॑वृँ॒","ग्ले॑षृँ॑","ग्लै॒","घ॑ग्घँ॑","घ॑घँ॑","घ॑टँ॒","घ॑ट्टँ॒","घ॑षँ॒","घ॑सॢँ॑","घि॑णिँ॒","घु॒ङ्","घु॑षिँ॒","घु॑टँ॒","घु॑णँ॒","घु॑णिँ॒","घु॑षिँ॑र्","घू॑र्णँ॒","घृ॒","घृ॑णिँ॒","घृ॑षुँ॑","घ्रा॒","ध्रा॑घृँ॒","ङु॑ङ्","च॑कँ॑","च॑कँ॒","च॑ञ्चुँ॑","च॑टेँ॑","च॑णँ॑","च॑डिँ॒","च॑तेँ॒॑","च॑देँ॒॑","च॑नँ॑","च॑दिँ॑","च॑पँ॑","च॑मुँ॑","च॑यँ॒","च॑रँ॑","च॑र्चँ॑","च॑र्बँ॑","च॑र्वँ॑","च॑लँ॑","च॑षँ॒॑","च॑हँ॑","चा॑यृँ॒॑","चि॑टँ॑","चि॑तीँ॑","चि॑ल्लँ॑","ची॑बृँ॒॑","ची॑भृँ॒","ची॑वृँ॒॑","चु॑च्यँ॑","चु॑ड्डँ॑","चु॑डिँ॑","चु॑ड्डँ॑","चु॑पँ॑","चु॑बिँ॑","चु॑ल्लँ॑","चू॑षँ॑","चे॑लृँ॑","चे॑ष्टँ॒","च्यु॑तिँ॑र्","छ॑मुँ॑","छ॑षँ॒॑","ज॑जँ॑","ज॑जिँ॑","ज॑टँ॑","ज॑पँ॑","ज॑भीँ॒","ज॑मुँ॑","ज॑र्त्सँ॑","ज॑र्त्सँ॑","ज॑र्त्सँ॑","ज॑लँ॑","ज॑ल्पँ॑","ज॑षँ॑","जि॒","जिँ॒","जि॑विँ॑","जि॑मुँ॑","जि॑षुँ॑","जी॑वँ॑","जु॒ङ्","जु॒","जु॑गिँ॑","जु॑तृँ॒","जू॑षँ॑","जृ॑भिँ॒","जे॑षृँ॒","जे॑हृँ॒","जै॒","ज्यु॒ङ्","ज्यु॑तिँ॑र्","ज्रि॒","ज्व॑रँ॑","ज्व॑लँ॑","ज्व॑लँ॑","झ॑टँ॑","झ॑मुँ॑","झ॑र्त्सँ॑","झ॑र्त्सँ॑","झ॑र्त्सँ॑","झ॑षँ॑","झ॑षँ॒॑","ट॑लँ॑","टि॑कृँ॒","टी॑कृँ॒","ट्व॑लँ॑","डी॑ङ्","ढौ॑कृँ॒","त॑सिँ॑","त॑कँ॑","त॑क्षूँ॑","त॑क्षँ॑","त॑किँ॑","त॑गिँ॑","त॑ञ्चुँ॑","त॑टँ॑","त॑डिँ॒","त॒पँ॑","त॑यँ॒","त॑र्जँ॑","त॑र्दँ॑","ता॑यृँ॒","ति॑कृँ॒","ति॑जँ॒","ति॒पृँ॒","ति॑लँ॑","ति॑ल्लँ॑","ती॑कृँ॒","ती॑वँ॑","तु॑जँ॑","तु॑जिँ॑","तु॑डृँ॑","तु॑डिँ॒","तु॑पँ॑","तु॑फँ॑","तु॑भँ॒","तु॑म्पँ॑","तु॑म्फँ॑","तु॑बिँ॑","तु॑र्वी॑","तु॑सँ॑","तु॑हिँ॑र्","तू॑डृँ॑","तू॑लँ॑","तू॑षँ॑","तृ॑क्षँ॑","तॄ॑","ते॑जँ॑","ते॑पृँ॒","ते॑वृँ॒","त्य॒जँ॑","त्र॑क्षँ॑","त्र॑खँ॑","त्र॑किँ॒","त्र॑गिँ॑","त्र॑दिँ॑","त्र॑पूँ॒ष्","त्रि॑खिँ॑","त्रु॑पँ॑","त्रु॑फँ॑","त्रु॑म्पँ॑","त्रु॑म्फँ॑","त्रै॒ङ्","त्रौ॑कृँ॒","त्व॑क्षूँ॑","त्व॑गिँ॑","त्व॑ञ्चुँ॑","ञित्व॑राँ॒","त्वि॒षँ॒॑","त्स॑रँ॑","थ॑किँ॑","थु॑र्वी॑","दं॒शँ॑","द॑क्षँ॒","द॑क्षँ॒","द॑घिँ॑","द॑दँ॒","द॑धँ॒","द॑यँ॒","द॑लँ॑","द॒हँ॑","दा॒ण्","दा॑नँ॒॑","दा॑शृँ॒॑","दा॑सृँ॒॑","दि॑विँ॑","दी॑क्षँ॒","दु॒","दु॑र्वीँ॑","दु॑हिँ॑र्","दृ॑हिँ॑","दृ॑हँ॑","दॄ॑","दे॒ङ्","दे॑वृँ॒","दै॒प्","दृ॒शिँ॑र्","द्यु॑तँ॒","द्यै॒","द्र॑मँ॑","द्रा॑खृँ॑","द्रा॑घृँ॒","द्रा॑क्षिँ॑","द्रा॑डृँ॒","द्रा॑हृँ॒","द्रु॒","द्रे॑कृँ॒","द्रै॒","द्वृ॒","ध॑णँ॑","ध॑विँ॑","धा॑वुँ॒॑","धि॑क्षँ॒","धि॑विँ॑","धु॑क्षँ॒","धु॑र्वीँ॑","धू॑पँ॑","धृ॒ङ्","धृ॒ञ्","धृ॑जँ॑","धृ॑जिँ॑","धे॒ट्","धे॑पृँ॒","धो॑रृँ॑","ध्मा॒","ध्मा॑क्षिँ॑","ध्यै॒","ध्र॑जँ॑","ध्र॑जिँ॑","ध्र॑णँ॑","ध्रा॑खृँ॑","ध्रा॑क्षिँ॑","ध्रा॑डृँ॒","ध्रि॑जँ॑","ध्रु॒","ध्रे॑कृँ॒","ध्रै॒","ध्वं॑सुँ॒","ध्व॑जँ॑","ध्व॑जिँ॑","ध्व॑णँ॑","ध्व॑नँ॑","ध्व॑नँ॑","ध्वा॑क्षिँ॑","ध्वृ॒","ण॑क्षँ॑","ण॑खँ॑","ण॑खिँ॑","ण॑टँ॑","ण॑टँ॑","ण॑दँ॑","टुन॑दिँ॑","ण॑भँ॒","ण॒मँ॑","ण॑यँ॒","न॑र्दँ॑","ण॑लँ॑","ण॑सँ॒","ना॑थृँ॒","ना॑धृँ॒","णा॑सृँ॒","णि॑क्षँ॑","णि॑दृँ॒॑","णि॑दिँ॑","णि॑विँ॑","णि॑शँ॑","णि॑षुँ॑","णी॒ञ्","णी॑लँ॑","णी॑वँ॑","नॄ॑","णे॑दृँ॒॑","णे॑षृँ॒","प॑क्षँ॑","डुप॒चँ॒॑ष्","प॑चिँ॒","प॑टँ॑","प॑ठँ॑","प॑णँ॒","प॑डिँ॒","प॑तॢँ॑","प॑थेँ॑","प॑नँ॒","प॑यँ॒","प॑र्दँ॒","प॑र्पँ॑","प॑र्बँ॑","प॑र्वँ॑","प॑लँ॑","पे॑लृँ॑","पा॒","पि॑टँ॑","पि॑ठँ॑","पि॑डिँ॒","पि॑विँ॑","पि॑सृँ॑","पी॑लँ॑","पी॑वँ॑","पु॑टँ॑","पु॑डँ॑","पु॑डिँ॑","पु॑थिँ॑","पु॑र्वँ॑","पु॑लँ॑","पु॑षँ॑","पू॑ङ्","पू॑यीँ॒","पु॑र्वँ॑","पू॑लँ॑","पू॑षँ॑","पृ॑षुँ॑","पे॑लृँ॑","पे॑वृँ॒","पे॑षृँ॒","पे॑सृँ॑","पै॒","पै॑णृँ॑","ओँ॑प्या॑यीँ॒","प्यै॒ङ्","प्र॑थँ॒","प्र॑सँ॒","प्रु॒ङ्","प्रु॑षुँ॑","प्रे॑षृँ॒","प्रै॑णृँ॑","प्रो॑थृँ॒॑","प्ल॑क्षँ॒॑","प्लि॑हँ॒","प्लु॒ङ्","प्लु॑षुँ॑","प्ले॑वृँ॒","फ॑क्कँ॑","फ॑णँ॑","फ॑लँ॑","ञिफ॑लाँ॑","फु॑ल्लँ॑","फे॑लृँ॑","ब॑हिँ॒","ब॑ठँ॑","ब॑णँ॑","ब॑टिँ॑","ब॑दँ॑","ब॑धँ॒","व॑भ्रँ॑","ब॑र्बँ॑","ब॑र्हँ॒","ब॑लँ॑","ब॑ल्हँ॒","बा॑डृ॒","बा॑धृँ॒","बा॑हृँ॒","बि॑टँ॑","बि॑दिँ॑","बि॑सँ॑","बी॑भृँ॒","बु॑क्कँ॑","बु॑गिँ॑","बु॑धँ॑","बु॑धिँ॒॑र्","उँ॑बु॑न्दिँ॒॑र्","बृ॑हिँ॑","बृ॑हँ॑","बे॑सँ॑","वे॑हृँ॒","व्र॑णँ॑","भ॑क्षँ॒॑","भ॒जँ॒॑","भ॑टँ॑","भ॑टँ॑","भ॑णँ॑","भ॑डिँ॒","भ॑दिँ॒","भ॑र्बँ॑","भ॑र्भँ॑","भ॑र्वँ॑","भ॑लँ॒","भ॑ल्लँ॒","भ॑षँ॑","भा॑मँ॒","भा॑षँ॒","भा॑सृँ॒","भि॑क्षँ॒","ञिमि॑दाँ॒","भि॑दिँ॑","भू॑","भू॑षँ॑","भृ॒ञ्","भृ॑जीँ॒","भे॑षृँ॒॑","भ्य॑सँ॒","भ्रं॑शुँ॑","भ्रं॑सुँ॒","भ्र॑क्षँ॒॑","भ्र॑णँ॑","भ्र॑मुँ॑","टुभ्रा॑जृँ॒","भ्रा॑जृँ॒","टुभ्रा॑शृँ॒","भ्रे॑जृँ॒","भ्रे॑षृँ॒॑","भ्ल॑क्षँ॒॑","टुभ्ला॑शृँ॒","भ्ले॑षृँ॒॑","म॑हिँ॒","म॑खँ॑","म॑किँ॒","म॑खिँ॑","म॑गिँ॑","म॑घिँ॒","म॑घिँ॑","म॑चँ॒","म॑चिँ॒","म॑ठँ॑","म॑णँ॑","म॑ठिँ॒","म॑डिँ॒","म॑डिँ॑","म॑थेँ॑","म॑न्थँ॑","म॑थिँ॑","म॑दिँ॒","म॑भ्रँ॑","म॑यँ॒","म॑र्बँ॑","म॑र्वँ॑","म॑लँ॒","म॑ल्लँ॒","म॑वँ॑","म॑व्यँ॑","म॑शँ॑","म॑षँ॑","म॑स्कँ॒","म॑स्कँ॒","म॑हँ॑","मा॑क्षिँ॑","मा॑नँ॒","मा॑हृँ॒॑","मि॑थृँ॒॑","मि॑दृँ॒॑","मि॑धृँ॒॑","मि॑विँ॑","मि॑शँ॑","मि॑षुँ॑","मि॒हँ॑","मी॑मृँ॑","मी॑लँ॑","मी॑वँ॑","मु॑खिँ॑","मु॑जँ॑","मु॑चि॒","मु॑जिँ॑","मु॑टँ॑","मु॑डँ॑","मु॑ठिँ॒","मु॑डिँ॑","मु॑डिँ॒","मु॑दँ॒","मु॑र्छाँ॑","मु॑र्वीँ॑","मू॑ङ्","मू॑लँ॑","मू॑षँ॑","मृ॑क्षँ॑","मृ॑धुँ॒॑","मृ॑षुँ॑","मे॒ङ्","मे॑थृँ॒॑","मे॑दृँ॒॑","मे॑धृँ॒॑","मे॑पृँ॒","मे॑वृँ॒","म्ना॒","म्र॑क्षँ॑","म्र॑दँ॒","म्रु॑चुँ॑","म्रु॑ञ्चुँ॑","म्रे॑टृँ॑","म्रे॑डृँ॑","म्लु॑चुँ॑","म्लु॑ञ्चुँ॑","म्ले॑छँ॑","म्ले॑टृँ॑","म्ले॑वृँ॒","म्लै॒","य॒जँ॒॑","य॑तीँ॒","य॒भँ॑","य॒मँ॑","टुया॑चृँ॒॑","यु॑गिँ॑","यु॑छँ॑","यु॑तृँ॒","यू॑षँ॑","ये॑षृँ॒","यौ॑टृँ॑","र॑हिँ॑","र॑क्षँ॑","र॑खँ॑","र॑गेँ॑","र॑खिँ॑","र॑गिँ॑","र॑घिँ॒","र॒ञ्जँ॒॑","र॑टँ॑","र॑टँ॑","र॑ठँ॑","र॑णँ॑","र॑णँ॑","र॑विँ॑","र॑दँ॑","र॑पँ॑","र॑फँ॑","र॒भँ॒","र॒मुँ॒","र॑फिँ॑","र॑बिँ॒","र॑भिँ॒","र॑यँ॒","र॑सँ॑","र॑हँ॑","रा॑खृँ॑","रा॑घृँ॒","रा॑जृँ॒॑","रा॑सृँ॒","रि॑खँ॑","रि॑खिँ॑","रि॑गिँ॑","रि॑विँ॑","रि॑षँ॑","रु॒ङ्","रु॑चँ॒","रु॑टँ॒","रु॑ठँ॑","रु॑टिँ॑","रु॑ठिँ॑","रु॑ठिँ॑","रु॑डिँ॑","रु॑षँ॑","रु॒हँ॑","रू॑षँ॑","रे॑कृँ॒","रे॑जृँ॒","रे॑टृँ॒॑","रे॑पृँ॒","रे॑भृँ॒","रे॑वृँ॒","रे॑षृँ॒","रै॒","रो॑डृँ॑","रौ॑डृँ॑","ल॑खँ॑","ल॑गेँ॑","ल॑खिँ॑","ल॑गिँ॑","ल॑घिँ॒","ल॑घिँ॑","ल॑छँ॑","ल॑जँ॑","ल॑जिँ॑","ल॑टँ॑","ल॑डँ॑","ल॑पँ॑","डुल॒भँ॒ष्","ल॑बिँ॒","ल॑बिँ॒","ल॑भिँ॒","ल॑यँ॒","ल॑र्बँ॑","ल॑लँ॑","ल॑षँ॒॑","ल॑सँ॑","ला॑खृँ॑","ला॑घृँ॒","ला॑जँ॑","ला॑छिँ॑","ला॑जिँ॑","लि॑खँ॑","लि॑खिँ॑","लि॑गिँ॑","लु॑ञ्चँ॑","लु॑टँ॒","लु॑टँ॑","लु॑ठँ॒","लु॑ठँ॑","लु॑डँ॑","लु॑टिँ॑","लु॑ठिँ॑","लु॑ठिँ॑","लु॑ठिँ॑","लु॑डिँ॑","लु॑थिँ॑","लु॑बिँ॑","लू॑षँ॑","ले॑पृँ॒","लो॑कृँ॒","लो॑चृँ॒","लो॑डृँ॑","लो॑ष्टँ॒","व॑क्षँ॑","व॑खँ॑","व॑किँ॒","व॑किँ॒","व॑खिँ॑","व॑गिँ॑","व॑घिँ॒","व॑जँ॑","व॑ञ्चुँ॑","व॑टँ॑","व॑टँ॑","व॑ठँ॑","व॑णँ॑","व॑टिँ॑","व॑ठिँ॒","व॑डिँ॒","व॑दँ॑","व॑नँ॑","व॑नुँ॑","व॑नँ॑","व॑दिँ॒","डुव॒पँ॒॑","व॑भ्रँ॑","टुव॑मँ॑","व॑यँ॒","व॑र्चँ॒","व॑र्षँ॒","व॑र्हँ॒","व॑ल॒","व॑ल्गँ॑","व॑ल्भँ॒","व॑ल्लँ॒","व॑ल्हँ॒","व॑षँ॑","व॑स्कँ॒","व॒सँ॑","व॑स्कँ॒","व॒हँ॒॑","वा॑क्षिँ॑","वा॑छिँ॑","वा॑डृ॒","बा॑हृँ॒","वि॑टँ॑","वि॑थृँ॒","वि॑षुँ॑","वि॑सँ॑","वी॑जँ॒","वु॑गिँ॑","बृ॑हिँ॑","वृ॑कँ॒","वृ॑क्षँ॒","वृ॑तुँ॒","वृ॑धुँ॒","वृ॑षुँ॑","बृ॑हँ॑","वे॒ञ्","वे॑णृँ॒॑","वे॑थृँ॒","वे॑नृँ॒॑","टुवे॑पृ॒","वे॑लृँ॑","वे॑ल्लँ॑","वे॑ष्टँ॒","वे॑सँ॑","वे॑हृँ॒","वे॑ल्लँ॑","ओँ॑वै॑","व्य॑थँ॒","व्य॑यँ॒॑","व्ये॒ञ्","व्र॑जँ॑","व्र॑जँ॑","व्र॑जिँ॑","व्र॑णँ॑","शं॑सुँ॑","श॑किँ॒","श॑चँ॒","श॑टँ॑","श॑ठँ॑","श॑णँ॑","श॑डिँ॒","श॒दॢँ॑","श॒पँ॒॑","श॑र्बँ॑","श॑र्वँ॑","श॑लँ॑","श॑लँ॒","श॑ल्भँ॒","श॑वँ॑","श॑शँ॑","श॑षँ॑","श॑सुँ॑","शा॑खृँ॑","शा॑डृँ॒","शा॑नँ॒॑","शि॑क्षँ॒","शि॑खिँ॑","शि॑घिँ॑","शि॑टँ॑","शि॑षँ॑","शी॑कृँ॒","शी॑भृँ॒","शी॑लँ॑","शु॑कँ॑","शु॑चँ॑","शु॑च्यँ॑","शु॑ठँ॑","शु॑ठिँ॑","शु॑ठिँ॑","शु॑न्धँ॑","शु॑भँ॑","शु॑भँ॒","शु॑म्भँ॑","शू॑लँ॑","शू॑षँ॑","शृ॑धुँ॒॑","शृ॑धुँ॒","शे॑लृँ॑","शे॑वृँ॒","शै॒","शो॑णृँ॑","शौ॑टृँ॑","श्चु॑तिँ॑र्","श्च्यु॑तिँ॑र्","श्न॑थँ॑","श्मी॑लँ॑","स्य॑न्दूँ॒","च्यु॒ङ्","श्यै॒ङ्","स्रं॑सुँ॒","स्रं॑सुँ॒","श्र॑किँ॒","श्र॑गिँ॑","श्र॑णँ॑","श्र॑थँ॑","श्र॑थिँ॒","श्र॑म्भुँ॒","श्रा॑","श्रि॑ञ्","श्रि॑षुँ॑","श्रु॒","श्रै॒","श्रो॑णृँ॑","श्ल॑किँ॒","श्ल॑गिँ॑","श्ल॑थँ॑","श्ला॑खृँ॑","श्ला॑घृँ॒","श्लि॑षुँ॑","श्लो॑कृँ॒","श्लो॑णृँ॑","श्व॑किँ॒","श्र॑गिँ॑","श्व॑चँ॒","श्व॑चिँ॒","श्व॑लँ॑","श्व॑ल्लँ॑","टुओँश्वि॑","श्वि॑ताँ॑","श्वि॑दिँ॒","ष्ट्यै॒","ष्ठि॑वुँ॑","ष्व॑स्कँ॒","ष्व॑स्कँ॒","ष॑गेँ॑","ष॑चँ॒॑","ष॑चँ॒","ष॑स्जँ॑","ष॒ञ्जँ॑","ष॑टँ॑","ष॒दॢँ॑","ष॑नँ॑","ष॑पँ॑","ष॑मँ॑","ष॑र्क्षँ॑","ष॑र्जँ॑","ष॑र्बँ॑","ष॑र्वँ॑","ष॑लँ॑","ष॑स्जँ॑","ष॑हँ॒","षि॑टँ॑","षि॑धँ॑","षि॑धूँ॑","षि॑विँ॑","षि॑भुँ॑","षि॑म्भुँ॑","सी॑कृँ॒","षु॒","षू॑दँ॒","सू॑र्क्षँ॑","षू॑र्क्ष्यँ॑","सू॑षँ॑","सृ॒","सृ॒पॢँ॑","षृ॑भुँ॑","षृ॑म्भुँ॑","से॑कृँ॒","षे॑लृँ॑","षे॑वृँ॒","षै॒","स्क॒न्दिँ॑र्","स्क॑भिँ॒","स्कु॑दिँ॒","स्ख॑दँ॒","स्ख॑लँ॑","ष्ट॑कँ॑","ष्ट॑नँ॑","ष्ट॑मँ॑","ष्ट॑भिँ॒","ष्ठ॑लँ॑","ष्टि॑पृँ॒","ष्टु॑चँ॒","ष्टु॑भुँ॒","ष्टृ॑क्षँ॑","ष्टे॑पृँ॒","ष्टै॒","स्त्यै॒","ष्ट्र॑क्षँ॑","ष्ठ॑गेँ॑","ष्ठा॒","ष्णै॒","स्प॑दिँ॒","स्प॑र्धँ॒","स्प॑शँ॒॑","स्फा॑यीँ॒","स्फु॑टँ॒","स्फु॑टिँ॑र्","स्फु॑टिँ॑","स्फु॑डिँ॒","स्फु॑र्छाँ॑","टुओँस्फू॑र्जाँ॑","ष्मि॒ङ्","स्मी॑लँ॑","स्मृ॑","स्मृ॒","स्य॑मुँ॑","स्रं॑सुँ॒","स्र॑किँ॒","स्र॑म्भुँ॒","स्र॑म्भुँ॒","स्रु॒","स्रे॑कृँ॒","स्रै॒","स्रो॑कृँ॒","ष्व॑किँ॒","श्र॑गिँ॑","ष्व॒ञ्जँ॒","ष्व॑दँ॒","स्व॑नँ॑","स्व॑नँ॑","स्व॑र्दँ॒","ष्व॑स्कँ॒","ष्व॑स्कँ॒","स्वा॑दँ॒","ञिष्वि॑दाँ॒","स्वृ॒","ह॑टँ॑","ह॑ठँ॑","ह॒दँ॒","ह॑म्मँ॑","ह॑र्यँ॑","ह॑यँ॑","ह॑लँ॑","ह॑सेँ॑","हि॑क्कँ॒॑","हि॑टँ॑","हि॑डिँ॒","हि॑विँ॑","हु॑डृँ॑","हु॑डिँ॒","हु॑डिँ॒","हु॑र्छाँ॑","हु॑लँ॑","हु॑लँ॑","हू॑डृँ॑","हृ॒ञ्","हृ॑षुँ॑","ह्र॑सँ॑","हे॑ठँ॒","हे॑ठँ॑","हे॑डृँ॒","हे॑डँ॑","हे॑पृँ॒","हे॑षृँ॒","हो॑डृँ॒","हो॑डृँ॑","ह्म॑लँ॑","ह्र॑गेँ॑","ह्र॑सँ॑","ह्रा॑दँ॒","ह्री॑छँ॑","ह्रे॑षृँ॒","ह्ल॑गेँ॑","ह्ल॑सँ॑","ह्ला॑दीँ॒","ह्व॑लँ॑","ह्वृ॒","ह्वृ॒","ह्वे॒ञ्");
$divAdi1=array("अ॑णँ॒","अ॑नुरु॒धँ॒","अ॑नँ॒","अ॑सुँ॑","इ॑षँ॑","ई॒ङ्","उ॑चँ॑","ऋ॑धुँ॑","का॑शृँ॒","कुं॑शँ॑","कुं॑सँ॑","कु॑थँ॑","कु॑पँ॑","कु॑शँ॑","कु॑सँ॑","कृ॑शँ॑","क्न॑सुँ॑","क्रु॒धँ॑","क्ल॑मुँ॑","क्लि॑दूँ॑","क्लि॑शँ॒","क्ष॑मूँ॑","क्षि॒पँ॑","क्षु॒धँ॑","क्षु॑भँ॑","ञिक्ष्वि॑दाँ॑","खि॒दँ॒","गु॑धँ॑","गु॑पँ॑","गू॑रीँ॒","गृ॑धुँ॑","घू॑री॒","चू॑रीँ॒","छो॒","ज॑नीँ॒","ज॑सुँ॑","जू॑रीँ॒","जॄ॑ष्","झॄ॑ष्","डि॑पँ॑","डी॒ङ्","त॒पँ॒","त॑मुँ॑","त॑सुँ॑","ति॑मँ॑","ती॑मँ॑","तु॑भँ॑","तु॒षँ॑","तू॑रीँ॒","तृ॒पँ॑","ञितृ॑षँ॑","त्र॑सीँ॑","द॑मुँ॑","द॑सुँ॑","दि॑वुँ॑","दी॑ङ्","दी॑पीँ॒","दु॒षँ॑","दू॑ङ्","दृ॒पँ॑","दो॒","द्रु॒हँ॑","धी॒ङ्","धू॑री॒","ण॑भँ॑","ण॒शँ॑","ण॒हँ॒॑","नृ॑तीँ॑","प॒दँ॒","पी॒ङ्","पु॑थँ॑","पु॑षँ॑","पु॒षँ॑","पु॑ष्पँ॑","पू॑रीँ॒","प्यु॑षँ॑","प्यु॑सँ॑","प्री॒ङ्","प्लु॑षँ॑","प्लु॑षँ॑","ब॑सुँ॑","वि॑सँ॑","बु॒धँ॒","बु॑सँ॑","बु॑सँ॑","ब्यु॑सँ॑","भ॑सुँ॑","भृं॑शुँ॑","भृ॑शुँ॑","भ्रं॑शुँ॑","भ्र॑मुँ॑","म॑दीँ॑","म॒नँ॒","म॑सीँ॑","मा॒ङ्","ञिमि॑दाँ॑","मी॒ङ्","मु॑सँ॑","मु॒हँ॑","मृ॑षँ॒॑","य॑सुँ॑","यु॒जँ॒","यु॒धँ॒","यु॑पँ॑","र॒ञ्जँ॒॑","र॒धँ॑","रा॒धः","रि॑षँ॑","री॒ङ्","रु॑पँ॑","रु॑षँ॑","लि॒शँ॒","ली॒ङ्","लु॑टँ॑","लु॑ठँ॑","लु॑पँ॑","लु॑भँ॑","व॑सुँ॑","वा॑वृ॑तुँ॒","वा॑शृँ॒","वि॒दँ॒","बि॑सँ॑","वु॑सँ॑","वृ॑तुँ॒","वृ॑शँ॑","व्य॒धँ॑","व्यु॑षँ॑","व्यु॑षँ॑","व्यु॑सँ॑","व्री॒ङ्","व्री॑डँ॑","श॒कँ॒॑","श॒पँ॒॑","श॑मुँ॑","ईँ॑शु॑चिँ॒॑र्","शु॒धँ॑","शु॒षँ॑","शू॑रीँ॒","शो॒","श्र॑मुँ॑","श्लि॒षँ॑","ष्ठि॑वुँ॑","स॑मीँ॑","ष॑हँ॑","षि॒धुँ॑","षि॑वुँ॑","षु॑हँ॑","षू॑ङ्","सृ॒जँ॒","षो॒","ष्टि॑मँ॑","ष्टी॑मँ॑","ष्टु॑पँ॑","ष्टू॑पँ॑","ष्ण॑सुँ॑","ष्णि॒हँ॑","ष्णु॑सुँ॑","ष्णु॒हँ॑","स्रि॑वुँ॑","ष्वि॒दाँ॑","हृ॑षँ॑");
$tudAdi1=array("इ॑लँ॑","इ॑षँ॑","उ॑छीँ॑","उ॑ज्झँ॑","उ॑छिँ॑","उ॑ज्झँ॑","उ॑ब्जँ॑","उ॑भँ॑","उ॑म्भँ॑","ऋ॑चँ॑","ऋ॑छँ॑","ऋ॑फँ॑","ऋ॑म्फँ॑","ऋ॑षीँ॑","क॑डँ॑","कि॑लँ॑","कु॑ङ्","कु॑चँ॑","कु॑टँ॑","कु॑डँ॑","कु॑णँ॑","कु॑रँ॑","कू॑ङ्","कृ॑डँ॑","कृ॑तीँ॑","कृ॒षँ॒॑","कॄ॑","क्रु॑डँ॑","क्षि॒","क्षि॒पँ॒॑","क्षु॑रँ॑","खि॒दँ॑","खु॑डँ॑","खु॑रँ॑","गु॒","गु॑जँ॑","गु॑डँ॑","गु॑फँ॑","गु॑म्फँ॑","गु॑रीँ॒","गॄ॑","घु॑टँ॑","घु॑णँ॑","घु॑रँ॑","घू॑र्णँ॑","च॑र्चँ॑","च॑लँ॑","चि॑लँ॑","चु॑टँ॑","चु॑डँ॑","चृ॑तीँ॑","छु॑टँ॑","छु॑डँ॑","छु॒पँ॑","छु॑रँ॑","ज॑र्जँ॑","जु॑टँ॑","जु॑डँ॑","जु॑डँ॑","जु॑नँ॑","जु॑षीँ॒","झ॑र्झँ॑","डि॑पँ॑","ति॑लँ॑","तु॑टँ॑","तु॑डँ॑","तु॑णँ॑","तु॒दँ॒॑","तु॑पँ॑","तु॑फँ॑","तु॑म्पँ॑","तु॑म्फँ॑","तृं॑हूँ॑","तृ॑पँ॑","तृ॑फँ॑","तृ॑म्पँ॑","तृ॑म्फँ॑","तृ॑हूँ॑","त्रु॑टँ॑","त्व॑चँ॑","थु॑डँ॑","दि॒शँ॒॑","दृ॒ङ्","दृ॑पँ॑","दृ॑फँ॑","दृ॑भीँ॑","दृ॑म्पँ॑","दृ॑म्फँ॑","द्रु॑णँ॑","धि॒","धू॑","धू॑","धृ॒ङ्","ध्रु॒","णि॑लँ॑","णू॑","णु॒दँ॑","णु॒दँ॒॑","णू॑","पि॒","पि॑शँ॑","पु॑टँ॑","पु॑डँ॑","पु॑णँ॑","पु॑रँ॑","पृ॒ङ्","पृ॑डँ॑","पृ॑णँ॑","प्र॒छँ॑","बि॑लँ॑","बृ॑हूँ॑","भु॒जोँ॑","भृ॑डँ॑","भ्र॒स्जँ॒॑","भ्र॒स्जँ॒॑","टुम॒स्जोँ॑","टुम॒स्जोँ॑","मि॑छँ॑","मि॑लँ॑","मि॑लँ॒॑","मि॑षँ॑","मु॒चॢँ॒॑॑","मु॑टँ॑","मु॑णँ॑","मु॑रँ॑","मृ॒ङ्","मृ॑डँ॑","मृ॑णँ॑","मृ॒शँ॑","रि॒","रि॑फँ॑","रि॒शँ॑","रि॑हँ॑","रु॒जोँ॑","रु॒शँ॑","ओँ॑ल॑जीँ॒","ओँ॑ल॑स्जीँ॒","ओँ॑ल॑स्जीँ॒","लि॑खँ॑","लि॒पँ॒॑","लि॒शँ॑","लु॑टँ॑","लु॑ठँ॑","लु॑डँ॑","लु॒पॢँ॒॑॑","लु॑भँ॑","वि॑छँ॑","ओँ॑वि॑जीँ॒","वि॑दॢँ॒॑॑","वि॑धँ॑","वि॑लँ॑","वि॒शँ॑","वृ॑णँ॑","वृ॑हूँ॑","व्य॑चँ॑","ओँ॑व्र॑श्चूँ॑","व्रु॑डँ॑","श॒दॢँ॑","शि॑लँ॑","शु॑नँ॑","शु॑भँ॑","शु॑म्भँ॑","ष॒दॢँ॑","षि॒चँ॒॑","षि॑लँ॑","षु॑रँ॑","षू॑","सृ॒जँ॑","स्तृ॑हूँ॑","स्थु॑डँ॑","स्पृ॒शँ॑","स्फ॑रँ॑","स्फ॑लँ॑","स्फु॑टँ॑","स्फु॑डँ॑","स्फु॑रँ॑","स्फु॑लँ॑","हि॑लँ॑","हु॑डँ॑");
$curAdi1=array("अं॑स॑","अ॑हिँ॑","अ॑ङ्क॑","अ॑ङ्ग॑","अ॑ञ्चुँ॑","अ॑जिँ॑","अ॑ट्टँ॑","अ॑न्ध॑","अ॑मँ॑","अ॑र्कँ॑","अ॑र्चँ॑","अ॑र्जँ॑","अ॑र्थ॒","अ॑र्दँ॑","अ॑र्हँ॑","अ॑र्हँ॑","आ॑क्रन्दँ","आ॑पॢँ॑","आ॒षदँ","इ॑लँ॑","ई॑डँ॑","ई॑रँ॑","क॑ठिँ॑","उ॑घ्र॑सँ॑","ऊ॑न॑","ऊ॑र्जँ॑","ओँ॑ल॑डिँ॑","क॑णँ॑","क॑ठिँ॑","क॑डिँ॑","क॑त्र॑","क॑त्र॑","क॑थ॑","क॑र्णँ॑","क॑र्तँ॑","क॑ल॑","क॑ल॑","का॑ल॑","की॑टँ॑","कु॑शिँ॑","कु॑सिँ॑","कु॑टँ॒","कु॑ट्टँ॑","कु॑ट्टँ॒","कु॑ण॑","कु॑ठिँ॑","कु॑डिँ॑","कु॑डिँ॑","कु॑त्सँ॒","कु॑दृँ॑","कु॑द्रिँ॑","कु॑पँ॑","कु॑मा॑र॑","कु॑बिँ॑","कु॑भिँ॑","कु॑स्मँ॒","कु॑ह॒","कू॑ट॑","कू॑ट॒","कू॑णँ॑","कू॑णँ॒","कृ॑प॑","कृ॒पे॑श्च॒॑","कॄ॑तँ॑","के॑त॑","क्ल॑पँ॑","क्ष॑जिँ॑","क्ष॑पँ॑","क्ष॑पिँ॑","क्ष॑लँ॑","क्षो॑ट॑","ख॑ट्टँ॑","ख॑डँ॑","ख॑डिँ॑","खु॑डिँ॑","खे॑ट॑","खे॑डँ॑","खो॑ट॑","ग॑जँ॑","ग॑ण॑","ग॑दी॑","ग॑न्धँ॒","ग॑र्जँ॑","ग॑र्दँ॑","ग॑र्धँ॑","ग॑र्व॒","ग॑र्हँ॑","ग॑लँ॒","ग॑वे॑ष॑","गु॑ण॑","गु॑ठिँ॑","गु॑डिँ॑","गु॑पँ॑","गु॑र्दँ॑","गू॑रँ॒","गृ॑ह॒","गॄ॑","गो॑म॑","ग्र॑न्थँ॑","ग्र॑न्थँ॑","ग्र॑सँ॑","ग्रा॑म॑","घ॑टँ॑","घ॑टँ॑","घ॑ट्टँ॑","घ॑टिँ॑","घु॑षिँ॑र्","घृ॑","च॑क्कँ॑","च॑टँ॑","च॑डिँ॑","च॑नँ॑","च॑पँ॑","च॑पिँ॑","च॑रँ॑","च॑र्चँ॑","च॑लँ॑","च॑ह॑","च॑ह॑","चि॑","चि॑ञ्","चि॑तँ॒","चि॑त्र॑","चि॑तिँ॑","ची॑कँ॑","ची॑वँ॑","ची॑वँ॑","चु॑क्कँ॑","चु॑टँ॑","चु॑ट्टँ॑","चु॑टिँ॑","चु॑दँ॑","चु॑बिँ॑","चु॑रँ॑","चु॑लँ॑","चू॑र्णँ॑","चू॑र्णँ॑","चृ॑पँ॑","च्यु॑","छ॑जिँ॑","छ॑द॑","छ॑द॑","छ॑द॑","छ॑दिँ॑","छ॑र्द॑","छि॑द्र॑","छृ॑दीँ॑","छृ॑पँ॑","छे॑द॑","ज॑सिँ॑","ज॑भिँ॑","ज॑लँ॑","ज॑सुँ॑","ज॑सुँ॑","जि॑","चि॑","चि॑","जु॑डँ॑","जु॑षँ॑","जॄ॑","ज्ञ॑पँ॑","ज्ञा॑","ज्रि॑","ट॑किँ॑","ड॑पँ॒","डि॑पँ॑","डि॑पँ॒","त॑सिँ॑","त॑डँ॑","त॑डँ॑","त॑नुँ॑","त॑त्रिँ॒","त॑पँ॑","त॑र्कँ॑","त॑र्जँ॒","त॑लँ॑","ति॑जँ॑","ति॑लँ॑","ती॑र॑","तु॑जँ॑","तु॑जिँ॑","तु॑जिँ॑","तु॑डिँ॑","तु॑त्थ॑","तु॑बिँ॑","तु॑लँ॑","तू॑णँ॒","तृ॑पँ॑","तृ॑पँ॑","त्र॑सिँ॑","त्र॑सँ॑","त्रु॑टँ॒","द॑शिँ॑","द॑शिँ॒","द॑सिँ॑","द॑सिँ॒","द॑ण्ड॑","द॑लँ॑","द॑सँ॒","दि॑वुँ॒","दि॑वुँ॑","दुः॑ख॑","दु॑लँ॑","दृ॑पँ॑","दृ॑भीँ॑","दृ॑भँ॑","ध॑क्कँ॑","धू॑पँ॑","धू॑ञ्","धू॑पँ॑","धू॑शँ॑","धू॑षँ॑","धू॑सँ॑","धृ॑षँ॑","उँ॑ध्र॑सँ॑","ध्व॑न॑","न॑क्कँ॑","न॑टँ॑","न॑टँ॑","ण॑डँ॑","न॑लँ॑","नि॑वा॑स॑","नि॑ष्कँ॒","प॑सिँ॑","प॑सिँ॑","प॑क्षँ॑","प॑चिँ॑","प॑ट॑","प॑ट॑","प॑डिँ॑","प॑त॑","प॑थँ॑","प॑द॒","प॑थिँ॑","प॑र्ण॑","प॑लँ॑","प॑ल्यू॑ल॑","प॑शँ॑","प॑ष॑","पा॑र॑","पा॑लँ॑","पि॑सिँ॑","पि॑छँ॑","पि॑जँ॑","पि॑जिँ॑","पि॑जिँ॑","पि॑ठिँ॑","पि॑डिँ॑","पि॑शँ॑","पि॑सँ॑","पी॑डँ॑","पुं॑सँ॑","पु॑ट॑","पु॑ट॑","पु॑ट्टँ॑","पु॑णँ॑","पु॑टिँ॑","पु॑थँ॑","पु॑लँ॑","पु॑षँ॑","पु॑स्तँ॑","पू॑जँ॑","पू॑रीँ॑","पू॑र्णँ॑","पू॑र्वँ॑","पू॑लँ॑","पृ॑चँ॑","पृ॑थँ॑","पॄ॑","प्र॑थँ॑","प्री॑ञ्","ब॑धँ॑","ब॑न्धँ॑","ब॑र्हँ॑","ब॑र्हँ॑","ब॑लँ॑","ब॑ल्हँ॑","ब॑ष्कँ॑","ब॑स्तँ॒","बि॑लँ॑","बु॑क्कँ॑","बु॑स्तँ॑","बृ॑हिँ॑","ब्रू॑सँ॑","भ॑क्षँ॑","भ॑जँ॑","भ॑जिँ॑","भ॑डिँ॑","भ॑र्त्सँ॒","भ॑लँ॒","भा॑ज॑","भा॑म॑","भू॑","भू॑","भू॑षँ॑","भृ॑शिँ॑","भ्रू॑णँ॒","म॑हिँ॑","म॑डिँ॑","म॑दँ॒","मा॑नँ॒","म॑त्रिँ॒","म॑र्चँ॑","म॑ह॑","म॑नँ॒","मा॑नँ॑","मा॑र्गँ॑","मा॑र्जँ॑","मि॑जिँ॑","मि॑दँ॑","मि॑दिँ॑","मि॑श्र॑","मी॑","मु॑चँ॑","मु॑टँ॑","मु॑दँ॑","मु॑स्तँ॑","मू॑त्र॑","मू॑लँ॑","मृ॑ग॒","मृ॑जूँ॑","मृ॑डिँ॑","मृ॑षँ॒॑","मो॑क्षँ॑","म्र॑क्षँ॑","म्र॑क्षँ॑","म्र॑छँ॑","म्ले॑छँ॑","य॑क्षँ॒","य॑तँ॑","य॑त्रिँ॑","य॑मँ॑","यु॑","यु॑जँ॑","र॑हिँ॑","र॑कँ॑","र॑गँ॑","र॑घँ॑","र॑ङ्गँ॑","र॑घिँ॑","र॑च॑","र॑टँ॑","र॑स॑","र॑ह॑","र॑ह॑","रि॑चँ॑","रु॑शिँ॑","रु॑सिँ॑","रु॑जँ॑","रु॑टँ॑","रु॑टँ॑","रु॑षँ॑","रू॑क्ष॑","रू॑प॑","ल॑क्षँ॒","ल॑क्षँ॑","ल॑गँ॑","ल॑घिँ॑","ल॑घिँ॑","ल॑ज॑","ल॑ज॑","ल॑जि॑","ल॑जि॑","ल॑जि॑","ल॑डँ॑","ल॑डिँ॑","ओँ॑ल॑डिँ॑","ल॑लँ॒","ल॑सँ॑","ला॑भ॑","लि॑गिँ॑","लि॑जिँ॑","ली॑","लु॑जिँ॑","लु॑जिँ॑","लु॑टँ॑","लु॑ण्टँ॑","लु॑ण्ठँ॑","लु॑बिँ॑","लू॑षँ॑","लो॑कृँ॑","लो॑चृँ॑","व॑चँ॑","व॑ञ्चुँ॒","व॑ट॑","व॑ट॑","व॑टि॑","व॑टि॑","व॑डिँ॑","व॑दँ॒॑","व॑र॑","व॑र्ण॑","व॑र्ण॑","व॑र्धँ॑","ब॑र्हँ॑","व॑र्हँ॑","व॑ल्कँ॑","ब॑ल्हँ॑","व॑स॑","व॑स॑","व॑स्तँ॒","वा॑त॑","वा॑स॑","वि॑छँ॑","वि॑दँ॒","वि॑पँ॑","वि॑लँ॑","वि॑ष्क॑","वि॑ष्क॒","वी॑र॒","वृ॑ञ्","बृ॑हिँ॑","वृ॑जीँ॑","वृ॑तुँ॑","वृ॑धुँ॑","वृ॑षँ॒","वे॑ल॑","व्य॑पँ॑","व्य॑य॑","व्य॑य॑","व्यु॑सँ॑","व्र॑जँ॑","व्र॑ण॑","व्रू॑षँ॑","व्रू॑सँ॑","श॑ठ॑","श॑ठ॑","श॑ठ॒","श॑ब्दँ॑","श॑मँ॒","श॑म्बँ॑","शा॑न्त्वँ॑","शि॑षँ॑","शी॑कँ॑","शी॑कँ॑","शी॑ल॑","शु॑ठँ॑","शु॑ठिँ॑","शु॑न्धँ॑","शु॑ल्कँ॑","शु॑ल्बँ॑","शू॑र॒","शू॑र्पँ॑","शृ॑धुँ॑","श्र॑णँ॑","श्र॑थ॑","श्र॑थ॑","श्र॑थ॑","श्र॑न्थँ॑","श्लि॑षँ॑","श्व॑ठ॑","श्व॑ठ॑","श्व॑ठिँ॑","श्व॑भ्रँ॑","श्व॑र्तँ॑","श्व॑ल्कँ॑","स॑ङ्के॑तँ॑","स॑ङ्ग्रा॑म॒","ष॑ट्टँ॑","स॑त्र॒","स॑त्र॒","स॑भा॑ज॑","ष॑म्बँ॑","सा॑र॑","ष॑हँ॑","षा॑न्त्वँ॑","सा॑म॑","सा॑म्बँ॑","सा॑र॑","सु॑ख॑","षु॑ट्टँ॑","सू॑च॑","सू॑त्र॑","षू॑दँ॑","स्त॑न॑","ष्टु॑पँ॑","ष्टू॑पँ॑","स्ते॑न॑","स्तो॑मँ॑","स्थू॑ल॒","ष्णि॑हँ॑","स्प॑शँ॒","स्पृ॑ह॑","स्फि॑टँ॑","स्फि॑ट्टँ॑","स्फु॑टँ॑","स्फु॑टिँ॑","स्फु॑डिँ॑","ष्मि॑ङ्","स्मि॑टँ॑","स्य॑मँ॒","ष्व॑दँ॑","स्व॑र॑","स्व॑र्तँ॑","स्वा॑दँ॑","ह॑स्तँ॒","हि॑सिँ॑","हि॑ष्कँ॒","ह्र॑पँ॑","ह्ल॑पँ॑");
$adAdi1=array("अ॒दँ॑","इ॒ङ्","इ॒क्","अ॑नँ॑","अ॑सँ॑","आ॑शासुँ","आ॑सँ॒","इ॒ङ्","इ॒ण्","इ॒क्","ई॑डँ॒","ई॑रँ॒","ई॑शँ॒","ऊ॑र्णु॑ञ्","क॑सिँ॒","क॑शँ॒","क॑सँ॒","कु॒","टु॑क्षु॑","क्ष्णु॑","ख्या॒","च॑का॑सृँ॑","च॒क्षिँ॒ङ्","ज॑क्षँ॑","जा॑गृ॑","तु॑","द॑रि॑द्रा॑","दा॒प्","दि॒हँ॒॑","दी॑धी॑ङ्","दु॒हँ॒॑","द्यु॒","द्रा॒","द्वि॒षँ॒॑","णि॑सिँ॒","णि॑जिँ॒","णु॑","पा॒","पि॑जिँ॒","पृ॑चीँ॒","पृ॑जिँ॒","प्रा॒","प्सा॒","ब्रू॑ञ्","भा॒","मा॒","मृ॑जूँ॑","या॒","यु॑","रा॒","रु॑","रु॑दिँ॑र्","ला॒","लि॒हँ॒॑","व॒चँ॑","व॑शँ॑","व॑सँ॒","वा॒","वि॑दँ॑","वी॒","वृ॑जीँ॒","वृ॑जिँ॒","वे॑वी॑ङ्","शा॑सुँ॑","शि॑जिँ॒","शी॑ङ्","श्रा॒","श्व॑सँ॑","ष॑स्तिँ॑","ष॑सँ॑","षु॒","षू॑ङ्","ष्टु॒ञ्","ष्णा॒","ष्णु॑","ञिष्व॒पँ॑","ह॒नँ॑","ह्नु॒ङ्");
$juhotyAdi1=array("ऋ॒","कि॒","कि॑तँ॑","गा॒","घृ॑","ज॑नँ॑","तु॑रँ॑","डुदा॒ञ्","ध॑नँ॑","डुधा॒ञ्","धि॑षँ॑","णि॒जिँ॒॑र्","पृ॒","पॄ॑","पॄ॒","भ॑सँ॑","ञिभी॒","भृं॑शुँ॑","मा॒ङ्","वि॒जिँ॒॑र्","वि॒षॢँ॒॑॑","सृ॒","ओँ॑हा॒ङ्","ओँ॑हा॒क्","हु॒","हृ॒","ह्री॒");
$svAdi1=array("अ॑शूँ॒","अ॑हँ॑","आ॒पॢँ॑","ऋ॑","ऋ॑धुँ॑","कृ॒ञ्","क्षि॑","क्षी॑","च॑मुँ॑","चि॒ञ्","चि॑रि॑","जि॑रि॑","ति॑कँ॑","ति॑गँ॑","तृ॑पँ॑","द॑घँ॑","द॑म्भुँ॑","दा॑शँ॑","टु॑दु॒","दॄ॑","धु॒ञ्","धू॑ञ्","ञिधृ॑षाँ॑","पृ॒","डुमि॒ञ्","रा॒धँ॑","रि॑","वृ॑ञ्","श॒कॢँ॑","शि॒ञ्","ष॑घँ॑","सा॒धँ॑","षि॒ञ्","षु॒ञ्","ष्टि॑घँ॒","स्तृ॒ञ्","स्पृ॒","स्मृ॒","हि॒");
$rudhAdi1=array("अ॑ञ्जूँ॑","ञिइ॒न्धीँ॑","उ॑न्दीँ॑","कृ॑तीँ॑","क्षु॒दिँ॒॑र्","खि॒दँ॒","छि॒दिँ॒॑र्","उँ॑छृ॑दिँ॒॑र्","त॑ञ्चूँ॑","उँ॑तृ॑दिँ॒॑र्","तृ॑हँ॑","पि॒षॢँ॑","पृ॑चीँ॑","भ॒ञ्जोँ॑","भि॒दिँ॒॑र्","भु॒जँ॑","यु॒जिँ॒॑र्","रि॒चिँ॒॑र्","रु॒धिँ॒॑र्","वि॒चिँ॒॑र्","ओँ॑वि॑जीँ॑","वि॒दँ॒","वृ॑जीँ॑","शि॒षॢँ॑","हि॑सिँ॑");
$tanAdi1=array("ऋ॑णुँ॒॑","डुकृ॒ञ्","क्ष॑णुँ॒॑","क्षि॑णुँ॒॑","घृ॑णुँ॒॑","त॑नुँ॒॑","तृ॑णुँ॒॑","म॑नुँ॒","व॑नुँ॒","ष॑नुँ॒॑");
$kryAdi1=array("अ॑शँ॑","इ॑षँ॑","ॠ","कु॑न्थँ॑","कु॑षँ॑","कॄ॑ञ्","कॄ॑","क्नू॑ञ्","डुक्री॒ञ्","क्लि॑शूँ॑","क्षी॒ष्","क्षु॑भँ॑","ख॑चँ॑","ख॑वँ॑","गु॑धँ॑","गॄ॑","ग्र॑न्थँ॑","ग्र॑हँ॒॑","जॄ॑","ज्ञा॒","ज्या॒","झॄ॑","तु॑भँ॑","दॄ॑","द्रू॑ञ्","धू॑ञ्","धॄ॑","उँ॑ध्र॒सँ॑","ण॑भँ॑","नॄ॑","पु॑षँ॑","पू॑ञ्","पॄ॑","प्री॒ञ्","प्रु॑षँ॑","प्ली॒","प्लु॑षँ॑","ब॒न्धँ॑","ब्ली॒","भॄ॑","भ्री॒","म॑न्थँ॑","मी॒ञ्","मु॑षँ॑","मू॑ञ्","मृ॑डँ॑","मृ॑दँ॑","मॄ॑","यु॒ञ्","री॒","ली॒","लू॑ञ्","वि॒षँ॑","वृ॑ङ्","वॄ॑ञ्","वॄ॑","व्री॒","व्ली॒","शॄ॑","श्र॑न्थँ॑","श्र॑न्थँ॑","श्री॒ञ्","षि॒ञ्","स्क॒म्भुँ॑","स्कु॒ञ्","स्कु॒म्भुँ॑","स्त॒म्भुँ॑","स्तु॒म्भुँ॑","स्तॄ॑ञ्","हे॑ठँ॑","हे॑ढँ॑");
$allverbs1=array("अं॑स॑","अ॑हिँ॑","अ॑हिँ॒","अ॑कँ॑","अ॑क्षूँ॑","अ॑गँ॑","अ॑ङ्क॑","अ॑किँ॒","अ॑ङ्ग॑","अ॑गिँ॑","अ॑घिँ॒","अ॑चुँ॒॑","अ॑जँ॑","अ॑चिँ॑","अ॑ञ्चुँ॑","अ॑ञ्चुँ॒॑","अ॑ञ्चुँ॑","अ॑जिँ॑","अ॑ञ्जूँ॑","अ॑टँ॑","अ॑ट्टँ॑","अ॑ट्टँ॒","अ॑डँ॑","अ॑ड्डँ॑","अ॑णँ॑","अ॑णँ॒","अ॑ठिँ॒","अ॑तँ॑","अ॒दँ॑","अ॑ड्डँ॑","इ॒ङ्","इ॒क्","अ॑नुरु॒धँ॒","अ॑नँ॒","अ॑नँ॑","अ॑तिँ॑","अ॑दिँ॑","अ॑न्ध॑","अ॑भ्रँ॑","अ॑मँ॑","अ॑मँ॑","अ॑बिँ॒","अ॑भिँ॒","अ॑यँ॒","अ॑यँ॒॑","अ॑र्कँ॑","अ॑र्घँ॑","अ॑र्चँ॑","अ॑र्चँ॑","अ॑र्जँ॑","अ॑र्जँ॑","अ॑र्थ॒","अ॑र्दँ॑","अ॑र्दँ॑","अ॑र्बँ॑","अ॑र्वँ॑","अ॑र्हँ॑","अ॑र्हँ॑","अ॑र्हँ॑","अ॑लँ॑","अ॑वँ॑","अ॑शँ॑","अ॑शूँ॒","अ॑षँ॒॑","अ॑सुँ॑","अ॑सँ॒॑","अ॑सँ॑","अ॑हँ॑","आ॑क्रन्दँ","आ॑छिँ॑","आ॒पॢँ॑","आ॑पॢँ॑","आ॑श॒सि","आ॑शा॒सुँ","आ॒षदँ","आ॑सँ॒","इ॒ङ्","इ॒ण्","इ॒क्","इ॑खँ॑","इ॑खिँ॑","इ॑गिँ॑","इ॑टँ॑","इ॑दिँ॑","ञिइ॒न्धीँ॑","इ॑विँ॑","इ॑लँ॑","इ॑लँ॑","इ॑षँ॑","इ॑षँ॑","इ॑षँ॑","ई॒ङ्","ई॑क्षँ॒","ई॑खिँ॑","ई॑खिँ॑","ई॑ज॒","ई॑जिँ॒","ई॑डँ॑","ई॑डँ॒","ई॑रँ॑","ई॑रँ॒","ई॑र्क्ष्यँ॑","ई॑र्ष्यँ॑","ई॑शँ॒","ई॑षँ॑","ई॑षँ॒","ई॑हँ॒","उ॒ङ्","उ॑क्षँ॑","उ॑खँ॑","उ॑खिँ॑","उ॑चँ॑","उ॑छीँ॑","उ॑छीँ॑","उ॑ज्झँ॑","उ॑छिँ॑","उ॑छिँ॑","उ॑ठँ॑","उ॑ठँ॒","क॑ठिँ॑","उ॑ज्झँ॑","उ॑घ्र॑सँ॑","उ॑न्दीँ॑","उ॑ब्जँ॑","उ॑भँ॑","उ॑म्भँ॑","उ॑र्दँ॒","उ॑र्वीँ॑","उ॑षँ॑","उ॑हिँ॑र्","ऊ॑ठँ॑","ऊ॑न॑","ऊ॑यीँ॒","ऊ॑र्जँ॑","ऊ॑र्णु॑ञ्","ऊ॑षँ॑","ऊ॑हँ॒","ऋ॒","ऋ॑","ऋ॒","ऋ॑चँ॑","ऋ॑छँ॑","ऋ॑जँ॒","ऋ॑जिँ॒","ऋ॑णुँ॒॑","ऋ॑धुँ॑","ऋ॑धुँ॑","ऋ॑फँ॑","ऋ॑म्फँ॑","ऋ॑षीँ॑","ॠ","ए॑जृँ॒","ए॑जृँ॑","ए॑ठँ॒","ए॑धँ॒","ए॑षृँ॒","ए॑षृँ॒","ओ॑खृँ॑","ओ॑णृँ॑","ओँ॑ल॑डिँ॑","क॑सिँ॒","क॑कँ॒","क॑खँ॑","क॑खेँ॑","क॑गेँ॑","क॑किँ॒","क॑चँ॒","क॑जँ॑","क॑चिँ॒","क॑टीँ॑","क॑टेँ॑","क॑ठँ॑","क॑डँ॑","क॑डँ॑","क॑ड्डँ॑","क॑णँ॑","क॑णँ॑","क॑णँ॑","क॑ठिँ॒","क॑ठिँ॑","क॑डिँ॑","क॑डिँ॑","क॑डिँ॒","क॑त्र॑","क॑त्थँ॒","क॑त्र॑","क॑थ॑","क॑दँ॒","क॑ड्डँ॑","क॑नीँ॑","क॑दिँ॑","क॑दिँ॒","क॑पँ॒","क॑बृँ॒","क॑मुँ॒","क॑पिँ॒","क॑र्जँ॑","क॑र्णँ॑","क॑र्तँ॑","क॑र्दँ॑","क॑र्बँ॑","क॑र्वँ॑","क॑ल॑","क॑ल॑","क॑लँ॒","क॑ल्लँ॒","क॑शँ॒","क॑षँ॑","क॑सँ॒","क॑सँ॑","का॑क्षिँ॑","का॑चिँ॒","का॑ल॑","का॑शृँ॒","का॑शृँ॒","का॑सृँ॒","कि॒","कि॑टँ॑","कि॑टँ॑","कि॑तँ॑","कि॑तँ॑","कि॑लँ॑","की॑टँ॑","की॑लँ॑","कु॒ङ्","कु॒","कु॑ङ्","कु॑शिँ॑","कुं॑शँ॑","कु॑सिँ॑","कुं॑सँ॑","कु॑कँ॒","कु॑चँ॑","कु॑चँ॑","कु॑चँ॑","कु॑जुँ॑","कु॑ञ्चँ॑","कु॑जिँ॑","कु॑टँ॒","कु॑टँ॑","कु॑ट्टँ॑","कु॑ट्टँ॒","कु॑डँ॑","कु॑ण॑","कु॑णँ॑","कु॑टिँ॑","कु॑ठिँ॑","कु॑ठिँ॑","कु॑डिँ॑","कु॑डिँ॒","कु॑डिँ॑","कु॑डिँ॑","कु॑त्सँ॒","कु॑थँ॑","कु॑दृँ॑","कु॑थिँ॑","कु॑न्थँ॑","कु॑द्रिँ॑","कु॑पँ॑","कु॑पँ॑","कु॑मा॑र॑","कु॑बिँ॑","कु॑बिँ॑","कु॑भिँ॑","कु॑रँ॑","कु॑र्द॒","कु॑लँ॑","कु॑शँ॑","कु॑षँ॑","कु॑सँ॑","कु॑स्मँ॒","कु॑ह॒","कू॑ङ्","कू॑जँ॑","कू॑ट॑","कू॑ट॒","कू॑णँ॑","कू॑णँ॒","कू॑लँ॑","डुकृ॒ञ्","कृ॒ञ्","कृ॒ञ्","कृ॑डँ॑","कृ॑विँ॑","कृ॑तीँ॑","कृ॑तीँ॑","कृ॑प॑","कृ॒पे॑श्च॒॑","कृ॑पँ॒","कृ॑पूँ॒","कृ॑शँ॑","कृ॒षँ॒॑","कृ॒षँ॑","कॄ॑","कॄ॑ञ्","कॄ॑","कॄ॑तँ॑","कृ॑पूँ॒","के॑त॑","के॑पृँ॒","के॑लृँ॑","के॑वृँ॒","कै॒","क्न॑थँ॑","क्न॑सुँ॑","क्नू॑ञ्","क्नू॑यीँ॒","क्म॑रँ॑","क्र॑थँ॑","क्र॑दँ॒","क्र॑दिँ॑","क्र॑दिँ॒","क्र॑पँ॒","क्र॑मुँ॑","डुक्री॒ञ्","क्री॑डृँ॑","क्रु॑ञ्चँ॑","क्रु॑डँ॑","क्रु॒धँ॑","क्रु॒शँ॑","क्ल॑थँ॑","क्ल॑दँ॒","क्ल॑दिँ॑","क्ल॑दिँ॒","क्ल॑पँ॑","क्ल॑मुँ॑","क्लि॑दूँ॑","क्लि॑दिँ॒","क्लि॑दिँ॑","क्लि॑शँ॒","क्लि॑शूँ॑","क्ली॑बृँ॒","क्लु॒ङ्","क्ले॑शँ॒","क्व॑णँ॑","क्व॑थेँ॑","क्ष॑जिँ॑","क्ष॑जिँ॒","क्ष॑णुँ॒॑","क्ष॑पँ॑","क्ष॒प॑य॒॑श्च॑","क्ष॑मूँ॑","क्ष॑मूँ॒ष्","क्ष॑पिँ॑","क्ष॑रँ॑","क्ष॑लँ॑","क्षि॑","क्षि॒","क्षि॒","क्षि॑णुँ॒॑","क्षि॒पँ॒॑","क्षि॒पँ॑","क्षि॑वुँ॑","क्षी॑","क्षी॑जँ॑","क्षी॑बृँ॒","क्षी॑वृँ॒","क्षी॒ष्","टु॑क्षु॑","क्षु॒दिँ॒॑र्","क्षु॒धँ॑","क्षु॑भँ॑","क्षु॑भँ॑","क्षु॑भँ॒","क्षु॑रँ॑","क्षु॑रँ॑","क्षे॑वुँ॑","क्षै॒","क्षो॑ट॑","क्ष्णु॑","क्ष्मा॑यीँ॒","क्ष्मी॑लँ॑","ञिक्ष्वि॑दाँ॑","ञिक्ष्वि॑दाँ॑","ञिक्ष्वि॑दाँ॑","क्ष्वे॑लृँ॑","ख॑चँ॑","ख॑जँ॑","ख॑जिँ॑","ख॑टँ॑","ख॑ट्टँ॑","ख॑डँ॑","ख॑डिँ॑","ख॑डिँ॒","ख॑दँ॑","ख॑नुँ॒॑","ख॑र्जँ॑","ख॑र्दँ॑","ख॑र्बँ॑","ख॑र्वँ॑","ख॑लँ॑","ख॑वँ॑","ख॑षँ॑","खा॑दृँ॑","खि॑टँ॑","खि॒दँ॒","खि॒दँ॒","खि॒दँ॑","खु॒ङ्","खु॑जुँ॑","खु॑डँ॑","खु॑डिँ॑","खु॑रँ॑","खु॑र्द॒","खे॑ट॑","खे॑डँ॑","खे॑लृँ॑","खे॑वृँ॒","खै॒","खो॑ट॑","खो॑रृँ॑","खो॑लृँ॑","ख्या॒","ग॑जँ॑","ग॑जँ॑","ग॑जिँ॑","ग॑डँ॑","ग॑ण॑","ग॑डिँ॑","ग॑डिँ॑","ग॑दी॑","ग॑दँ॑","ग॑न्धँ॒","ग॒मॢँ॑","ग॑र्जँ॑","ग॑र्जँ॑","ग॑र्दँ॑","ग॑र्दँ॑","ग॑र्धँ॑","ग॑र्बँ॑","ग॑र्व॒","ग॑र्वँ॑","ग॑र्हँ॒","ग॑र्हँ॑","ग॑लँ॑","ग॑लँ॒","ग॑ल्भँ॒","ग॑ल्हँ॒","ग॑वे॑ष॑","गा॒ङ्","गा॒","गा॑धृँ॒","गा॑हूँ॒","गु॒ङ्","गु॒ङ्","गु॒","गु॑जँ॑","गु॑जँ॑","गु॑जिँ॑","गु॑डँ॑","गु॑ण॑","गु॑ठिँ॑","गु॑डिँ॑","गु॑दँ॒","गु॑धँ॑","गु॑धँ॑","गु॑पँ॑","गु॑पँ॒","गु॑पूँ॑","गु॑पँ॑","गु॑फँ॑","गु॑म्फँ॑","गु॑रीँ॒","गु॑र्द॒","गु॑र्दँ॑","गु॑र्वीँ॑","गु॑हूँ॒॑","गू॑रँ॒","गू॑रीँ॒","गृ॑हूँ॒","गृ॒","गृ॑जँ॑","गृ॑जिँ॑","गृ॑धुँ॑","गृ॑ह॒","गॄ॑","गॄ॑","गॄ॑","गे॑पृँ॒","गे॑वृँ॒","गे॑षृँ॒","गै॒","गो॑म॑","गो॑ष्टँ॒","ग्र॑थिँ॒","ग्र॑न्थँ॑","ग्र॑न्थँ॑","ग्र॑न्थँ॑","ग्र॑सुँ॒","ग्र॑सँ॑","ग्र॑हँ॒॑","ग्रा॑म॑","ग्रु॑चुँ॑","ग्ल॑सुँ॒","ग्ल॑हँ॒","ग्लु॑चुँ॑","ग्लु॑ञ्चँ॑","ग्ले॑पृँ॒","ग्ले॑पृँ॒","ग्ले॑वृँ॒","ग्ले॑षृँ॑","ग्लै॒","घ॑ग्घँ॑","घ॑घँ॑","घ॑टँ॑","घ॑टँ॒","घ॑टँ॑","घ॑ट्टँ॑","घ॑ट्टँ॒","घ॑टिँ॑","घ॑षँ॒","घ॑सॢँ॑","घि॑णिँ॒","घु॒ङ्","घु॑षिँ॒","घु॑टँ॒","घु॑टँ॑","घु॑णँ॑","घु॑णँ॒","घु॑णिँ॒","घु॑रँ॑","घु॑षिँ॑र्","घु॑षिँ॑र्","घू॑री॒","घू॑र्णँ॑","घू॑र्णँ॒","घृ॒","घृ॑","घृ॒","घृ॑णुँ॒॑","घृ॑णिँ॒","घृ॑षुँ॑","घ्रा॒","ध्रा॑घृँ॒","ङु॑ङ्","च॑का॑सृँ॑","च॑कँ॑","च॑कँ॒","च॑क्कँ॑","च॒क्षिँ॒ङ्","च॑ञ्चुँ॑","च॑टँ॑","च॑टेँ॑","च॑णँ॑","च॑डिँ॒","च॑डिँ॑","च॑तेँ॒॑","च॑देँ॒॑","च॑नँ॑","च॑नँ॑","च॑दिँ॑","च॑पँ॑","च॑पँ॑","च॑मुँ॑","च॑मुँ॑","च॑पिँ॑","च॑यँ॒","च॑रँ॑","च॑रँ॑","च॑र्चँ॑","च॑र्चँ॑","च॑र्चँ॑","च॑र्बँ॑","च॑र्वँ॑","च॑लँ॑","च॑लँ॑","च॑लँ॑","च॑षँ॒॑","च॑ह॑","च॑हँ॑","च॑ह॑","चा॑यृँ॒॑","चि॑","चि॑ञ्","चि॒ञ्","चि॑टँ॑","चि॑तँ॒","चि॑तीँ॑","चि॑त्र॑","चि॑तिँ॑","चि॑रि॑","चि॑लँ॑","चि॑ल्लँ॑","ची॑कँ॑","ची॑वँ॑","ची॑बृँ॒॑","ची॑भृँ॒","ची॑वँ॑","ची॑वृँ॒॑","चु॑क्कँ॑","चु॑च्यँ॑","चु॑टँ॑","चु॑टँ॑","चु॑ट्टँ॑","चु॑डँ॑","चु॑ड्डँ॑","चु॑टिँ॑","चु॑डिँ॑","चु॑दँ॑","चु॑ड्डँ॑","चु॑पँ॑","चु॑बिँ॑","चु॑बिँ॑","चु॑रँ॑","चु॑लँ॑","चु॑ल्लँ॑","चू॑रीँ॒","चू॑र्णँ॑","चू॑र्णँ॑","चू॑षँ॑","चृ॑तीँ॑","चृ॑पँ॑","चे॑लृँ॑","चे॑ष्टँ॒","च्यु॑","च्यु॑तिँ॑र्","छ॑जिँ॑","छ॑द॑","छ॑द॑","छ॑द॑","छ॑दिँ॑","छ॑मुँ॑","छ॑र्द॑","छ॑षँ॒॑","छि॒दिँ॒॑र्","छि॑द्र॑","छु॑टँ॑","छु॑डँ॑","छु॒पँ॑","छु॑रँ॑","उँ॑छृ॑दिँ॒॑र्","छृ॑दीँ॑","छृ॑पँ॑","छे॑द॑","छो॒","ज॑सिँ॑","ज॑क्षँ॑","ज॑जँ॑","ज॑जिँ॑","ज॑टँ॑","ज॑नँ॑","ज॑नीँ॒","ज॑पँ॑","ज॑भीँ॒","ज॑मुँ॑","ज॑भिँ॑","ज॑र्त्सँ॑","ज॑र्त्सँ॑","ज॑र्जँ॑","ज॑र्त्सँ॑","ज॑लँ॑","ज॑लँ॑","ज॑ल्पँ॑","ज॑षँ॑","ज॑सुँ॑","ज॑सुँ॑","ज॑सुँ॑","जा॑गृ॑","जि॑","जि॒","जिँ॒","चि॑","जि॑विँ॑","जि॑मुँ॑","जि॑रि॑","जि॑षुँ॑","जी॑वँ॑","जु॒ङ्","जु॒","जु॑गिँ॑","चि॑","जु॑टँ॑","जु॑डँ॑","जु॑डँ॑","जु॑डँ॑","जु॑तृँ॒","जु॑नँ॑","जु॑षँ॑","जु॑षीँ॒","जू॑रीँ॒","जू॑षँ॑","जृ॑भिँ॒","जॄ॑ष्","जॄ॑","जॄ॑","जे॑षृँ॒","जे॑हृँ॒","जै॒","ज्ञ॑पँ॑","ज्ञा॒","ज्ञा॑","ज्या॒","ज्यु॒ङ्","ज्यु॑तिँ॑र्","ज्रि॑","ज्रि॒","ज्व॑रँ॑","ज्व॑लँ॑","ज्व॑लँ॑","झ॑टँ॑","झ॑मुँ॑","झ॑र्त्सँ॑","झ॑र्त्सँ॑","झ॑र्झँ॑","झ॑र्त्सँ॑","झ॑षँ॑","झ॑षँ॒॑","झॄ॑","झॄ॑ष्","ट॑किँ॑","ट॑लँ॑","टि॑कृँ॒","टी॑कृँ॒","ट्व॑लँ॑","ड॑पँ॒","डि॑पँ॑","डि॑पँ॑","डि॑पँ॑","डि॑पँ॒","डी॒ङ्","डी॑ङ्","ढौ॑कृँ॒","त॑सिँ॑","त॑सिँ॑","त॑कँ॑","त॑क्षूँ॑","त॑क्षँ॑","त॑किँ॑","त॑गिँ॑","त॑ञ्चुँ॑","त॑ञ्चूँ॑","त॑टँ॑","त॑डँ॑","त॑डँ॑","त॑डिँ॒","त॑नुँ॒॑","त॑नुँ॑","त॑त्रिँ॒","त॒पँ॒","त॑पँ॑","त॒पँ॑","त॑मुँ॑","त॑यँ॒","त॑र्कँ॑","त॑र्जँ॒","त॑र्जँ॑","त॑र्दँ॑","त॑लँ॑","त॑सुँ॑","ता॑यृँ॒","ति॑कँ॑","ति॑कृँ॒","ति॑गँ॑","ति॑जँ॒","ति॑जँ॑","ति॒पृँ॒","ति॑मँ॑","ति॑लँ॑","ति॑लँ॑","ति॑लँ॑","ति॑ल्लँ॑","ती॑कृँ॒","ती॑मँ॑","ती॑र॑","ती॑वँ॑","तु॑","तु॑जँ॑","तु॑जँ॑","तु॑जिँ॑","तु॑जिँ॑","तु॑जिँ॑","तु॑टँ॑","तु॑डँ॑","तु॑डृँ॑","तु॑णँ॑","तु॑डिँ॑","तु॑डिँ॒","तु॑त्थ॑","तु॒दँ॒॑","तु॑पँ॑","तु॑पँ॑","तु॑फँ॑","तु॑फँ॑","तु॑भँ॑","तु॑भँ॑","तु॑भँ॒","तु॑म्पँ॑","तु॑म्पँ॑","तु॑म्फँ॑","तु॑म्फँ॑","तु॑बिँ॑","तु॑बिँ॑","तु॑रँ॑","तु॑र्वी॑","तु॑लँ॑","तु॒षँ॑","तु॑सँ॑","तु॑हिँ॑र्","तू॑डृँ॑","तू॑णँ॒","तू॑रीँ॒","तू॑लँ॑","तू॑षँ॑","तृं॑हूँ॑","तृ॑क्षँ॑","तृ॑णुँ॒॑","उँ॑तृ॑दिँ॒॑र्","तृ॑पँ॑","तृ॑पँ॑","तृ॑पँ॑","तृ॑पँ॑","तृ॒पँ॑","तृ॑फँ॑","तृ॑म्पँ॑","तृ॑म्फँ॑","ञितृ॑षँ॑","तृ॑हूँ॑","तृ॑हँ॑","तॄ॑","ते॑जँ॑","ते॑पृँ॒","ते॑वृँ॒","त्य॒जँ॑","त्र॑सिँ॑","त्र॑क्षँ॑","त्र॑खँ॑","त्र॑किँ॒","त्र॑गिँ॑","त्र॑दिँ॑","त्र॑पूँ॒ष्","त्र॑सीँ॑","त्र॑सँ॑","त्रि॑खिँ॑","त्रु॑टँ॒","त्रु॑टँ॑","त्रु॑पँ॑","त्रु॑फँ॑","त्रु॑म्पँ॑","त्रु॑म्फँ॑","त्रै॒ङ्","त्रौ॑कृँ॒","त्व॑क्षूँ॑","त्व॑गिँ॑","त्व॑चँ॑","त्व॑ञ्चुँ॑","ञित्व॑राँ॒","त्वि॒षँ॒॑","त्स॑रँ॑","थ॑किँ॑","थु॑डँ॑","थु॑र्वी॑","द॑शिँ॑","द॑शिँ॒","दं॒शँ॑","द॑सिँ॑","द॑सिँ॒","द॑क्षँ॒","द॑क्षँ॒","द॑घँ॑","द॑घिँ॑","द॑ण्ड॑","द॑दँ॒","द॑धँ॒","द॑मुँ॑","द॑म्भुँ॑","द॑यँ॒","द॑रि॑द्रा॑","द॑लँ॑","द॑लँ॑","दा॑शँ॑","द॑सँ॒","द॑सुँ॑","द॒हँ॑","डुदा॒ञ्","दा॒ण्","दा॒प्","दा॑नँ॒॑","दा॑शृँ॒॑","दा॑सृँ॒॑","दि॑विँ॑","दि॑वुँ॑","दि॑वुँ॒","दि॑वुँ॑","दि॒शँ॒॑","दि॒हँ॒॑","दी॑ङ्","दी॑क्षँ॒","दी॑धी॑ङ्","दी॑पीँ॒","दु॒","टु॑दु॒","दुः॑ख॑","दु॑र्वीँ॑","दु॑लँ॑","दु॒षँ॑","दु॑हिँ॑र्","दु॒हँ॒॑","दू॑ङ्","दृ॒ङ्","दृ॑हिँ॑","दृ॑पँ॑","दृ॑पँ॑","दृ॒पँ॑","दृ॑फँ॑","दृ॑भीँ॑","दृ॑भीँ॑","दृ॑भँ॑","दृ॑म्पँ॑","दृ॑म्फँ॑","दृ॑हँ॑","दॄ॑","दॄ॑","दॄ॑","दे॒ङ्","दे॑वृँ॒","दै॒प्","दृ॒शिँ॑र्","दो॒","द्यु॒","द्यु॑तँ॒","द्यै॒","द्र॑मँ॑","द्रा॒","द्रा॑खृँ॑","द्रा॑घृँ॒","द्रा॑क्षिँ॑","द्रा॑डृँ॒","द्रा॑हृँ॒","द्रु॒","द्रु॑णँ॑","द्रु॒हँ॑","द्रू॑ञ्","द्रे॑कृँ॒","द्रै॒","द्वि॒षँ॒॑","द्वृ॒","ध॑क्कँ॑","ध॑णँ॑","ध॑नँ॑","ध॑विँ॑","डुधा॒ञ्","धा॑वुँ॒॑","धि॒","धि॑क्षँ॒","धि॑विँ॑","धि॑षँ॑","धी॒ङ्","धू॑","धु॒ञ्","धु॑क्षँ॒","धू॑पँ॑","धु॑र्वीँ॑","धू॑","धू॑ञ्","धू॑ञ्","धू॑ञ्","धू॑पँ॑","धू॑पँ॑","धू॑री॒","धू॑शँ॑","धू॑षँ॑","धू॑सँ॑","धृ॒ङ्","धृ॒ङ्","धृ॒ञ्","धृ॑जँ॑","धृ॑जिँ॑","धृ॑षँ॑","ञिधृ॑षाँ॑","धॄ॑","धे॒ट्","धे॑पृँ॒","धो॑रृँ॑","ध्मा॒","ध्मा॑क्षिँ॑","ध्यै॒","ध्र॑जँ॑","ध्र॑जिँ॑","ध्र॑णँ॑","उँ॑ध्र॑सँ॑","उँ॑ध्र॒सँ॑","ध्रा॑खृँ॑","ध्रा॑क्षिँ॑","ध्रा॑डृँ॒","ध्रि॑जँ॑","ध्रु॒","ध्रु॒","ध्रे॑कृँ॒","ध्रै॒","ध्वं॑सुँ॒","ध्व॑जँ॑","ध्व॑जिँ॑","ध्व॑णँ॑","ध्व॑न॑","ध्व॑नँ॑","ध्व॑नँ॑","ध्वा॑क्षिँ॑","ध्वृ॒","न॑क्कँ॑","ण॑क्षँ॑","ण॑खँ॑","ण॑खिँ॑","ण॑टँ॑","न॑टँ॑","न॑टँ॑","ण॑टँ॑","ण॑डँ॑","ण॑दँ॑","टुन॑दिँ॑","ण॑भँ॑","ण॑भँ॑","ण॑भँ॒","ण॒मँ॑","ण॑यँ॒","न॑र्दँ॑","न॑लँ॑","ण॑लँ॑","ण॒शँ॑","ण॑सँ॒","ण॒हँ॒॑","ना॑थृँ॒","ना॑धृँ॒","णा॑सृँ॒","णि॑सिँ॒","णि॑क्षँ॑","णि॒जिँ॒॑र्","णि॑जिँ॒","णि॑दृँ॒॑","णि॑दिँ॑","णि॑विँ॑","णि॑लँ॑","नि॑वा॑स॑","णि॑शँ॑","णि॑षुँ॑","नि॑ष्कँ॒","णी॒ञ्","णी॑लँ॑","णी॑वँ॑","णू॑","णु॑","णु॒दँ॑","णु॒दँ॒॑","णू॑","नृ॑तीँ॑","नॄ॑","नॄ॑","णे॑दृँ॒॑","णे॑षृँ॒","प॑सिँ॑","प॑सिँ॑","प॑क्षँ॑","प॑क्षँ॑","डुप॒चँ॒॑ष्","प॑चिँ॑","प॑चिँ॒","प॑ट॑","प॑ट॑","प॑टँ॑","प॑ठँ॑","प॑णँ॒","प॑डिँ॑","प॑डिँ॒","प॑त॑","प॑तॢँ॑","प॑थँ॑","प॑थेँ॑","प॑द॒","प॒दँ॒","प॑नँ॒","प॑थिँ॑","प॑यँ॒","प॑र्ण॑","प॑र्दँ॒","प॑र्पँ॑","प॑र्बँ॑","प॑र्वँ॑","प॑लँ॑","प॑लँ॑","प॑ल्यू॑ल॑","पे॑लृँ॑","प॑शँ॑","प॑ष॑","पा॒","पा॒","पा॑र॑","पा॑लँ॑","पि॒","पि॑सिँ॑","पि॑छँ॑","पि॑जँ॑","पि॑जिँ॑","पि॑जिँ॑","पि॑जिँ॒","पि॑टँ॑","पि॑ठँ॑","पि॑ठिँ॑","पि॑डिँ॑","पि॑डिँ॒","पि॑विँ॑","पि॑शँ॑","पि॑शँ॑","पि॒षॢँ॑","पि॑सृँ॑","पि॑सँ॑","पी॒ङ्","पी॑डँ॑","पी॑लँ॑","पी॑वँ॑","पुं॑सँ॑","पु॑ट॑","पु॑ट॑","पु॑टँ॑","पु॑टँ॑","पु॑ट्टँ॑","पु॑डँ॑","पु॑डँ॑","पु॑णँ॑","पु॑णँ॑","पु॑टिँ॑","पु॑डिँ॑","पु॑थँ॑","पु॑थँ॑","पु॑थिँ॑","पु॑रँ॑","पु॑र्वँ॑","पु॑लँ॑","पु॑लँ॑","पु॑षँ॑","पु॑षँ॑","पु॒षँ॑","पु॑षँ॑","पु॑षँ॑","पु॑ष्पँ॑","पु॑स्तँ॑","पू॑ञ्","पू॑ङ्","पू॑जँ॑","पू॑यीँ॒","पू॑रीँ॑","पू॑रीँ॒","पू॑र्णँ॑","पु॑र्वँ॑","पू॑र्वँ॑","पू॑लँ॑","पू॑लँ॑","पू॑षँ॑","पृ॒","पृ॒","पृ॒ङ्","पृ॑चँ॑","पृ॑चीँ॑","पृ॑चीँ॒","पृ॑जिँ॒","पृ॑डँ॑","पृ॑णँ॑","पृ॑थँ॑","पृ॑षुँ॑","पॄ॑","पॄ॑","पॄ॒","पे॑लृँ॑","पे॑वृँ॒","पे॑षृँ॒","पे॑सृँ॑","पै॒","पै॑णृँ॑","ओँ॑प्या॑यीँ॒","प्यु॑षँ॑","प्यु॑सँ॑","प्यै॒ङ्","प्र॒छँ॑","प्र॑थँ॑","प्र॑थँ॒","प्र॑सँ॒","प्रा॒","प्री॑ञ्","प्री॒ञ्","प्री॒ङ्","प्रु॒ङ्","प्रु॑षुँ॑","प्रु॑षँ॑","प्रे॑षृँ॒","प्रै॑णृँ॑","प्रो॑थृँ॒॑","प्ल॑क्षँ॒॑","प्लि॑हँ॒","प्ली॒","प्लु॒ङ्","प्लु॑षँ॑","प्लु॑षँ॑","प्लु॑षुँ॑","प्लु॑षँ॑","प्ले॑वृँ॒","प्सा॒","फ॑क्कँ॑","फ॑णँ॑","फ॑लँ॑","ञिफ॑लाँ॑","फु॑ल्लँ॑","फे॑लृँ॑","ब॑हिँ॒","ब॑ठँ॑","ब॑णँ॑","ब॑टिँ॑","ब॑दँ॑","ब॑धँ॒","ब॑धँ॑","ब॑न्धँ॑","ब॒न्धँ॑","व॑भ्रँ॑","ब॑र्बँ॑","ब॑र्हँ॑","ब॑र्हँ॒","ब॑र्हँ॑","ब॑लँ॑","ब॑लँ॑","ब॑ल्हँ॑","ब॑ल्हँ॒","ब॑ष्कँ॑","ब॑सुँ॑","ब॑स्तँ॒","बा॑डृ॒","बा॑धृँ॒","बा॑हृँ॒","बि॑टँ॑","बि॑दिँ॑","बि॑लँ॑","बि॑लँ॑","बि॑सँ॑","वि॑सँ॑","बी॑भृँ॒","बु॑क्कँ॑","बु॑क्कँ॑","बु॑गिँ॑","बु॒धँ॒","बु॑धँ॑","बु॑धिँ॒॑र्","उँ॑बु॑न्दिँ॒॑र्","बु॑सँ॑","बु॑सँ॑","बु॑स्तँ॑","बृ॑हिँ॑","बृ॑हिँ॑","बृ॑हँ॑","बृ॑हूँ॑","बे॑सँ॑","वे॑हृँ॒","ब्यु॑सँ॑","व्र॑णँ॑","ब्रू॑ञ्","ब्रू॑सँ॑","ब्ली॒","भ॑क्षँ॒॑","भ॑क्षँ॑","भ॑जँ॑","भ॒जँ॒॑","भ॑जिँ॑","भ॒ञ्जोँ॑","भ॑टँ॑","भ॑टँ॑","भ॑णँ॑","भ॑डिँ॑","भ॑डिँ॒","भ॑दिँ॒","भ॑र्त्सँ॒","भ॑र्बँ॑","भ॑र्भँ॑","भ॑र्वँ॑","भ॑लँ॒","भ॑लँ॒","भ॑ल्लँ॒","भ॑षँ॑","भ॑सुँ॑","भ॑सँ॑","भा॒","भा॑ज॑","भा॑म॑","भा॑मँ॒","भा॑षँ॒","भा॑सृँ॒","भि॑क्षँ॒","भि॒दिँ॒॑र्","ञिमि॑दाँ॒","भि॑दिँ॑","ञिभी॒","भु॒जोँ॑","भु॒जँ॑","भू॑","भू॑","भू॑","भू॑षँ॑","भू॑षँ॑","डुभृ॒ञ्","भृ॒ञ्","भृ॑शिँ॑","भृं॑शुँ॑","भृ॑जीँ॒","भृ॑डँ॑","भृ॑शुँ॑","भॄ॑","भे॑षृँ॒॑","भ्य॑सँ॒","भ्रं॑शुँ॑","भ्रं॑शुँ॑","भ्रं॑सुँ॒","भ्र॑क्षँ॒॑","भ्र॒स्जँ॒॑","भ्र॑णँ॑","भ्र॑मुँ॑","भ्र॑मुँ॑","भ्र॒स्जँ॒॑","टुभ्रा॑जृँ॒","भ्रा॑जृँ॒","टुभ्रा॑शृँ॒","भ्री॒","भ्रू॑णँ॒","भ्रे॑जृँ॒","भ्रे॑षृँ॒॑","भ्ल॑क्षँ॒॑","टुभ्ला॑शृँ॒","भ्ले॑षृँ॒॑","म॑हिँ॑","म॑हिँ॒","म॑खँ॑","म॑किँ॒","म॑खिँ॑","म॑गिँ॑","म॑घिँ॒","म॑घिँ॑","म॑चँ॒","टुम॒स्जोँ॑","म॑चिँ॒","म॑ठँ॑","म॑णँ॑","म॑ठिँ॒","म॑डिँ॒","म॑डिँ॑","म॑डिँ॑","म॑थेँ॑","म॑दँ॒","म॑दीँ॑","म॑नुँ॒","म॒नँ॒","मा॑नँ॒","म॑त्रिँ॒","म॑न्थँ॑","म॑न्थँ॑","म॑थिँ॑","म॑दिँ॒","म॑भ्रँ॑","म॑यँ॒","म॑र्चँ॑","म॑र्बँ॑","म॑र्वँ॑","म॑लँ॒","म॑ल्लँ॒","म॑वँ॑","म॑व्यँ॑","म॑शँ॑","म॑षँ॑","म॑स्कँ॒","म॑सीँ॑","म॑स्कँ॒","टुम॒स्जोँ॑","म॑ह॑","म॑हँ॑","मा॒ङ्","मा॒","मा॒ङ्","मा॑क्षिँ॑","म॑नँ॒","मा॑नँ॑","मा॑नँ॒","मा॑र्गँ॑","मा॑र्जँ॑","मा॑हृँ॒॑","डुमि॒ञ्","मि॑छँ॑","मि॑जिँ॑","मि॑थृँ॒॑","मि॑दृँ॒॑","मि॑दँ॑","ञिमि॑दाँ॑","मि॑धृँ॒॑","मि॑दिँ॑","मि॑विँ॑","मि॑लँ॑","मि॑लँ॒॑","मि॑शँ॑","मि॑श्र॑","मि॑षुँ॑","मि॑षँ॑","मि॒हँ॑","मी॑","मी॒ङ्","मी॒ञ्","मी॑मृँ॑","मी॑लँ॑","मी॑वँ॑","मु॑खिँ॑","मु॑चँ॑","मु॒चॢँ॒॑॑","मु॑जँ॑","मु॑चि॒","मु॑जिँ॑","मु॑टँ॑","मु॑टँ॑","मु॑टँ॑","मु॑डँ॑","मु॑णँ॑","मु॑ठिँ॒","मु॑डिँ॑","मु॑डिँ॒","मु॑दँ॑","मु॑दँ॒","मु॑रँ॑","मु॑र्छाँ॑","मु॑र्वीँ॑","मु॑षँ॑","मु॑सँ॑","मु॑स्तँ॑","मु॒हँ॑","मू॑ञ्","मू॑ङ्","मू॑त्र॑","मू॑लँ॑","मू॑लँ॑","मू॑षँ॑","मृ॒ङ्","मृ॑क्षँ॑","मृ॑ग॒","मृ॑जूँ॑","मृ॑जूँ॑","मृ॑डँ॑","मृ॑डँ॑","मृ॑णँ॑","मृ॑डिँ॑","मृ॑दँ॑","मृ॑धुँ॒॑","मृ॒शँ॑","मृ॑षँ॒॑","मृ॑षँ॒॑","मृ॑षुँ॑","मॄ॑","मे॒ङ्","मे॑थृँ॒॑","मे॑दृँ॒॑","मे॑धृँ॒॑","मे॑पृँ॒","मे॑वृँ॒","मो॑क्षँ॑","म्ना॒","म्र॑क्षँ॑","म्र॑क्षँ॑","म्र॑क्षँ॑","म्र॑छँ॑","म्र॑दँ॒","म्रु॑चुँ॑","म्रु॑ञ्चुँ॑","म्रे॑टृँ॑","म्रे॑डृँ॑","म्लु॑चुँ॑","म्लु॑ञ्चुँ॑","म्ले॑छँ॑","म्ले॑छँ॑","म्ले॑टृँ॑","म्ले॑वृँ॒","म्लै॒","य॑क्षँ॒","य॒जँ॒॑","य॑तँ॑","य॑तीँ॒","य॑त्रिँ॑","य॒भँ॑","य॒मँ॑","य॑मँ॑","य॑सुँ॑","या॒","टुया॑चृँ॒॑","यु॑","यु॒ञ्","यु॑","यु॑गिँ॑","यु॑छँ॑","यु॑जँ॑","यु॒जिँ॒॑र्","यु॒जँ॒","यु॑तृँ॒","यु॒धँ॒","यु॑पँ॑","यू॑षँ॑","ये॑षृँ॒","यौ॑टृँ॑","र॑हिँ॑","र॑हिँ॑","र॑कँ॑","र॑क्षँ॑","र॑खँ॑","र॑गँ॑","र॑गेँ॑","र॑घँ॑","र॑खिँ॑","र॑ङ्गँ॑","र॑गिँ॑","र॑घिँ॑","र॑घिँ॒","र॑च॑","र॒ञ्जँ॒॑","र॒ञ्जँ॒॑","र॑टँ॑","र॑टँ॑","र॑टँ॑","र॑ठँ॑","र॑णँ॑","र॑णँ॑","र॑विँ॑","र॑दँ॑","र॒धँ॑","र॑पँ॑","र॑फँ॑","र॒भँ॒","र॒मुँ॒","र॑फिँ॑","र॑बिँ॒","र॑भिँ॒","र॑यँ॒","र॑स॑","र॑सँ॑","र॑ह॑","र॑ह॑","र॑हँ॑","रा॒","रा॑खृँ॑","रा॑घृँ॒","रा॑जृँ॒॑","रा॒धँ॑","रा॒धः","रा॑सृँ॒","रि॑","रि॒","रि॑खँ॑","रि॑खिँ॑","रि॑गिँ॑","रि॑चँ॑","रि॒चिँ॒॑र्","रि॑विँ॑","रि॑फँ॑","रि॒शँ॑","रि॑षँ॑","रि॑षँ॑","रि॑हँ॑","री॒","री॒ङ्","रु॒ङ्","रु॑","रु॑शिँ॑","रु॑सिँ॑","रु॑चँ॒","रु॒जोँ॑","रु॑जँ॑","रु॑टँ॑","रु॑टँ॒","रु॑टँ॑","रु॑ठँ॑","रु॑टिँ॑","रु॑ठिँ॑","रु॑ठिँ॑","रु॑डिँ॑","रु॑दिँ॑र्","रु॒धिँ॒॑र्","रु॑पँ॑","रु॒शँ॑","रु॑षँ॑","रु॑षँ॑","रु॑षँ॑","रु॒हँ॑","रू॑क्ष॑","रू॑प॑","रू॑षँ॑","रे॑कृँ॒","रे॑जृँ॒","रे॑टृँ॒॑","रे॑पृँ॒","रे॑भृँ॒","रे॑वृँ॒","रे॑षृँ॒","रै॒","रो॑डृँ॑","रौ॑डृँ॑","ल॑क्षँ॒","ल॑क्षँ॑","ल॑खँ॑","ल॑गँ॑","ल॑गेँ॑","ल॑खिँ॑","ल॑गिँ॑","ल॑घिँ॑","ल॑घिँ॑","ल॑घिँ॒","ल॑घिँ॑","ल॑छँ॑","ल॑ज॑","ल॑ज॑","ल॑जँ॑","ओँ॑ल॑जीँ॒","ओँ॑ल॑स्जीँ॒","ल॑जि॑","ल॑जि॑","ल॑जिँ॑","ल॑जि॑","ल॑टँ॑","ल॑डँ॑","ल॑डँ॑","ल॑डिँ॑","ओँ॑ल॑डिँ॑","ल॑पँ॑","डुल॒भँ॒ष्","ल॑बिँ॒","ल॑बिँ॒","ल॑भिँ॒","ल॑यँ॒","ल॑र्बँ॑","ल॑लँ॑","ल॑लँ॒","ल॑षँ॒॑","ल॑सँ॑","ल॑सँ॑","ओँ॑ल॑स्जीँ॒","ला॒","ला॑खृँ॑","ला॑घृँ॒","ला॑जँ॑","ला॑छिँ॑","ला॑जिँ॑","ला॑भ॑","लि॑खँ॑","लि॑खँ॑","लि॑खिँ॑","लि॑गिँ॑","लि॑गिँ॑","लि॑जिँ॑","लि॒पँ॒॑","लि॒शँ॒","लि॒शँ॑","लि॒हँ॒॑","ली॑","ली॒ङ्","ली॒","लु॑ञ्चँ॑","लु॑जिँ॑","लु॑जिँ॑","लु॑टँ॒","लु॑टँ॑","लु॑टँ॑","लु॑टँ॑","लु॑टँ॑","लु॑ठँ॒","लु॑ठँ॑","लु॑ठँ॑","लु॑ठँ॑","लु॑डँ॑","लु॑डँ॑","लु॑ण्टँ॑","लु॑टिँ॑","लु॑ण्ठँ॑","लु॑ठिँ॑","लु॑ठिँ॑","लु॑ठिँ॑","लु॑डिँ॑","लु॑थिँ॑","लु॒पॢँ॒॑॑","लु॑पँ॑","लु॑भँ॑","लु॑भँ॑","लु॑बिँ॑","लु॑बिँ॑","लू॑ञ्","लू॑षँ॑","लू॑षँ॑","ले॑पृँ॒","लो॑कृँ॑","लो॑कृँ॒","लो॑चृँ॑","लो॑चृँ॒","लो॑डृँ॑","लो॑ष्टँ॒","व॑क्षँ॑","व॑खँ॑","व॑किँ॒","व॑किँ॒","व॑खिँ॑","व॑गिँ॑","व॑घिँ॒","व॑चँ॑","व॒चँ॑","व॑जँ॑","व॑ञ्चुँ॑","व॑ञ्चुँ॒","व॑ट॑","व॑ट॑","व॑टँ॑","व॑टँ॑","व॑ठँ॑","व॑णँ॑","व॑टि॑","व॑टिँ॑","व॑टि॑","व॑ठिँ॒","व॑डिँ॑","व॑डिँ॒","व॑दँ॒॑","व॑दँ॑","व॑नँ॑","व॑नुँ॑","व॑नुँ॒","व॑नँ॑","व॑दिँ॒","डुव॒पँ॒॑","व॑भ्रँ॑","टुव॑मँ॑","व॑यँ॒","व॑र॑","व॑र्चँ॒","व॑र्ण॑","व॑र्ण॑","व॑र्धँ॑","व॑र्षँ॒","ब॑र्हँ॑","व॑र्हँ॒","व॑र्हँ॑","व॑ल॒","व॑ल्कँ॑","व॑ल्गँ॑","व॑ल्भँ॒","व॑ल्लँ॒","ब॑ल्हँ॑","व॑ल्हँ॒","व॑शँ॑","व॑षँ॑","व॑स्कँ॒","व॑स॑","व॑सँ॒","व॒सँ॑","व॑सुँ॑","व॑स॑","व॑स्कँ॒","व॑स्तँ॒","व॒हँ॒॑","वा॒","वा॑क्षिँ॑","वा॑छिँ॑","वा॑डृ॒","वा॑त॑","वा॑वृ॑तुँ॒","वा॑शृँ॒","वा॑स॑","बा॑हृँ॒","वि॒चिँ॒॑र्","वि॑छँ॑","वि॑छँ॑","वि॒जिँ॒॑र्","ओँ॑वि॑जीँ॒","ओँ॑वि॑जीँ॑","वि॑टँ॑","वि॑थृँ॒","वि॑दँ॒","वि॑दँ॑","वि॑दॢँ॒॑॑","वि॒दँ॒","वि॒दँ॒","वि॑धँ॑","वि॑पँ॑","वि॑लँ॑","वि॑लँ॑","वि॒शँ॑","वि॑षुँ॑","वि॒षँ॑","वि॒षॢँ॒॑॑","वि॑ष्क॑","वि॑ष्क॒","वि॑सँ॑","बि॑सँ॑","वी॒","वी॑जँ॒","वी॑र॒","वु॑गिँ॑","वु॑सँ॑","वृ॑ञ्","वृ॑ञ्","वृ॑ङ्","बृ॑हिँ॑","बृ॑हिँ॑","वृ॑कँ॒","वृ॑क्षँ॒","वृ॑जीँ॑","वृ॑जीँ॒","वृ॑जीँ॑","वृ॑जिँ॒","वृ॑णँ॑","वृ॑तुँ॑","वृ॑तुँ॒","वृ॑तुँ॒","वृ॑धुँ॑","वृ॑धुँ॒","वृ॑शँ॑","वृ॑षुँ॑","वृ॑षँ॒","बृ॑हँ॑","वृ॑हूँ॑","वॄ॑ञ्","वॄ॑","वे॒ञ्","वे॑णृँ॒॑","वे॑थृँ॒","वे॑नृँ॒॑","टुवे॑पृ॒","वे॑ल॑","वे॑लृँ॑","वे॑ल्लँ॑","वे॑वी॑ङ्","वे॑ष्टँ॒","वे॑सँ॑","वे॑हृँ॒","वे॑ल्लँ॑","ओँ॑वै॑","व्य॑चँ॑","व्य॑थँ॒","व्य॒धँ॑","व्य॑पँ॑","व्य॑य॑","व्य॑य॑","व्य॑यँ॒॑","व्यु॑षँ॑","व्यु॑षँ॑","व्यु॑सँ॑","व्यु॑सँ॑","व्ये॒ञ्","व्र॑जँ॑","व्र॑जँ॑","व्र॑जँ॑","व्र॑जिँ॑","व्र॑ण॑","व्र॑णँ॑","ओँ॑व्र॑श्चूँ॑","व्री॒","व्री॒ङ्","व्री॑डँ॑","व्रु॑डँ॑","व्रू॑षँ॑","व्रू॑सँ॑","व्ली॒","शं॑सुँ॑","श॒कँ॒॑","श॒कॢँ॑","श॑किँ॒","श॑चँ॒","श॑टँ॑","श॑ठ॑","श॑ठ॑","श॑ठँ॑","श॑ठ॒","श॑णँ॑","श॑डिँ॒","श॒दॢँ॑","श॒दॢँ॑","श॒पँ॒॑","श॒पँ॒॑","श॑ब्दँ॑","श॑मँ॒","श॑मुँ॑","श॑म्बँ॑","श॑र्बँ॑","श॑र्वँ॑","श॑लँ॑","श॑लँ॒","श॑ल्भँ॒","श॑वँ॑","श॑शँ॑","श॑षँ॑","श॑सुँ॑","शा॑खृँ॑","शा॑डृँ॒","शा॑नँ॒॑","शा॑न्त्वँ॑","शा॑सुँ॑","शि॒ञ्","शि॑क्षँ॒","शि॑खिँ॑","शि॑घिँ॑","शि॑जिँ॒","शि॑टँ॑","शि॑लँ॑","शि॑षँ॑","शि॑षँ॑","शि॒षॢँ॑","शी॑ङ्","शी॑कँ॑","शी॑कँ॑","शी॑कृँ॒","शी॑भृँ॒","शी॑ल॑","शी॑लँ॑","शु॑कँ॑","ईँ॑शु॑चिँ॒॑र्","शु॑चँ॑","शु॑च्यँ॑","शु॑ठँ॑","शु॑ठँ॑","शु॑ठिँ॑","शु॑ठिँ॑","शु॑ठिँ॑","शु॒धँ॑","शु॑नँ॑","शु॑न्धँ॑","शु॑न्धँ॑","शु॑भँ॑","शु॑भँ॑","शु॑भँ॒","शु॑म्भँ॑","शु॑म्भँ॑","शु॑ल्कँ॑","शु॑ल्बँ॑","शु॒षँ॑","शू॑र॒","शू॑रीँ॒","शू॑र्पँ॑","शू॑लँ॑","शू॑षँ॑","शृ॑धुँ॒॑","शृ॑धुँ॑","शृ॑धुँ॒","शॄ॑","शे॑लृँ॑","शे॑वृँ॒","शै॒","शो॒","शो॑णृँ॑","शौ॑टृँ॑","श्चु॑तिँ॑र्","श्च्यु॑तिँ॑र्","श्न॑थँ॑","श्मी॑लँ॑","स्य॑न्दूँ॒","च्यु॒ङ्","श्यै॒ङ्","स्रं॑सुँ॒","स्रं॑सुँ॒","श्र॑किँ॒","श्र॑गिँ॑","श्र॑णँ॑","श्र॑णँ॑","श्र॑थ॑","श्र॑थँ॑","श्र॑थ॑","श्र॑थ॑","श्र॑न्थँ॑","श्र॑न्थँ॑","श्र॑न्थँ॑","श्र॑थिँ॒","श्र॑मुँ॑","श्र॑म्भुँ॒","श्रा॒","श्रा॑","श्रि॑ञ्","श्रि॑षुँ॑","श्री॒ञ्","श्रु॒","श्रै॒","श्रो॑णृँ॑","श्ल॑किँ॒","श्ल॑गिँ॑","श्ल॑थँ॑","श्ला॑खृँ॑","श्ला॑घृँ॒","श्लि॑षुँ॑","श्लि॒षँ॑","श्लि॑षँ॑","श्लो॑कृँ॒","श्लो॑णृँ॑","श्व॑किँ॒","श्र॑गिँ॑","श्व॑चँ॒","श्व॑चिँ॒","श्व॑ठ॑","श्व॑ठ॑","श्व॑ठिँ॑","श्व॑भ्रँ॑","श्व॑र्तँ॑","श्व॑लँ॑","श्व॑ल्कँ॑","श्व॑ल्लँ॑","श्व॑सँ॑","टुओँश्वि॑","श्वि॑ताँ॑","श्वि॑दिँ॒","ष्ट्यै॒","ष्ठि॑वुँ॑","ष्ठि॑वुँ॑","ष्व॑स्कँ॒","ष्व॑स्कँ॒","ष॑स्तिँ॑","ष॑गेँ॑","स॑ङ्के॑तँ॑","स॑ङ्ग्रा॑म॒","ष॑चँ॒॑","ष॑चँ॒","ष॑स्जँ॑","ष॒ञ्जँ॑","ष॑टँ॑","ष॑ट्टँ॑","स॑त्र॒","स॑त्र॒","ष॒दॢँ॑","ष॒दॢँ॑","ष॑घँ॑","ष॑नुँ॒॑","ष॑नँ॑","ष॑पँ॑","स॑भा॑ज॑","ष॑मँ॑","स॑मीँ॑","ष॑म्बँ॑","सा॑र॑","ष॑र्क्षँ॑","ष॑र्जँ॑","ष॑र्बँ॑","ष॑र्वँ॑","ष॑लँ॑","ष॑सँ॑","ष॑स्जँ॑","ष॑हँ॑","ष॑हँ॑","ष॑हँ॒","सा॒धँ॑","षा॑न्त्वँ॑","सा॑म॑","सा॑म्बँ॑","सा॑र॑","षि॒ञ्","षि॒ञ्","षि॒चँ॒॑","षि॑टँ॑","षि॑धँ॑","षि॑धूँ॑","षि॒धुँ॑","षि॑विँ॑","षि॑भुँ॑","षि॑म्भुँ॑","षि॑लँ॑","षि॑वुँ॑","सी॑कृँ॒","षु॒ञ्","षु॒","षु॒","सु॑ख॑","षु॑ट्टँ॑","षु॑रँ॑","षु॑हँ॑","षू॑ङ्","षू॑ङ्","षू॑","सू॑च॑","सू॑त्र॑","षू॑दँ॒","षू॑दँ॑","सू॑र्क्षँ॑","षू॑र्क्ष्यँ॑","सू॑षँ॑","सृ॒","सृ॒","सृ॒जँ॒","सृ॒जँ॑","सृ॒पॢँ॑","षृ॑भुँ॑","षृ॑म्भुँ॑","से॑कृँ॒","षे॑लृँ॑","षे॑वृँ॒","षै॒","षो॒","स्क॒न्दिँ॑र्","स्क॒म्भुँ॑","स्क॑भिँ॒","स्कु॒ञ्","स्कु॑दिँ॒","स्कु॒म्भुँ॑","स्ख॑दँ॒","स्ख॑लँ॑","ष्ट॑कँ॑","स्त॑न॑","ष्ट॑नँ॑","ष्ट॑मँ॑","ष्ट॑भिँ॒","स्त॒म्भुँ॑","ष्ठ॑लँ॑","ष्टि॑घँ॒","ष्टि॑पृँ॒","ष्टि॑मँ॑","ष्टी॑मँ॑","ष्टु॒ञ्","ष्टु॑चँ॒","ष्टु॑पँ॑","ष्टु॑पँ॑","ष्टु॑भुँ॒","स्तु॒म्भुँ॑","ष्टू॑पँ॑","ष्टू॑पँ॑","स्तृ॒ञ्","ष्टृ॑क्षँ॑","स्तृ॑हूँ॑","स्तॄ॑ञ्","स्ते॑न॑","ष्टे॑पृँ॒","ष्टै॒","स्तो॑मँ॑","स्त्यै॒","ष्ट्र॑क्षँ॑","ष्ठ॑गेँ॑","ष्ठा॒","स्थु॑डँ॑","स्थू॑ल॒","ष्ण॑सुँ॑","ष्णा॒","ष्णि॒हँ॑","ष्णि॑हँ॑","ष्णु॑","ष्णु॑सुँ॑","ष्णु॒हँ॑","ष्णै॒","स्प॑दिँ॒","स्प॑र्धँ॒","स्प॑शँ॒","स्प॑शँ॒॑","स्पृ॒","स्पृ॒शँ॑","स्पृ॑ह॑","स्फ॑रँ॑","स्फ॑लँ॑","स्फा॑यीँ॒","स्फि॑टँ॑","स्फि॑ट्टँ॑","स्फु॑टँ॑","स्फु॑टँ॑","स्फु॑टँ॒","स्फु॑टिँ॑र्","स्फु॑डँ॑","स्फु॑टिँ॑","स्फु॑टिँ॑","स्फु॑डिँ॑","स्फु॑डिँ॒","स्फु॑रँ॑","स्फु॑र्छाँ॑","स्फु॑लँ॑","टुओँस्फू॑र्जाँ॑","ष्मि॑ङ्","ष्मि॒ङ्","स्मि॑टँ॑","स्मी॑लँ॑","स्मृ॒","स्मृ॑","स्मृ॒","स्य॑मुँ॑","स्य॑मँ॒","स्रं॑सुँ॒","स्र॑किँ॒","स्र॑म्भुँ॒","स्र॑म्भुँ॒","स्रि॑वुँ॑","स्रु॒","स्रे॑कृँ॒","स्रै॒","स्रो॑कृँ॒","ष्व॑किँ॒","श्र॑गिँ॑","ष्व॒ञ्जँ॒","ष्व॑दँ॒","ष्व॑दँ॑","स्व॑नँ॑","स्व॑नँ॑","ञिष्व॒पँ॑","स्व॑र॑","स्व॑र्तँ॑","स्व॑र्दँ॒","ष्व॑स्कँ॒","ष्व॑स्कँ॒","स्वा॑दँ॑","स्वा॑दँ॒","ष्वि॒दाँ॑","ञिष्वि॑दाँ॒","स्वृ॒","ह॑टँ॑","ह॑ठँ॑","ह॒दँ॒","ह॒नँ॑","ह॑म्मँ॑","ह॑र्यँ॑","ह॑यँ॑","ह॑लँ॑","ह॑सेँ॑","ह॑स्तँ॒","ओँ॑हा॒ङ्","ओँ॑हा॒क्","हि॒","हि॑सिँ॑","हि॑सिँ॑","हि॑क्कँ॒॑","हि॑टँ॑","हि॑डिँ॒","हि॑विँ॑","हि॑लँ॑","हि॑ष्कँ॒","हु॒","हु॑डृँ॑","हु॑डँ॑","हु॑डिँ॒","हु॑डिँ॒","हु॑र्छाँ॑","हु॑लँ॑","हु॑लँ॑","हू॑डृँ॑","हृ॒","हृ॒ञ्","हृ॑षुँ॑","हृ॑षँ॑","ह्र॑सँ॑","हे॑ठँ॑","हे॑ठँ॒","हे॑ठँ॑","हे॑डृँ॒","हे॑डँ॑","हे॑ढँ॑","हे॑पृँ॒","हे॑षृँ॒","हो॑डृँ॒","हो॑डृँ॑","ह्नु॒ङ्","ह्म॑लँ॑","ह्र॑गेँ॑","ह्र॑पँ॑","ह्र॑सँ॑","ह्रा॑दँ॒","ह्री॒","ह्री॑छँ॑","ह्रे॑षृँ॒","ह्ल॑गेँ॑","ह्ल॑पँ॑","ह्ल॑सँ॑","ह्ला॑दीँ॒","ह्व॑लँ॑","ह्वृ॒","ह्वृ॒","ह्वे॒ञ्");
$anudAttetverbs=array("ahi!","aki!","aGi!","awwa!","aRa!","aWi!","anuruDa!","ana!","abi!","aBi!","aya!","arTa!","aSU!","Asa!","Ikza!","Iji!","Iqa!","Ira!","ISa!","Iza!","Iha!","uWa!","urda!","UyI!","Uha!","fja!","fji!","ejf!","eWa!","eDa!","ezf!","ezf!","kasi!","kaka!","kaki!","kaca!","kaci!","kaWi!","kaqi!","katTa!","kada!","kadi!","kapa!","kabf!","kamu!","kapi!","kala!","kalla!","kaSa!","kasa!","kAci!","kASf!","kASf!","kAsf!","kuka!","kuwa!","kuwwa!","kuqi!","kutsa!","kusma!","kuha!","kUwa!","kURa!","kfpa!","kfpU!","kfpU!","kepf!","kevf!","knUyI!","krada!","kradi!","krapa!","klada!","kladi!","klidi!","kliSa!","klIbf!","kleSa!","kzaji!","kzamU!z","kzIbf!","kzIvf!","kzuBa!","kzmAyI!","Kaqi!","Kida!","Kida!","Kevf!","ganDa!","garva!","garha!","gala!","galBa!","galha!","gADf!","gAhU!","guda!","gupa!","gurI!","gUra!","gUrI!","gfhU!","gfha!","gepf!","gevf!","gezf!","gozwa!","graTi!","grasu!","glasu!","glaha!","glepf!","glepf!","glevf!","Gawa!","Gawwa!","Gaza!","GiRi!","Guzi!","Guwa!","GuRa!","GuRi!","GUrRa!","GfRi!","DrAGf!","caka!","cakzi!N","caqi!","caya!","cita!","cIBf!","cUrI!","cezwa!","janI!","jaBI!","ji!","jutf!","juzI!","jUrI!","jfBi!","jezf!","jehf!","wikf!","wIkf!","qapa!","qipa!","QOkf!","taqi!","tatri!","tapa!","taya!","tarja!","tAyf!","tikf!","tija!","tipf!","tIkf!","tuqi!","tuBa!","tURa!","tUrI!","tepf!","tevf!","traki!","trapU!z","truwa!","trOkf!","YitvarA!","daSi!","dasi!","dakza!","dakza!","dada!","daDa!","daya!","dasa!","divu!","dIkza!","dIpI!","devf!","dyuta!","drAGf!","drAqf!","drAhf!","drekf!","Dikza!","Dukza!","Depf!","DrAqf!","Drekf!","DvaMsu!","RaBa!","Raya!","Rasa!","nATf!","nADf!","RAsf!","Risi!","Riji!","nizka!","Rezf!","paci!","paRa!","paqi!","pada!","pada!","pana!","paya!","parda!","piji!","piqi!","pUyI!","pUrI!","pfcI!","pfji!","pevf!","pezf!","o!pyAyI!","praTa!","prasa!","prezf!","pliha!","plevf!","bahi!","baDa!","barha!","balha!","basta!","bADf!","bAhf!","bIBf!","buDa!","vehf!","Baqi!","Badi!","Bartsa!","Bala!","Bala!","Balla!","BAma!","BAza!","BAsf!","Bikza!","YimidA!","BfjI!","Byasa!","BraMsu!","wuBrAjf!","BrAjf!","wuBrASf!","BrURa!","Brejf!","wuBlASf!","mahi!","maki!","maGi!","maca!","maci!","maWi!","maqi!","mada!","manu!","mana!","mAna!","matri!","madi!","maya!","mala!","malla!","maska!","maska!","mana!","mAna!","muWi!","muqi!","muda!","mfga!","mepf!","mevf!","mrada!","mlevf!","yakza!","yatI!","yuja!","yutf!","yuDa!","yezf!","raGi!","raBa!","ramu!","rabi!","raBi!","raya!","rAGf!","rAsf!","ruca!","ruwa!","rekf!","rejf!","repf!","reBf!","revf!","rezf!","lakza!","laGi!","o!lajI!","o!lasjI!","qulaBa!z","labi!","labi!","laBi!","laya!","lala!","o!lasjI!","lAGf!","liSa!","luwa!","luWa!","lepf!","lokf!","locf!","lozwa!","vaki!","vaki!","vaGi!","vaYcu!","vaWi!","vaqi!","vanu!","vadi!","vaya!","varca!","varza!","varha!","valBa!","valla!","valha!","vaska!","vasa!","vaska!","vasta!","vAvftu!","vASf!","bAhf!","o!vijI!","viTf!","vida!","vida!","vida!","vizka!","vIja!","vIra!","vfka!","vfkza!","vfjI!","vfji!","vftu!","vftu!","vfDu!","vfza!","veTf!","vezwa!","vehf!","vyaTa!","Saki!","Saca!","SaWa!","Saqi!","Sama!","Sala!","SalBa!","SAqf!","Sikza!","Siji!","SIkf!","SIBf!","SuBa!","SUra!","SUrI!","SfDu!","Sevf!","syandU!","sraMsu!","sraMsu!","Sraki!","SraTi!","SramBu!","Slaki!","SlAGf!","Slokf!","Svaki!","Svaca!","Svaci!","Svidi!","zvaska!","zvaska!","saNgrAma!","zaca!","satra!","satra!","zaha!","sIkf!","zUda!","sfja!","sekf!","zevf!","skaBi!","skudi!","sKada!","zwaBi!","zwiGa!","zwipf!","zwuca!","zwuBu!","zwepf!","sTUla!","spadi!","sparDa!","spaSa!","sPAyI!","sPuwa!","sPuqi!","syama!","sraMsu!","sraki!","sramBu!","sramBu!","srekf!","srokf!","zvaki!","zvaYja!","zvada!","svarda!","zvaska!","zvaska!","svAda!","YizvidA!","hada!","hasta!","hiqi!","hizka!","huqi!","huqi!","heWa!","heqf!","hepf!","hezf!","hoqf!","hrAda!","hrezf!","hlAdI!","ASAsu!");
$svaritetverbs=array("kranda!","fRu!","kfpeSca","kfza!","kzaRu!","kzapayaSca","kziRu!","kzipa!","kzudi!r","Kanu!","guhU!","graha!","GfRu!","cate!","cade!","caza!","cAyf!","cIbf!","cIvf!","Caza!","Cidi!r","u!Cfdi!r","Jaza!","tanu!","tuda!","tfRu!","u!tfdi!r","tviza!","dAna!","dASf!","dAsf!","diSa!","diha!","duha!","dviza!","DAvu!","Raha!","Riji!r","Ridf!","Ruda!","Redf!","qupaca!z","proTf!","plakza!","buDi!r","u!bundi!r","Bakza!","Baja!","Bidi!r","Bezf!","Brakza!","Brasja!","Brasja!","Brezf!","Blakza!","Blezf!","mAhf!","miTf!","midf!","miDf!","mila!","mucx!","mfDu!","mfza!","mfza!","meTf!","medf!","meDf!","yaja!","wuyAcf!","yuji!r","raYja!","raYja!","rAjf!","rici!r","ruDi!r","rewf!","laza!","lipa!","liha!","lupx!","vada!","quvapa!","vaha!","vici!r","viji!r","vidx!","vizx!","veRf!","venf!","vyaya!","Saka!","Sapa!","Sapa!","SAna!","I!Suci!r","SfDu!","zaca!","zanu!","zica!","spaSa!","hikka!");
$Gitverbs=array("iN","iN","IN","uN","kuN","kuN","kUN","kluN","KuN","gAN","guN","guN","GuN","NuN","cakzi!N","juN","jyuN","qIN","qIN","trEN","dIN","dIDIN","dUN","dfN","deN","DIN","DfN","DfN","pIN","pUN","pfN","pyEN","prIN","pruN","pluN","mAN","mAN","mIN","mUN","mfN","meN","rIN","ruN","lIN","vfN","vevIN","vrIN","SIN","cyuN","SyEN","zUN","zUN","zmiN","zmiN","o!hAN","hnuN");
$Jitverbs=array("UrRuY","qukfY","kfY","kfY","kFY","knUY","qukrIY","ciY","ciY","qudAY","drUY","quDAY","DuY","DUY","DUY","DUY","DfY","RIY","pUY","prIY","prIY","brUY","quBfY","BfY","qumiY","mIY","mUY","yuY","lUY","vfY","vfY","vFY","veY","vyeY","SiY","SriY","SrIY","ziY","ziY","zuY","skuY","zwuY","stfY","stFY","hfY","hveY");
$parasmai=array("aka!","akzU!","aga!","agi!","aja!","aYcu!","aYjU!","awa!","aqa!","aqqa!","aRa!","ata!","ada!","aqqa!","iN","ik","ana!","ati!","adi!","aBra!","ama!","arGa!","arca!","arja!","arda!","arba!","arva!","arha!","ala!","ava!","aSa!","asu!","asa!","aha!","ACi!","Apx!","iR","ik","iKa!","iKi!","igi!","iwa!","idi!","ivi!","ila!","iza!","iza!","iza!","IKi!","IKi!","Irkzya!","Irzya!","Iza!","ukza!","uKa!","uKi!","uca!","uCI!","uCI!","ujJa!","uCi!","uCi!","uWa!","ujJa!","undI!","ubja!","uBa!","umBa!","urvI!","uza!","uhi!r","UWa!","Uza!","f","f","f","fca!","fCa!","fDu!","fDu!","fPa!","fmPa!","fzI!","F","ejf!","oKf!","oRf!","kaKa!","kaKe!","kage!","kaja!","kawI!","kawe!","kaWa!","kaqa!","kaqa!","kaqqa!","kaRa!","kaRa!","kaqi!","kaqqa!","kanI!","kadi!","karja!","karda!","karba!","karva!","kaza!","kasa!","kAkzi!","ki","kiwa!","kiwa!","kita!","kita!","kila!","kIla!","ku","kuMSa!","kuMsa!","kuca!","kuca!","kuca!","kuju!","kuYca!","kuji!","kuwa!","kuqa!","kuRa!","kuwi!","kuWi!","kuqi!","kuTa!","kuTi!","kunTa!","kupa!","kubi!","kura!","kula!","kuSa!","kuza!","kusa!","kUja!","kUla!","kfqa!","kfvi!","kftI!","kftI!","kfSa!","kfza!","kF","kF","kelf!","kE","knaTa!","knasu!","kmara!","kraTa!","kradi!","kramu!","krIqf!","kruYca!","kruqa!","kruDa!","kruSa!","klaTa!","kladi!","klamu!","klidU!","klidi!","kliSU!","kvaRa!","kvaTe!","kzapayaSca","kzamU!","kzara!","kzi","kzi","kzi","kzipa!","kzivu!","kzI","kzIja!","kzIz","wukzu","kzuDa!","kzuBa!","kzuBa!","kzura!","kzura!","kzevu!","kzE","kzRu","kzmIla!","YikzvidA!","YikzvidA!","kzvelf!","Kaca!","Kaja!","Kaji!","Kawa!","Kada!","Karja!","Karda!","Karba!","Karva!","Kala!","Kava!","Kaza!","KAdf!","Kiwa!","Kida!","Kuju!","Kuqa!","Kura!","Kelf!","KE","Korf!","Kolf!","KyA","gaja!","gaji!","gaqa!","gaqi!","gaqi!","gada!","gamx!","garja!","garda!","garba!","garva!","gala!","gA","gu","guja!","guja!","guji!","guqa!","guDa!","guDa!","gupU!","gupa!","guPa!","gumPa!","gurvI!","gf","gfja!","gfji!","gfDu!","gF","gF","gE","granTa!","grucu!","glucu!","gluYca!","glE","GagGa!","GaGa!","Gasx!","Guwa!","GuRa!","Gura!","Guzi!r","GUrRa!","Gf","Gf","Gfzu!","GrA","cakAsf!","caka!","caYcu!","cawe!","caRa!","cana!","cadi!","capa!","camu!","camu!","cara!","carca!","carca!","carba!","carva!","cala!","cala!","caha!","ciwa!","citI!","ciri","cila!","cilla!","cucya!","cuwa!","cuqa!","cuqqa!","cuqi!","cuqqa!","cupa!","cubi!","culla!","cUza!","cftI!","celf!","cyuti!r","Camu!","Cuwa!","Cuqa!","Cupa!","Cura!","Co","jakza!","jaja!","jaji!","jawa!","jana!","japa!","jamu!","jartsa!","jartsa!","jarja!","jartsa!","jala!","jalpa!","jaza!","jasu!","jAgf","ji","ji!","jivi!","jimu!","jiri","jizu!","jIva!","ju","jugi!","juwa!","juqa!","juqa!","juna!","jUza!","jFz","jF","jE","jYA","jyA","jyuti!r","jri","jvara!","jvala!","jvala!","Jawa!","Jamu!","Jartsa!","Jartsa!","JarJa!","Jartsa!","Jaza!","JF","JFz","wala!","wvala!","qipa!","qipa!","tasi!","taka!","takzU!","takza!","taki!","tagi!","taYcu!","taYcU!","tawa!","tapa!","tamu!","tarja!","tarda!","tasu!","tika!","tiga!","tima!","tila!","tila!","tilla!","tIma!","tIva!","tu","tuja!","tuji!","tuwa!","tuqa!","tuqf!","tuRa!","tupa!","tupa!","tuPa!","tuPa!","tuBa!","tuBa!","tumpa!","tumpa!","tumPa!","tumPa!","tubi!","tura!","turvI","tuza!","tusa!","tuhi!r","tUqf!","tUla!","tUza!","tfMhU!","tfkza!","tfpa!","tfpa!","tfpa!","tfPa!","tfmpa!","tfmPa!","Yitfza!","tfhU!","tfha!","tF","teja!","tyaja!","trakza!","traKa!","tragi!","tradi!","trasI!","triKi!","truwa!","trupa!","truPa!","trumpa!","trumPa!","tvakzU!","tvagi!","tvaca!","tvaYcu!","tsara!","Taki!","Tuqa!","TurvI","daMSa!","daGa!","daGi!","damu!","damBu!","daridrA","dala!","dASa!","dasu!","daha!","dAR","dAp","divi!","divu!","du","wudu","durvI!","duza!","duhi!r","dfhi!","dfpa!","dfpa!","dfPa!","dfBI!","dfmpa!","dfmPa!","dfha!","dF","dF","dF","dEp","dfSi!r","do","dyu","dyE","drama!","drA","drAKf!","drAkzi!","dru","druRa!","druha!","drE","dvf","DaRa!","Dana!","Davi!","Di","Divi!","Diza!","DU","DurvI!","DU","DUpa!","Dfja!","Dfji!","YiDfzA!","DF","Dew","Dorf!","DmA","DmAkzi!","DyE","Draja!","Draji!","DraRa!","u!Drasa!","DrAKf!","DrAkzi!","Drija!","Dru","Dru","DrE","Dvaja!","Dvaji!","DvaRa!","Dvana!","Dvana!","DvAkzi!","Dvf","Rakza!","RaKa!","RaKi!","Rawa!","Rawa!","Rada!","wunadi!","RaBa!","RaBa!","Rama!","narda!","Rala!","RaSa!","Rikza!","Ridi!","Rivi!","Rila!","RiSa!","Rizu!","RIla!","RIva!","RU","Ru","Ruda!","RU","nftI!","nF","nF","pakza!","pawa!","paWa!","patx!","paTe!","parpa!","parba!","parva!","pala!","pelf!","pA","pA","pi","piwa!","piWa!","pivi!","piSa!","pizx!","pisf!","pIla!","pIva!","puwa!","puwa!","puqa!","puqa!","puRa!","puqi!","puTa!","puTi!","pura!","purva!","pula!","puza!","puza!","puza!","puza!","puzpa!","purva!","pUla!","pUza!","pf","pf","pfcI!","pfqa!","pfRa!","pfzu!","pF","pF","pelf!","pesf!","pE","pERf!","pyuza!","pyusa!","praCa!","prA","pruzu!","pruza!","prERf!","plI","pluza!","pluza!","pluzu!","pluza!","psA","Pakka!","PaRa!","Pala!","YiPalA!","Pulla!","Pelf!","baWa!","baRa!","bawi!","bada!","banDa!","vaBra!","barba!","bala!","basu!","biwa!","bidi!","bila!","bisa!","visa!","bukka!","bugi!","buDa!","busa!","busa!","bfhi!","bfha!","bfhU!","besa!","byusa!","vraRa!","blI","BaYjo!","Bawa!","Bawa!","BaRa!","Barba!","BarBa!","Barva!","Baza!","Basu!","Basa!","BA","Bidi!","YiBI","Bujo!","Buja!","BU","BUza!","BfMSu!","Bfqa!","BfSu!","BF","BraMSu!","BraRa!","Bramu!","Bramu!","BrI","maKa!","maKi!","magi!","maGi!","wumasjo!","maWa!","maRa!","maqi!","maTe!","madI!","manTa!","manTa!","maTi!","maBra!","marba!","marva!","mava!","mavya!","maSa!","maza!","masI!","wumasjo!","maha!","mA","mAkzi!","miCa!","YimidA!","mivi!","mila!","miSa!","mizu!","miza!","miha!","mImf!","mIla!","mIva!","muKi!","muja!","muji!","muwa!","muwa!","muqa!","muRa!","muqi!","mura!","murCA!","murvI!","muza!","musa!","muha!","mUla!","mUza!","mfkza!","mfjU!","mfqa!","mfqa!","mfRa!","mfda!","mfSa!","mfzu!","mF","mnA","mrakza!","mrucu!","mruYcu!","mrewf!","mreqf!","mlucu!","mluYcu!","mleCa!","mlewf!","mlE","yaBa!","yama!","yasu!","yA","yu","yugi!","yuCa!","yupa!","yUza!","yOwf!","rahi!","rakza!","raKa!","rage!","raKi!","ragi!","rawa!","rawa!","raWa!","raRa!","raRa!","ravi!","rada!","raDa!","rapa!","raPa!","raPi!","rasa!","raha!","rA","rAKf!","rADa!","rADaH","ri","ri","riKa!","riKi!","rigi!","rivi!","riPa!","riSa!","riza!","riza!","riha!","rI","ru","rujo!","ruWa!","ruwi!","ruWi!","ruWi!","ruqi!","rudi!r","rupa!","ruSa!","ruza!","ruza!","ruha!","rUza!","rE","roqf!","rOqf!","laKa!","lage!","laKi!","lagi!","laGi!","laCa!","laja!","laji!","lawa!","laqa!","lapa!","larba!","lala!","lasa!","lA","lAKf!","lAja!","lACi!","lAji!","liKa!","liKa!","liKi!","ligi!","liSa!","lI","luYca!","luwa!","luwa!","luwa!","luWa!","luWa!","luWa!","luqa!","luqa!","luwi!","luWi!","luWi!","luWi!","luqi!","luTi!","lupa!","luBa!","luBa!","lubi!","lUza!","loqf!","vakza!","vaKa!","vaKi!","vagi!","vaca!","vaja!","vaYcu!","vawa!","vawa!","vaWa!","vaRa!","vawi!","vada!","vana!","vanu!","vana!","vaBra!","wuvama!","valga!","vaSa!","vaza!","vasa!","vasu!","vA","vAkzi!","vACi!","viCa!","o!vijI!","viwa!","vida!","viDa!","vila!","viSa!","vizu!","viza!","visa!","bisa!","vI","vugi!","vusa!","bfhi!","vfjI!","vfRa!","vfSa!","vfzu!","bfha!","vfhU!","vF","velf!","vella!","vesa!","vella!","o!vE","vyaca!","vyaDa!","vyuza!","vyuza!","vyusa!","vraja!","vraja!","vraji!","vraRa!","o!vraScU!","vrI","vrIqa!","vruqa!","vlI","SaMsu!","Sakx!","Sawa!","SaWa!","SaRa!","Sadx!","Sadx!","Samu!","Sarba!","Sarva!","Sala!","Sava!","SaSa!","Saza!","Sasu!","SAKf!","SAsu!","SiKi!","SiGi!","Siwa!","Sila!","Siza!","Sizx!","SIla!","Suka!","Suca!","Sucya!","SuWa!","SuWi!","SuWi!","SuDa!","Suna!","SunDa!","SuBa!","SuBa!","SumBa!","SumBa!","Suza!","SUla!","SUza!","SF","Self!","SE","So","SoRf!","SOwf!","Scuti!r","Scyuti!r","SnaTa!","SmIla!","Sragi!","SraRa!","SraTa!","SranTa!","SranTa!","Sramu!","SrA","SrA","Srizu!","Sru","SrE","SroRf!","Slagi!","SlaTa!","SlAKf!","Slizu!","Sliza!","SloRf!","Sragi!","Svala!","Svalla!","Svasa!","wuo!Svi","zwyE","zWivu!","zWivu!","zasti!","zage!","zasja!","zaYja!","zawa!","zadx!","zadx!","zaGa!","zana!","zapa!","zama!","samI!","zarkza!","zarja!","zarba!","zarva!","zala!","zasa!","zasja!","zaha!","sADa!","ziwa!","ziDa!","ziDU!","ziDu!","zivi!","ziBu!","zimBu!","zila!","zivu!","zu","zu","zura!","zuha!","zU","sUrkza!","zUrkzya!","sUza!","sf","sf","sfja!","sfpx!","zfBu!","zfmBu!","zelf!","zE","zo","skandi!r","skamBu!","skumBu!","sKala!","zwaka!","zwana!","zwama!","stamBu!","zWala!","zwima!","zwIma!","zwupa!","stumBu!","zwUpa!","zwfkza!","stfhU!","zwE","styE","zwrakza!","zWage!","zWA","sTuqa!","zRasu!","zRA","zRiha!","zRu","zRusu!","zRuha!","zRE","spf","spfSa!","sPara!","sPala!","sPuwa!","sPuwi!r","sPuqa!","sPuwi!","sPura!","sPurCA!","sPula!","wuo!sPUrjA!","smIla!","smf","smf","smf","syamu!","srivu!","sru","srE","Sragi!","svana!","svana!","Yizvapa!","zvidA!","svf","hawa!","haWa!","hana!","hamma!","harya!","haya!","hala!","hase!","o!hAk","hi","hisi!","hiwa!","hivi!","hila!","hu","huqf!","huqa!","hurCA!","hula!","hula!","hUqf!","hf","hfzu!","hfza!","hrasa!","heWa!","heWa!","heqa!","heQa!","hoqf!","hmala!","hrage!","hrasa!","hrI","hrICa!","hlage!","hlasa!","hvala!","hvf","hvf");
$Atmane=array("ahi!","aki!","aGi!","awwa!","aRa!","aWi!","anuruDa!","ana!","abi!","aBi!","aya!","arTa","aSU!","ASasi","ASAsu!","Asa!","iN","YiinDI!","IN","Ikza!","Ija","Iji!","Iqa!","Ira!","ISa!","Iza!","Iha!","uN","uWa!","urda!","UyI!","Uha!","fja!","fji!","ejf!","eWa!","eDa!","ezf!","ezf!","kasi!","kaka!","kaki!","kaca!","kaci!","kaWi!","kaqi!","katTa!","kada!","kadi!","kapa!","kabf!","kamu!","kapi!","kala!","kalla!","kaSa!","kasa!","kAci!","kASf!","kASf!","kAsf!","kuN","kuN","kuka!","kuwa!","kuwwa!","kuqi!","kutsa!","kurda","kusma!","kuha","kUN","kUwa","kURa!","kfpa!","kfpU!","kfpU!","kepf!","kevf!","knUyI!","krada!","kradi!","krapa!","klada!","kladi!","klidi!","kliSa!","klIbf!","kluN","kleSa!","kzaji!","kzamU!z","kzIbf!","kzIvf!","kzuBa!","kzmAyI!","YikzvidA!","Kaqi!","Kida!","Kida!","KuN","Kurda","Kevf!","ganDa!","garva","garha!","gala!","galBa!","galha!","gAN","gADf!","gAhU!","guN","guN","guda!","gupa!","gurI!","gurda","gUra!","gUrI!","gfhU!","gfha","gF","gepf!","gevf!","gezf!","gozwa!","graTi!","grasu!","glasu!","glaha!","glepf!","glepf!","glevf!","glezf!","Gawa!","Gawwa!","Gaza!","GiRi!","GuN","Guzi!","Guwa!","GuRa!","GuRi!","GUrI","GUrRa!","GfRi!","DrAGf!","NuN","caka!","cakzi!N","caqi!","caya!","cita!","cIBf!","cUrI!","cezwa!","janI!","jaBI!","juN","jutf!","juzI!","jUrI!","jfBi!","jezf!","jehf!","jyuN","wikf!","wIkf!","qapa!","qipa!","qIN","qIN","QOkf!","taqi!","tatri!","tapa!","taya!","tarja!","tAyf!","tikf!","tija!","tipf!","tIkf!","tuqi!","tuBa!","tURa!","tUrI!","tepf!","tevf!","traki!","trapU!z","truwa!","trEN","trOkf!","YitvarA!","daSi!","dasi!","dakza!","dakza!","dada!","daDa!","daya!","dasa!","divu!","dIN","dIkza!","dIDIN","dIpI!","dUN","dfN","deN","devf!","dyuta!","drAGf!","drAqf!","drAhf!","drekf!","Dikza!","DIN","Dukza!","DUrI","DfN","DfN","Depf!","DrAqf!","Drekf!","DvaMsu!","RaBa!","Raya!","Rasa!","nATf!","nADf!","RAsf!","Risi!","Riji!","nizka!","Rezf!","paci!","paRa!","paqi!","pada","pada!","pana!","paya!","parda!","piji!","piqi!","pIN","pUN","pUyI!","pUrI!","pfN","pfcI!","pfji!","pevf!","pezf!","o!pyAyI!","pyEN","praTa!","prasa!","prIN","pruN","prezf!","pliha!","pluN","plevf!","bahi!","baDa!","barha!","balha!","basta!","bAqf","bADf!","bAhf!","bIBf!","buDa!","vehf!","Baqi!","Badi!","Bartsa!","Bala!","Bala!","Balla!","BAma!","BAza!","BAsf!","Bikza!","YimidA!","BfjI!","Byasa!","BraMSu!","BraMsu!","wuBrAjf!","BrAjf!","wuBrASf!","BrURa!","Brejf!","wuBlASf!","mahi!","maki!","maGi!","maca!","maci!","maWi!","maqi!","mada!","manu!","mana!","mAna!","matri!","madi!","maya!","mala!","malla!","maska!","maska!","mAN","mAN","mana!","mAna!","mIN","muci","muWi!","muqi!","muda!","mUN","mfN","mfga","meN","mepf!","mevf!","mrada!","mlevf!","yakza!","yatI!","yu","yuja!","yutf!","yuDa!","yezf!","raGi!","raBa!","ramu!","rabi!","raBi!","raya!","rAGf!","rAsf!","rIN","ruN","ruca!","ruwa!","rekf!","rejf!","repf!","reBf!","revf!","rezf!","lakza!","laGi!","o!lajI!","o!lasjI!","qulaBa!z","labi!","labi!","laBi!","laya!","lala!","o!lasjI!","lAGf!","liSa!","lIN","luwa!","luWa!","lepf!","lokf!","locf!","lozwa!","vaki!","vaki!","vaGi!","vaYcu!","vaWi!","vaqi!","vanu!","vadi!","vaya!","varca!","varza!","varha!","vala","valBa!","valla!","valha!","vaska!","vasa!","vaska!","vasta!","vAqf","vAvftu!","vASf!","bAhf!","o!vijI!","viTf!","vida!","vida!","vida!","vizka","vIja!","vIra","vfN","vfka!","vfkza!","vfjI!","vfji!","vftu!","vftu!","vfDu!","vfza!","veTf!","wuvepf","vevIN","vezwa!","vehf!","vyaTa!","vrIN","Saki!","Saca!","SaWa","Saqi!","Sama!","Sala!","SalBa!","SAqf!","Sikza!","Siji!","SIN","SIkf!","SIBf!","SuBa!","SUra","SUrI!","SfDu!","Sevf!","syandU!","cyuN","SyEN","sraMsu!","sraMsu!","Sraki!","SraTi!","SramBu!","Slaki!","SlAGf!","Slokf!","Svaki!","Svaca!","Svaci!","SvitA!","Svidi!","zvaska!","zvaska!","saNgrAma","zaca!","satra","satra","zaha!","sIkf!","zUN","zUN","zUda!","sfja!","sekf!","zevf!","skaBi!","skudi!","sKada!","zwaBi!","zwiGa!","zwipf!","zwuca!","zwuBu!","zwepf!","sTUla","spadi!","sparDa!","spaSa!","sPAyI!","sPuwa!","sPuqi!","zmiN","syama!","sraMsu!","sraki!","sramBu!","sramBu!","srekf!","srokf!","zvaki!","zvaYja!","zvada!","svarda!","zvaska!","zvaska!","svAda!","YizvidA!","hada!","hasta!","o!hAN","hiqi!","hizka!","huqi!","huqi!","heWa!","heqf!","hepf!","hezf!","hoqf!","hnuN","hrAda!","hrezf!","hlAdI!");
$ubhaya=array("aMsa","ahi!","aNka","aNga","acu!","aci!","aYcu!","aYcu!","aji!","awwa!","anDa","ama!","aya!","arka!","arca!","arja!","arda!","arha!","arha!","aza!","asa!","Akranda!","Apx!","Azada!","ila!","Iqa!","Ira!","kaWi!","uGrasa!","Una","Urja!","UrRuY","fRu!","o!laqi!","kaRa!","kaWi!","kaqi!","katra","katra","kaTa","karRa!","karta!","kala","kala","kAla","kIwa!","kuSi!","kusi!","kuwwa!","kuRa","kuWi!","kuqi!","kuqi!","kudf!","kudri!","kupa!","kumAra","kubi!","kuBi!","kUwa","kURa!","qukfY","kfY","kfY","kfpa","kfpeSca","kfza!","kFY","kFta!","keta","knUY","qukrIY","klapa!","kzaji!","kzaRu!","kzapa!","kzapi!","kzala!","kziRu!","kzipa!","kzudi!r","kzowa","Kawwa!","Kaqa!","Kaqi!","Kanu!","Kuqi!","Kewa","Keqa!","Kowa","gaja!","gaRa","gadI!","garja!","garda!","garDa!","garha!","gaveza","guRa","guWi!","guqi!","gupa!","gurda!","guhU!","goma","granTa!","granTa!","grasa!","graha!","grAma","Gawa!","Gawa!","Gawwa!","Gawi!","Guzi!r","Gf","GfRu!","cakka!","cawa!","caqi!","cate!","cade!","cana!","capa!","capi!","cara!","carca!","cala!","caza!","caha","caha","cAyf!","ci","ciY","ciY","citra","citi!","cIka!","cIva!","cIbf!","cIva!","cIvf!","cukka!","cuwa!","cuwwa!","cuwi!","cuda!","cubi!","cura!","cula!","cUrRa!","cUrRa!","cfpa!","cyu","Caji!","Cada","Cada","Cada","Cadi!","Carda","Caza!","Cidi!r","Cidra","u!Cfdi!r","CfdI!","Cfpa!","Ceda","jasi!","jaBi!","jala!","jasu!","jasu!","ji","ci","ci","juqa!","juza!","jF","jYapa!","jYA","jri","Jaza!","waki!","qipa!","tasi!","taqa!","taqa!","tanu!","tanu!","tapa!","tarka!","tala!","tija!","tila!","tIra","tuja!","tuji!","tuji!","tuqi!","tutTa","tuda!","tubi!","tula!","tfRu!","u!tfdi!r","tfpa!","tfpa!","trasi!","trasa!","tviza!","daSi!","dasi!","daRqa","dala!","qudAY","dAna!","dASf!","dAsf!","divu!","diSa!","diha!","duHKa","dula!","duha!","dfpa!","dfBI!","dfBa!","drUY","dviza!","Dakka!","quDAY","DAvu!","DuY","DUpa!","DUY","DUY","DUY","DUpa!","DUSa!","DUza!","DUsa!","DfY","Dfza!","u!Drasa!","Dvana","nakka!","nawa!","nawa!","Raqa!","nala!","Raha!","Riji!r","Ridf!","nivAsa","RIY","Ruda!","Redf!","pasi!","pasi!","pakza!","qupaca!z","paci!","pawa","pawa","paqi!","pata","paTa!","paTi!","parRa","pala!","palyUla","paSa!","paza","pAra","pAla!","pisi!","piCa!","pija!","piji!","piji!","piWi!","piqi!","piSa!","pisa!","pIqa!","puMsa!","puwa","puwa","puwwa!","puRa!","puwi!","puTa!","pula!","puza!","pusta!","pUY","pUja!","pUrI!","pUrRa!","pUrva!","pUla!","pfca!","pfTa!","pF","praTa!","prIY","prIY","proTf!","plakza!","baDa!","banDa!","barha!","barha!","bala!","balha!","bazka!","bila!","bukka!","buDi!r","u!bundi!r","busta!","bfhi!","brUY","brUsa!","Bakza!","Bakza!","Baja!","Baja!","Baji!","Baqi!","BAja","BAma","Bidi!r","BU","BU","BUza!","quBfY","BfY","BfSi!","Bezf!","Brakza!","Brasja!","Brasja!","Brezf!","Blakza!","Blezf!","mahi!","maqi!","marca!","maha","mAna!","mArga!","mArja!","mAhf!","qumiY","miji!","miTf!","midf!","mida!","miDf!","midi!","mila!","miSra","mI","mIY","muca!","mucx!","muwa!","muda!","musta!","mUY","mUtra","mUla!","mfjU!","mfqi!","mfDu!","mfza!","mfza!","meTf!","medf!","meDf!","mokza!","mrakza!","mrakza!","mraCa!","mleCa!","yaja!","yata!","yatri!","yama!","wuyAcf!","yuY","yuja!","yuji!r","rahi!","raka!","raga!","raGa!","raNga!","raGi!","raca","raYja!","raYja!","rawa!","rasa","raha","raha","rAjf!","rica!","rici!r","ruSi!","rusi!","ruja!","ruwa!","ruwa!","ruDi!r","ruza!","rUkza","rUpa","rewf!","lakza!","laga!","laGi!","laGi!","laja","laja","laji!","laji!","laji!","laqa!","laqi!","o!laqi!","laza!","lasa!","lABa","ligi!","liji!","lipa!","liha!","lI","luji!","luji!","luwa!","luRwa!","luRWa!","lupx!","lubi!","lUY","lUza!","lokf!","locf!","vaca!","vawa","vawa","vawi!","vawi!","vaqi!","vada!","quvapa!","vara","varRa","varRa","varDa!","barha!","varha!","valka!","balha!","vasa","vasa","vaha!","vAta","vAsa","vici!r","viCa!","viji!r","vidx!","vipa!","vila!","vizx!","vizka","vfY","vfY","bfhi!","vfjI!","vftu!","vfDu!","vFY","veY","veRf!","venf!","vela","vyapa!","vyaya","vyaya","vyaya!","vyusa!","vyeY","vraja!","vraRa","vrUza!","vrUsa!","Saka!","SaWa","SaWa","Sapa!","Sapa!","Sabda!","Samba!","SAna!","SAntva!","SiY","Siza!","SIka!","SIka!","SIla","I!Suci!r","SuWa!","SuWi!","SunDa!","Sulka!","Sulba!","SUrpa!","SfDu!","SfDu!","SraRa!","SraTa","SraTa","SraTa","SranTa!","SriY","SrIY","Sliza!","SvaWa","SvaWa","SvaWi!","SvaBra!","Svarta!","Svalka!","saNketa!","zaca!","zawwa!","zanu!","saBAja","zamba!","sAra","zaha!","zAntva!","sAma","sAmba!","sAra","ziY","ziY","zica!","zuY","suKa","zuwwa!","sUca","sUtra","zUda!","skuY","stana","zwuY","zwupa!","zwUpa!","stfY","stFY","stena","stoma!","zRiha!","spaSa!","spfha","sPiwa!","sPiwwa!","sPuwa!","sPuwi!","sPuqi!","zmiN","smiwa!","zvada!","svara","svarta!","svAda!","hisi!","hikka!","hfY","hrapa!","hlapa!","hveY");
$sanAdilist=array("san","kyac","kAmyac","kyaz","kyaN","kvip","RiN","Ric","yak","Aya","IyaN","aN");
$sArvadhatuka_lakAra=array("law","low","laN","viDiliN","sArvaDAtukalew");
$ArdhadhAtuka_lakAra=array("lfw","lfN","luw","ASIrliN","liw","luN","ArDaDAtukalew");
/* pratyayas as per sahajabodha text */
// 1st set
$sArvadhAtuka_tiG_set1_laT_parasmai=array("ti","tas","anti","si","Tas","Ta","mi","vas","mas");
$sArvadhAtuka_tiG_set1_loT_parasmai=array("tu","tAt","tAm","antu","tAt","tam","ta","Ani","Ava","Ama",);
$sArvadhAtuka_tiG_set1_laG_parasmai=array("t","tAm","an","s","tam","t","am","va","ma");
$sArvadhAtuka_tiG_set1_vidhiliG_parasmai=array("it","itAm","iyus","is","itam","ita","iyam","iva","ima");
$sArvadhAtuka_tiG_set1_laT_Atmane=array("te","ite","ante","se","iTe","Dve","e","vahe","mahe");
$sArvadhAtuka_tiG_set1_loT_Atmane=array("tAm","itAm","antAm","sva","iTAm","Dvam","E","AvahE","AmahE");
$sArvadhAtuka_tiG_set1_laG_Atmane=array("ta","itAm","anta","TAs","iTAm","Dvam","i","vahi","mahi");
$sArvadhAtuka_tiG_set1_vidhiliG_Atmane=array("Ita","IyAtAm","Iran","ITAs","IyATAm","IDvam","Iya","Ivahi","Imahi");
// merging the members of first set sArvadhAtuka
$sArvadhAtuka_tiG_set1=array("ti","tas","anti","si","Tas","Ta","mi","vas","mas","tu","tAt","tAm","antu","tAt","tam","ta","Ani","Ava","Ama","t","tAm","an","s","tam","t","am","va","ma","it","itAm","iyus","is","itam","ita","iyam","iva","ima","te","ite","ante","se","iTe","Dve","e","vahe","mahe","tAm","itAm","antAm","sva","iTAm","Dvam","E","AvahE","AmahE","ta","itAm","anta","TAs","iTAm","Dvam","i","vahi","mahi","Ita","IyAtAm","Iran","ITAs","IyATAm","IDvam","Iya","Ivahi","Imahi");
// 2nd set
$sArvadhAtuka_tiG_set2_laT_parasmai=array("ti","tas","anti","si","Tas","Ta","mi","vas","mas");
$sArvadhAtuka_tiG_set2_loT_parasmai=array("tu","tAm","antu","tAt","tam","ta","Ani","Ava","Ama"); // tAt and hi are removed.
$sArvadhAtuka_tiG_set2_laG_parasmai=array("t","tAm","an","s","tam","ta","am","va","ma");
$sArvadhAtuka_tiG_set2_vidhiliG_parasmai=array("yAt","yAtAm","yus","yAH","yAtam","yAta","yAm","yAva","yAma");
$sArvadhAtuka_tiG_set2_laT_Atmane=array("te","Ate","ate","se","ATe","Dve","e","vahe","mahe");
$sArvadhAtuka_tiG_set2_loT_Atmane=array("tAm","AtAm","atAm","sva","ATAm","Dvam","E","AvahE","AmahE");
$sArvadhAtuka_tiG_set2_laG_Atmane=array("ta","AtAm","ata","TAs","ATAm","Dvam","i","vahi","mahi");
$sArvadhAtuka_tiG_set2_vidhiliG_Atmane=array("Ita","IyAtAm","Iran","ITAs","IyATAm","IDvam","Iya","Ivahi","Imahi");
// merging the members of second set sArvadhAtuka
$sArvadhAtuka_tiG_set2=array("ati","atu","us","ti","tas","anti","si","Tas","Ta","mi","vas","mas","tu","tAm","antu","tAt","tam","ta","Ani","Ava","Ama","t","tAm","an","s","tam","ta","am","va","ma","yAt","yAtAm","yus","yAH","yAtam","yAta","yAm","yAva","yAma","te","Ate","ate","se","ATe","Dve","e","vahe","mahe","tAm","AtAm","atAm","sva","ATAm","Dvam","E","AvahE","AmahE","ta","AtAm","ata","TAs","ATAm","Dvam","i","vahi","mahi","Ita","IyAtAm","Iran","ITAs","IyATAm","IDvam","Iya","Ivahi","Imahi");
// sArvadhAtuka leT
$sArvadhAtuka_tiG_sArvadhAtukaleT_aDAgama_parasmai=array("ati","at","ad","atas","anti","an","asi","as","aTas","aTa","ami","am","avas","ava","amas","ama");
$sArvadhAtuka_tiG_sArvadhAtukaleT_ADAgama_parasmai=array("Ati","At","Ad","Atas","Anti","An","Asi","As","ATas","ATa","Ami","Am","Avas","Ava","Amas","Ama");
$sArvadhAtuka_tiG_sArvadhAtukaleT_aDAgama_Atmane=array("ate","atE","Ete","ante","antE","ase","asE","ETe","aDve","aDvE","e","E","avahe","avahE","amahe","amahE");
$sArvadhAtuka_tiG_sArvadhAtukaleT_ADAgama_Atmane=array("Ate","AtE","Ete","Ante","AntE","Ase","AsE","ETe","ADve","ADvE","e","E","Avahe","AvahE","Amahe","AmahE");
$sArvadhAtuka_tiG_sArvadhAtukaleT=array("ati","at","ad","atas","anti","an","asi","as","aTas","aTa","ami","am","avas","ava","amas","ama","Ati","At","Ad","Atas","Anti","An","Asi","As","ATas","ATa","Ami","Am","Avas","Ava","Amas","Ama","ate","atE","Ete","ante","antE","ase","asE","ETe","aDve","aDvE","e","E","avahe","avahE","amahe","amahE","Ate","AtE","Ete","Ante","AntE","Ase","AsE","ETe","ADve","ADvE","e","E","Avahe","AvahE","Amahe","AmahE");
// Total sArvadhAtuka tiG pratyayas.
$sArvadhAtuka_tiG_pratyayas=array("ati","at","ad","atas","anti","an","asi","as","aTas","aTa","ami","am","avas","ava","amas","ama","Ati","At","Ad","Atas","Anti","An","Asi","As","ATas","ATa","Ami","Am","Avas","Ava","Amas","Ama","ate","atE","Ete","ante","antE","ase","asE","ETe","aDve","aDvE","e","E","avahe","avahE","amahe","amahE","Ate","AtE","Ete","Ante","AntE","Ase","AsE","ETe","ADve","ADvE","e","E","Avahe","AvahE","Amahe","AmahE","ti","tas","anti","si","Tas","Ta","mi","vas","mas","tu","tAt","tAm","antu","tAt","tam","ta","Ani","Ava","Ama","t","tAm","an","s","tam","t","am","va","ma","it","itAm","iyus","is","itam","ita","iyam","iva","ima","te","ite","ante","se","iTe","Dve","e","vahe","mahe","tAm","itAm","antAm","sva","iTAm","Dvam","E","AvahE","AmahE","ta","itAm","anta","TAs","iTAm","Dvam","i","vahi","mahi","Ita","IyAtAm","Iran","ITAs","IyATAm","IDvam","Iya","Ivahi","Imahi","ati","atu","us","ti","tas","anti","si","Tas","Ta","mi","vas","mas","tu","tAm","antu","tAt","tam","ta","Ani","Ava","Ama","t","tAm","an","s","tam","ta","am","va","ma","yAt","yAtAm","yus","yAH","yAtam","yAta","yAm","yAva","yAma","te","Ate","ate","se","ATe","Dve","e","vahe","mahe","tAm","AtAm","atAm","sva","ATAm","Dvam","E","AvahE","AmahE","ta","AtAm","ata","TAs","ATAm","Dvam","i","vahi","mahi","Ita","IyAtAm","Iran","ITAs","IyATAm","IDvam","Iya","Ivahi","Imahi");
// sArvadhAtuka kRt pratyayas.
$sArvadhAtuka_kRt_pratyayas=array("Satf!","SAnac","SAnan","cAnaS","KaS","Sa","eS","SaDyE","SaDyEn");
// sArvadhAtuka vikaraNa pratyayas.
$sArvadhAtuka_vikaraNa_pratyayas=array("Sap","Syan","Snu","Sa","Snam","SnA","SAyac","SAnac");
$vikaraNa=array("ap","yan","nu","a","na","nA","Aya","Ana","u","Ri","ya","aN");
// Total sArvadhAtuka pratyayas.
$sArvadhAtuka_pratyayas=array("ati","at","ad","atas","anti","an","asi","as","aTas","aTa","ami","am","avas","ava","amas","ama","Ati","At","Ad","Atas","Anti","An","Asi","As","ATas","ATa","Ami","Am","Avas","Ava","Amas","Ama","ate","atE","Ete","ante","antE","ase","asE","ETe","aDve","aDvE","e","E","avahe","avahE","amahe","amahE","Ate","AtE","Ete","Ante","AntE","Ase","AsE","ETe","ADve","ADvE","e","E","Avahe","AvahE","Amahe","AmahE","ti","tas","anti","si","Tas","Ta","mi","vas","mas","tu","tAt","tAm","antu","tAt","tam","ta","Ani","Ava","Ama","t","tAm","an","s","tam","t","am","va","ma","it","itAm","iyus","is","itam","ita","iyam","iva","ima","te","ite","ante","se","iTe","Dve","e","vahe","mahe","tAm","itAm","antAm","sva","iTAm","Dvam","E","AvahE","AmahE","ta","itAm","anta","TAs","iTAm","Dvam","i","vahi","mahi","Ita","IyAtAm","Iran","ITAs","IyATAm","IDvam","Iya","Ivahi","Imahi","ati","atu","us","ti","tas","anti","si","Tas","Ta","mi","vas","mas","tu","tAm","antu","tAt","tam","ta","Ani","Ava","Ama","t","tAm","an","s","tam","ta","am","va","ma","yAt","yAtAm","yus","yAH","yAtam","yAta","yAm","yAva","yAma","te","Ate","ate","se","ATe","Dve","e","vahe","mahe","tAm","AtAm","atAm","sva","ATAm","Dvam","E","AvahE","AmahE","ta","AtAm","ata","TAs","ATAm","Dvam","i","vahi","mahi","Ita","IyAtAm","Iran","ITAs","IyATAm","IDvam","Iya","Ivahi","Imahi","Satf!","SAnac","SAnan","cAnaS","KaS","Sa","eS","SaDyE","SaDyEn","Sap","Syan","Snu","Sa","Snam","SnA","SAyac","SAnac");
// pit and apit sArvadhAtuka tiG pratyayas
$halAdi_pit_sArvadhAtuka_tiG_pratyayas=array("ti","si","mi","tu","t","s");
//$ajAdi_pit_sArvadhAtuka_tiG_pratyayas=array_merge(array("Ani","Ava","Ama","E","AvahE","AmahE","am"),$sArvadhAtuka_tiG_sArvadhAtukaleT);
$ajAdi_pit_sArvadhAtuka_tiG_pratyayas=array("Ani","Ava","Ama","E","AvahE","AmahE","am",); // removed sArvadhAtukalew because it causes problems in ''anti' application to 'znu'.
$halAdi_apit_sArvadhAtuka_tiG_pratyayas=array("tas","Tas","Ta","vas","mas","te","se","Dve","vahe","mahe","tAt","tAm","hi","tAt","tam","ta","tAm","sva","Dvam","tAm","tam","ta","va","ma","ta","TAs","Dvam","vahi","mahi","yAt","yAtAm","yus","yAs","yAtam","yAta","yAm","yAva","yAma",);
$ajAdi_apit_sArvadhAtuka_tiG_pratyayas=array("anti","Ate","ate","ATe","e","ati","antu","AtAm","atAm","ATAm","atu","an","AtAm","ata","ATAm","i","us","Ita","IyAtAm","Iran","ITAs","IyATAm","IDvam","Iya","Ivahi","Imahi",);
// pit and apit sArvadhAtuka kRt pratyayas
$ajAdi_apit_sArvadhAtuka_kRt_pratyayas=array("Satf!","SAnac","SAnan","cAnaS","KaS","Sa","eS","SaDyE","SaDyEn");
// pit and apit sArvadhAtuka vikaraNa pratyayas
$ajAdi_pit_sArvadhAtuka_vikaraNa_pratyayas=array("Sap","a");
$halAdi_apit_sArvadhAtuka_vikaraNa_pratyayas=array("Syan","Snu","Snam","SnA","SAyac","SAnac","ya"); // watch out for the 'ya' entry. It was made to make application of hali ca possible after robbing the vikaraNa zyan of it markers.
$ajAdi_apit_sArvadhAtuka_vikaraNa_pratyayas=array("Sa","SAyac","SAnac");
// ajAdi and halAdi pit total pratyayas 
$ajAdi_pit_sArvadhAtuka_pratyayas=array("Ani","Ava","Ama","E","AvahE","AmahE","am","Sap","a");
$halAdi_pit_sArvadhAtuka_pratyayas=array("ti","si","mi","tu","t","s",);
// ajAdi and halAdi apit total pratyayas
$ajAdi_apit_sArvadhAtuka_pratyayas=array("Satf!","SAnac","SAnan","cAnaS","KaS","Sa","eS","SaDyE","SaDyEn","anti","Ate","ate","ATe","e","ati","antu","AtAm","atAm","ATAm","atu","an","AtAm","ata","ATAm","i","us","Ita","IyAtAm","Iran","ITAs","IyATAm","IDvam","Iya","Ivahi","Imahi","Sa","SAyac","SAnac");
$halAdi_apit_sArvadhAtuka_pratyayas=array("tas","Tas","Ta","vas","mas","te","se","Dve","vahe","mahe","tAt","tAm","hi","tAt","tam","ta","tAm","sva","Dvam","tAm","tam","ta","va","ma","ta","TAs","Dvam","vahi","mahi","yAt","yAtAm","yus","yAs","yAtam","yAta","yAm","yAva","yAma","Syan","Snu","Snam","SnA","SAyac","SAnac","ya");
// pit pratyayas
$pit_sArvadhAtuka_pratyayas=array("Ani","Ava","Ama","E","AvahE","AmahE","am","Sap","ti","si","mi","tu","t","s",);
// apit pratyayas
$apit_sArvadhAtuka_pratyayas=array("Satf!","SAnac","SAnan","cAnaS","KaS","Sa","eS","SaDyE","SaDyEn","anti","Ate","ate","ATe","e","ati","antu","AtAm","atAm","ATAm","atu","an","AtAm","ata","ATAm","i","us","Ita","IyAtAm","Iran","ITAs","IyATAm","IDvam","Iya","Ivahi","Imahi","Sa","SAyac","SAnac","tas","Tas","Ta","vas","mas","te","se","Dve","vahe","mahe","tAt","tAm","hi","tAt","tam","ta","tAm","sva","Dvam","tAm","tam","ta","va","ma","ta","TAs","Dvam","vahi","mahi","yAt","yAtAm","yus","yAs","yAtam","yAta","yAm","yAva","yAma","Syan","Snu","Snam","SnA","SAyac","SAnac","ya");
// halAdi pratyayas and ajAdi pratyayas
$ajAdi_sArvadhAtuka_pratyayas=array("Ani","Ava","Ama","E","AvahE","AmahE","am","Sap","Satf!","SAnac","SAnan","cAnaS","KaS","Sa","eS","SaDyE","SaDyEn","anti","Ate","ate","ATe","e","ati","antu","AtAm","atAm","ATAm","atu","an","AtAm","ata","ATAm","i","us","Ita","IyAtAm","Iran","ITAs","IyATAm","IDvam","Iya","Ivahi","Imahi","Sa","SAyac","SAnac");
$halAdi_sArvadhAtuka_pratyayas=array("ti","si","mi","tu","t","s","tas","Tas","Ta","vas","mas","te","se","Dve","vahe","mahe","tAt","tAm","hi","tAt","tam","ta","tAm","sva","Dvam","tAm","tam","ta","va","ma","ta","TAs","Dvam","vahi","mahi","yAt","yAtAm","yus","yAs","yAtam","yAta","yAm","yAva","yAma","Syan","Snu","Snam","SnA","SAyac","SAnac","ya");
// ArdhadhAtuka tiG pratyayas. Now trying to complete the list according to sahajabodha.
$ArdhadhAtuka_tiG_lRT_parasmai=array("syati","syatas","syanti","syasi","syaTas","syaTa","syAmi","syAvas","syAmas",);
$ArdhadhAtuka_tiG_lRG_parasmai=array("syat","syatAm","syan","syas","syatam","syata","syam","syAva","syAma",);
$ArdhadhAtuka_tiG_luT_parasmai=array("tA","tArO","tAras","tAsi","tAsTas","tAsTa","tAsmi","tAsvas","tAsmas",);
$ArdhadhAtuka_tiG_ASIrliN_parasmai=array("yAt","yAstAm","yAsus","yAs","yAstam","yAsta","yAsam","yAsva","yAsma");
$ArdhadhAtuka_tiG_liT_parasmai=array("Ral","atus","us","Tal","aTus","a","Ral","va","ma",);
$ArdhadhAtuka_tiG_luG_parasmai=array("t","tAm","an","s","tam","ta","am","va","ma","sIt","sizwAm","sizus","sIs","sizwam","sizwa","sizam","sizva","sizma","at","atAm","an","as","atam","ata","am","Ava","Ama","at","atAm","an","as","atam","ata","am","Ava","Ama","sat","satAm","san","sas","satam","sata","sam","sAva","sAma","sIt","stAm","sus","sIs","stam","sta","sam","sva","sma","It","izwAm","izus","Is","izwam","izwa","izam","izva","izma");
$ArdhadhAtuka_tiG_ArDaDAtukalew_parasmai=array("sati","satas","santi","sat","sad","san","sasi","sas","saTas","saTa","sami","sam","savas","sava","samas","sama","sAti","sAt","sAd","sAtas","sAnti","sAn","sAsi","sAs","sATas","sATa","sAmi","sAm","sAvas","sAva","sAmas","sAma",);
$ArdhadhAtuka_tiG_lRT_Atmane=array("syate","syete","syante","syase","syeTe","syaDve","sye","syAvahe","syAmahe",);
$ArdhadhAtuka_tiG_lRG_Atmane=array("syata","syetAm","syanta","syaTAs","syaeTAm","syaDvam","sye","syAvahi","syAmahi",);
$ArdhadhAtuka_tiG_luT_Atmane=array("tA","tArO","tAras","tAse","tAsATe","tADve","tAhe","tAsvahe","tAsmahe",);
$ArdhadhAtuka_tiG_ASIrliN_Atmane=array("sIzwa","sIyAstAm","sIran","sIzWAs","sIyAsTAm","sIDvam","sIya","sIvahi","sImahi");
$ArdhadhAtuka_tiG_liT_Atmane=array("e","Ate","ire","se","ATe","Dve","e","vahe","mahe",);
$ArdhadhAtuka_tiG_luG_Atmane=array("ata","etAm","anta","aTAs","eTAm","aDvam","e","Avahi","Amahi","ata","etAm","anta","aTAs","eTAm","aDvam","e","Avahi","Amahi","sata","sAtAm","santa","saTAs","sATAm","saDvam","si","sAvahi","sAmahi","sta","sAtAm","sata","sTAs","sATAm","Dvam","si","svahi","smahi","izwa","izAtAm","izata","izWAs","izATAm","iQvam","izi","izvahi","izmahi",); 
$ArdhadhAtuka_tiG_ArDaDAtukalew_Atmane=array("sate","satE","sEte","sante","santE","sase","sasE","sETe","saDve","saDvE","se","sE","savahe","savahE","samahe","samahE","sAte","sAtE","sEte","sAnte","sAntE","sAse","sAsE","sETe","sADve","sADvE","se","sE","sAvahe","sAvahE","sAmahe","sAmahE",);
// ArdhadhAtuka tiG pratyayas
$ArdhadhAtuka_tiG_pratyayas=array("syati","syatas","syanti","syasi","syaTas","syaTa","syAmi","syAvas","syAmas","syat","syatAm","syan","syas","syatam","syata","syam","syAva","syAma","tA","tArO","tAras","tAsi","tAsTas","tAsTa","tAsmi","tAsvas","tAsmas","yAt","yAstAm","yAsus","yAs","yAstam","yAsta","yAsam","yAsva","yAsma","Ral","atus","us","Tal","aTus","a","Ral","va","ma","t","tAm","an","s","tam","ta","am","va","ma","sIt","sizwAm","sizus","sIs","sizwam","sizwa","sizam","sizva","sizma","at","atAm","an","as","atam","ata","am","Ava","Ama","at","atAm","an","as","atam","ata","am","Ava","Ama","sat","satAm","san","sas","satam","sata","sam","sAva","sAma","sIt","stAm","sus","sIs","stam","sta","sam","sva","sma","It","izwAm","izus","Is","izwam","izwa","izam","izva","izma","sati","satas","santi","sat","sad","san","sasi","sas","saTas","saTa","sami","sam","savas","sava","samas","sama","sAti","sAt","sAd","sAtas","sAnti","sAn","sAsi","sAs","sATas","sATa","sAmi","sAm","sAvas","sAva","sAmas","sAma","syate","syete","syante","syase","syeTe","syaDve","sye","syAvahe","syAmahe","syata","syetAm","syanta","syaTAs","syaeTAm","syaDvam","sye","syAvahi","syAmahi","tA","tArO","tAras","tAse","tAsATe","tADve","tAhe","tAsvahe","tAsmahe","sIzwa","sIyAstAm","sIran","sIzWAs","sIyAsTAm","sIDvam","sIya","sIvahi","sImahi","e","Ate","ire","se","ATe","Dve","e","vahe","mahe","ata","etAm","anta","aTAs","eTAm","aDvam","e","Avahi","Amahi","ata","etAm","anta","aTAs","eTAm","aDvam","e","Avahi","Amahi","sata","sAtAm","santa","saTAs","sATAm","saDvam","si","sAvahi","sAmahi","sta","sAtAm","sata","sTAs","sATAm","Dvam","si","svahi","smahi","izwa","izAtAm","izata","izWAs","izATAm","iQvam","izi","izvahi","izmahi","sate","satE","sEte","sante","santE","sase","sasE","sETe","saDve","saDvE","se","sE","savahe","savahE","samahe","samahE","sAte","sAtE","sEte","sAnte","sAntE","sAse","sAsE","sETe","sADve","sADvE","se","sE","sAvahe","sAvahE","sAmahe","sAmahE","ista","isAtAm","isata","isTAs","isATAm","iDvam","isDvam","isi","isvahi","ismahi","sDvam","Ji","a","Ta","syant");
// ArdhadhAtuka kRt pratyayas.
$ArdhadhAtuka_kRt_pratyayas= array("Rvul","vuY","Ryat","GaY","Rini","Ra","Ryuw","aR","KukaY","Rvi","Yyuw","Rvin","GinuR","ukaY","uR","Rac","inuR","iY","Rvuc","Ramul","KamuY","tavya","tavyat","anIyar","yat","tfc","lyu","ac","zvun","Takan","vun","wa","in","Kac","qa","KizRuc","viw","vic","manin","vanip","ini","Kyun","tfn","izRuc","yuc","zAkan","Aluc","ru","Gurac","u","Uk","ra","Aru","lukan","varac","qu","zwran","itra","tumun","ap","aTuc","nan","a","ani","lyuw","Ga","Kal","se","sen","ase","asen","aDyE","aDyEn","tavE","taven","tosun","tvan","atfn","kyap","ka","wak","kvin","kaY","kvip","kaY","kvanip","kta","ktavatu","Nvanip","kAnac","kvasu","gsnu","kmarac","kurac","kvarap","kin","ki","najiN","kuk","ktri","naN","ktin","aN","ktic","kse","kasen","kaDyE","kaDyEn","taveN","kamul","kasun","ken","kenya","ktvA",);
// ArdhadhAtuka vikaraNa pratyayas.
$ArdhadhAtuka_vikaraNa_pratyayas=array("ksa","caN","aN","sip","sya","tAs","cli","sic","ciR","u","yak",);
// ArdhadhAtuka prakrIrNa pratyayas.
$ArdhadhAtuka_remaining_pratyayas=array("Am","Ric","IyaN","yaN","san",);
// All ArdhadhAtuka_pratyayas
$ArdhadhAtuka_pratyayas=array("syati","syatas","syanti","syasi","syaTas","syaTa","syAmi","syAvas","syAmas","syat","syatAm","syan","syas","syatam","syata","syam","syAva","syAma","tA","tArO","tAras","tAsi","tAsTas","tAsTa","tAsmi","tAsvas","tAsmas","yAt","yAstAm","yAsus","yAs","yAstam","yAsta","yAsam","yAsva","yAsma","Ral","atus","us","Tal","aTus","a","Ral","va","ma","t","tAm","an","s","tam","ta","am","va","ma","sIt","sizwAm","sizus","sIs","sizwam","sizwa","sizam","sizva","sizma","at","atAm","an","as","atam","ata","am","Ava","Ama","at","atAm","an","as","atam","ata","am","Ava","Ama","sat","satAm","san","sas","satam","sata","sam","sAva","sAma","sIt","stAm","sus","sIs","stam","sta","sam","sva","sma","It","izwAm","izus","Is","izwam","izwa","izam","izva","izma","sati","satas","santi","sat","sad","san","sasi","sas","saTas","saTa","sami","sam","savas","sava","samas","sama","sAti","sAt","sAd","sAtas","sAnti","sAn","sAsi","sAs","sATas","sATa","sAmi","sAm","sAvas","sAva","sAmas","sAma","syate","syete","syante","syase","syeTe","syaDve","sye","syAvahe","syAmahe","syata","syetAm","syanta","syaTAs","syaeTAm","syaDvam","sye","syAvahi","syAmahi","tA","tArO","tAras","tAse","tAsATe","tADve","tAhe","tAsvahe","tAsmahe","sIzwa","sIyAstAm","sIran","sIzWAs","sIyAsTAm","sIDvam","sIya","sIvahi","sImahi","e","Ate","ire","se","ATe","Dve","e","vahe","mahe","ata","etAm","anta","aTAs","eTAm","aDvam","e","Avahi","Amahi","ata","etAm","anta","aTAs","eTAm","aDvam","e","Avahi","Amahi","sata","sAtAm","santa","saTAs","sATAm","saDvam","si","sAvahi","sAmahi","sta","sAtAm","sata","sTAs","sATAm","Dvam","si","svahi","smahi","izwa","izAtAm","izata","izWAs","izATAm","iQvam","izi","izvahi","izmahi","sate","satE","sEte","sante","santE","sase","sasE","sETe","saDve","saDvE","se","sE","savahe","savahE","samahe","samahE","sAte","sAtE","sEte","sAnte","sAntE","sAse","sAsE","sETe","sADve","sADvE","se","sE","sAvahe","sAvahE","sAmahe","sAmahE","Rvul","vuY","Ryat","GaY","Rini","Ra","Ryuw","aR","KukaY","Rvi","Yyuw","Rvin","GinuR","ukaY","uR","Rac","inuR","iY","Rvuc","Ramul","KamuY","tavya","tavyat","anIyar","yat","tfc","lyu","ac","zvun","Takan","vun","wa","in","Kac","qa","KizRuc","viw","vic","manin","vanip","ini","Kyun","tfn","izRuc","yuc","zAkan","Aluc","ru","Gurac","u","Uk","ra","Aru","lukan","varac","qu","zwran","itra","tumun","ap","aTuc","nan","a","ani","lyuw","Ga","Kal","se","sen","ase","asen","aDyE","aDyEn","tavE","taven","tosun","tvan","atfn","kyap","ka","wak","kvin","kaY","kvip","kaY","kvanip","kta","ktavatu","Nvanip","kAnac","kvasu","gsnu","kmarac","kurac","kvarap","kin","ki","najiN","kuk","ktri","naN","ktin","aN","ktic","kse","kasen","kaDyE","kaDyEn","taveN","kamul","kasun","ken","kenya","ktvA","ksa","caN","aN","sip","sya","tAs","cli","sic","ciR","u","yak","Am","Ric","IyaN","yaN","san","ista","isAtAm","isata","isTAs","isATAm","iDvam","isDvam","isi","isvahi","ismahi","sDvam");
// ArdhadhAtuka seT pratyayas.
$ArdhadhAtuka_seT_pratyayas=array("Tal","va","ma","se","Dve","vahe","mahe","kvasu","kta","ktavatu","ktvA","tumun","tavya","tavyat","tfc","tfn","tAs","tavE","taven","tosun","tvan","taveN","sic","sIyuw","san","sya","kse","se","sen","sip",);
// ArdhadhAtuka aniT pratyayas.
$ArdhadhAtuka_aniT_pratyayas=array(); // All except seT. But 'All' is pending. Will complete soon.
$ajAdi_kitGit_ArdhadhAtuka_pratyayas=array("atus","u");
$halAdi_kitGit_ArdhadhAtuka_pratyayas=array("ya");
$other_ArdhadhAtuka_pratyayas=array("Ri");
$kitGit_ArdhadhAtuka_pratyayas=array("atus","u","ya");
$vikaraNa_ArdhadhAtuka_pratyayas=array("u","ya");
$TitlakAra=array("law","liw","luw","lfw","ArDaDAtukalew","sArvaDAtukalew","low");
$GitlakAra=array("laN","viDiliN","ASIrliN","luN","lfN",);
/* Preprocessing of verbs */
/*$sanubandhaverb=array("zage!","zaGa!","za॒ca॑!","zaca॑!","zaca॒!","zawa!","zaRu॑!","zaRa!","zaRa!","zatwa॑!","zatwa!","za॒dx!","zadx!","za॒dx!","zadx!","za॒dx!","zadx!","za॒dx!","za॒dx!","za॒dx!","za॒nja!","zanba॑!","zanba!","zapa!","zama!","zama!","zarja!","zarba!","zarva!","zala!","zasa!","zasa!","zasja!","zasti!","zasti!","za॒ha॒!","zaha॒!","zaha!","zaha॑!","zaha!","zA॒Da!","zAntva॑!","zAntva!","zi॒ca॑!","zi॒Y","zi॒Y","ziwa!","ziDu!","zi॒Du!","ziDU!","ziDU!","zila!","zivu!","zu॒","zu॒","zu॒","zu॒","zu॒","zu॒Y","zutwa॑!","zutwa!","zura!","zura!","zuha!","zuha!","zU","zUN","zUN","zU॒N","zUN","zUda॒!","zUda!","zUda॑!","zUda!","zUrkza!","zUrkzya!","zUza!","zfDf॑!","zfnBu!","zfBu!","zebf॒!","zevf॒!","zevf॒!","zE॒","zo॒","zo","zkaBi॒!","zwIma!","zwuca॒!","zwuBu॒!","zwfkza!","zwyE॒","zwyE॒","zWA॒","zWivu!","zWivu!","zRE॒","ztaka!","ztana!","ztaBi॒!","ztama!","ztama!","ztiGa॒!","ztipf॒!","ztima!","ztIma!","ztuca॒!","ztu॒Y","ztuBu॒!","ztUpa॑!","ztUpa!","ztepf॒!","ztE॒","zTage!","zTala!","zTA॒","zTuqa!","znasu!","znA॒","zni॒ha!","zniha॑!","zniha!","znu","znu","znusa","znusu!","znu॒ha!","znE॒","zmi॒N","zvakka॒!","zvakva॒!","zvada॒!","zvada!","zvada!","zva॒nja॒!","zvazka॒!","zvi॒dA","Ra॑kza!॑","Ra॑Ka!॑","Ra॑Ki!॑","Ra॑wa!॑","Ra॑qa!॑","Ra॑da!॑","wuna॑di!॑","Ra॑Ba!॑","Ra॑Ba!॒","Ra॒ma!॑","Ra॑ya!॒","Ra॑la!॑","Ra॒Sa!॑","Ra॑sa!॒","Ra॒ha!॒॑","RA॑sf!॒","Ri॑si!॒","Ri॑kza!॑","Ri॒ji!॒॑r","Ri॑ji!॒","Ri॑df!॒॑","Ri॑di!॑","Ri॑vi!॑","Ri॑la!॑","Ri॑Sa!॑","Ri॑zu!॑","RI॒Y","RI॑la!॑","RI॑va!॑","RU॑","Ru॑","Ru॒da!॑","Ru॒da!॒॑","RU॑","a॑hi!॑","a॑hi!॒","a॑ki!॒","a॑gi!॑","a॑Gi!॒","a॑ci!॑","a॑ji!॑","a॑Wi!॒","a॑ti!॑","a॑di!॑","a॑bi!॒","a॑Bi!॒","A॑Ci!॑","i॑Ki!॑","i॑gi!॑","i॑di!॑","i॑vi!॑","I॑Ki!॑","I॑Ki!॑","I॑ji!॒","u॑Ki!॑","u॑Ci!॑","u॑Ci!॑","ka॑Wi!॑","u॑hi!॑r","f॑ji!॒","o!॑la॑qi!॑","ka॑si!॒","ka॑ki!॒","ka॑ci!॒","ka॑Wi!॒","ka॑Wi!॑","ka॑qi!॑","ka॑qi!॑","ka॑qi!॒","ka॑di!॑","ka॑di!॒","ka॑pi!॒","kA॑kzi!॑","kA॑ci!॒","ku॑Si!॑","ku॑si!॑","ku॑ji!॑","ku॑wi!॑","ku॑Wi!॑","ku॑Wi!॑","ku॑qi!॑","ku॑qi!॒","ku॑qi!॑","ku॑qi!॑","ku॑Ti!॑","ku॑dri!॑","ku॑bi!॑","ku॑bi!॑","ku॑Bi!॑","kf॑vi!॑","kra॑di!॑","kra॑di!॒","kla॑di!॑","kla॑di!॒","kli॑di!॒","kli॑di!॑","kza॑ji!॑","kza॑ji!॒","kza॑pi!॑","kzu॒di!॒॑r","Ka॑ji!॑","Ka॑qi!॑","Ka॑qi!॒","Ku॑qi!॑","ga॑ji!॑","ga॑qi!॑","ga॑qi!॑","gu॑ji!॑","gu॑Wi!॑","gu॑qi!॑","gf॑ji!॑","gra॑Ti!॒","Ga॑wi!॑","Gi॑Ri!॒","Gu॑zi!॒","Gu॑Ri!॒","Gu॑zi!॑r","Gu॑zi!॑r","Gf॑Ri!॒","ca॒kzi!॒N","ca॑qi!॒","ca॑qi!॑","ca॑di!॑","ca॑pi!॑","ci॑ti!॑","cu॑wi!॑","cu॑qi!॑","cu॑bi!॑","cu॑bi!॑","cyu॑ti!॑r","Ca॑ji!॑","Ca॑di!॑","Ci॒di!॒॑r","u!॑Cf॑di!॒॑r","ja॑si!॑","ja॑ji!॑","ja॑Bi!॑","ji!॒","ji॑vi!॑","ju॑gi!॑","jf॑Bi!॒","jyu॑ti!॑r","wa॑ki!॑","ta॑si!॑","ta॑si!॑","ta॑ki!॑","ta॑gi!॑","ta॑qi!॒","ta॑tri!॒","tu॑ji!॑","tu॑ji!॑","tu॑ji!॑","tu॑qi!॑","tu॑qi!॒","tu॑bi!॑","tu॑bi!॑","tu॑hi!॑r","u!॑tf॑di!॒॑r","tra॑si!॑","tra॑ki!॒","tra॑gi!॑","tra॑di!॑","tri॑Ki!॑","tva॑gi!॑","Ta॑ki!॑","da॑Si!॑","da॑Si!॒","da॑si!॑","da॑si!॒","da॑Gi!॑","di॑vi!॑","du॑hi!॑r","df॑hi!॑","df॒Si!॑r","drA॑kzi!॑","Da॑vi!॑","Di॑vi!॑","Df॑ji!॑","DmA॑kzi!॑","Dra॑ji!॑","DrA॑kzi!॑","Dva॑ji!॑","DvA॑kzi!॑","Ra॑Ki!॑","wuna॑di!॑","Ri॑si!॒","Ri॒ji!॒॑r","Ri॑ji!॒","Ri॑di!॑","Ri॑vi!॑","pa॑si!॑","pa॑si!॑","pa॑ci!॑","pa॑ci!॒","pa॑qi!॑","pa॑qi!॒","pa॑Ti!॑","pi॑si!॑","pi॑ji!॑","pi॑ji!॑","pi॑ji!॒","pi॑Wi!॑","pi॑qi!॑","pi॑qi!॒","pi॑vi!॑","pu॑wi!॑","pu॑qi!॑","pu॑Ti!॑","pf॑ji!॒","ba॑hi!॒","ba॑wi!॑","bi॑di!॑","bu॑gi!॑","bu॑Di!॒॑r","u!॑bu॑ndi!॒॑r","bf॑hi!॑","bf॑hi!॑","Ba॑ji!॑","Ba॑qi!॑","Ba॑qi!॒","Ba॑di!॒","Bi॒di!॒॑r","Bi॑di!॑","Bf॑Si!॑","ma॑hi!॑","ma॑hi!॒","ma॑ki!॒","ma॑Ki!॑","ma॑gi!॑","ma॑Gi!॒","ma॑Gi!॑","ma॑ci!॒","ma॑Wi!॒","ma॑qi!॒","ma॑qi!॑","ma॑qi!॑","ma॑tri!॒","ma॑Ti!॑","ma॑di!॒","mA॑kzi!॑","mi॑ji!॑","mi॑di!॑","mi॑vi!॑","mu॑Ki!॑","mu॑ji!॑","mu॑Wi!॒","mu॑qi!॑","mu॑qi!॒","mf॑qi!॑","ya॑tri!॑","yu॑gi!॑","yu॒ji!॒॑r","ra॑hi!॑","ra॑hi!॑","ra॑Ki!॑","ra॑gi!॑","ra॑Gi!॑","ra॑Gi!॒","ra॑vi!॑","ra॑Pi!॑","ra॑bi!॒","ra॑Bi!॒","ri॑Ki!॑","ri॑gi!॑","ri॒ci!॒॑r","ri॑vi!॑","ru॑Si!॑","ru॑si!॑","ru॑wi!॑","ru॑Wi!॑","ru॑Wi!॑","ru॑qi!॑","ru॑di!॑r","ru॒Di!॒॑r","la॑Ki!॑","la॑gi!॑","la॑Gi!॑","la॑Gi!॑","la॑Gi!॒","la॑Gi!॑","la॑ji!॑","la॑ji!॑","la॑ji!॑","la॑ji!॑","la॑qi!॑","o!॑la॑qi!॑","la॑bi!॒","la॑bi!॒","la॑Bi!॒","lA॑Ci!॑","lA॑ji!॑","li॑Ki!॑","li॑gi!॑","li॑gi!॑","li॑ji!॑","lu॑ji!॑","lu॑ji!॑","lu॑wi!॑","lu॑Wi!॑","lu॑Wi!॑","lu॑Wi!॑","lu॑qi!॑","lu॑Ti!॑","lu॑bi!॑","lu॑bi!॑","va॑ki!॒","va॑ki!॒","va॑Ki!॑","va॑gi!॑","va॑Gi!॒","va॑wi!॑","va॑wi!॑","va॑wi!॑","va॑Wi!॒","va॑qi!॑","va॑qi!॒","va॑di!॒","vA॑kzi!॑","vA॑Ci!॑","vi॒ci!॒॑r","vi॒ji!॒॑r","vu॑gi!॑","bf॑hi!॑","bf॑hi!॑","vf॑ji!॒","vra॑ji!॑","Sa॑ki!॒","Sa॑qi!॒","Si॑Ki!॑","Si॑Gi!॑","Si॑ji!॒","I!॑Su॑ci!॒॑r","Su॑Wi!॑","Su॑Wi!॑","Su॑Wi!॑","Scu॑ti!॑r","Scyu॑ti!॑r","Sra॑ki!॒","Sra॑gi!॑","Sra॑Ti!॒","Sla॑ki!॒","Sla॑gi!॑","Sva॑ki!॒","Sra॑gi!॑","Sva॑ci!॒","Sva॑Wi!॑","Svi॑di!॒","za॑sti!॑","zi॑vi!॑","ska॒ndi!॑r","ska॑Bi!॒","sku॑di!॒","zwa॑Bi!॒","spa॑di!॒","sPu॑wi!॑r","sPu॑wi!॑","sPu॑wi!॑","sPu॑qi!॑","sPu॑qi!॒","sra॑ki!॒","zva॑ki!॒","Sra॑gi!॑","hi॑si!॑","hi॑si!॑","hi॑qi!॒","hi॑vi!॑","hu॑qi!॒","hu॑qi!॒","u॑rda!॒","u॑rvI!॑","ku॑rda!","gu॑rda!॑","gu॑rvI!॑","du॑rvI!॑","Du॑rvI!॑","pu॑rva!॑","pu॑rva!॑","mu॑rCA!॑","mu॑rvI!॑","sPu॑rCA!॑","hu॑rCA!॑");
$sanubandhaverb=  array_unique($sanubandhaverb);
$sanubandhaverb=  array_values($sanubandhaverb);
$sanubandhaverb=array_map('trim',$sanubandhaverb);
$noaccentsanubandha=array_map('removeaccent',$sanubandhaverb);
$noaccentsanubandhaslp=array_map('trim',$noaccentsanubandha);
$noaccentwithoutanusvar=array_map('removeanusvar',$noaccentsanubandhaslp);
$noaccentniranubandhaslp=array_map('verbprocess',$noaccentsanubandhaslp);*/

/* changing the pada of verb in case of upasargas */
$toatmane=array("niviSa!","parikrIY","vikrIY","avakrIY","viji","parAji","AkrIqf!","anukrIqf!","samkrIqf!","parikrIqf!","samsTA","avasTA","prasTA","visTA","udtapa!","vitapa!","Ayama!","Ahana!","samgamx!","samfcCa!","sampracCa!","samsvf","samf","samzru","samvidx!","nihveY","samhveY","upahveY","vihveY","avagf","jijYA","SuSru","susmf","didfSir",);
$sutraenglish=array("nerviSaH (1.3.17)","parivyavebhyaH kriyaH (1.3.18)","parivyavebhyaH kriyaH (1.3.18)","parivyavebhyaH kriyaH (1.3.18)","viparAbhyAM jeH (1.3.19)","viparAbhyAM jeH (1.3.19)","krIDo'nusaMparibhyazca (1.3.21)","krIDo'nusaMparibhyazca (1.3.21)","krIDo'nusaMparibhyazca (1.3.21)","krIDo'nusaMparibhyazca (1.3.21)","samavaparivibhyaH sthaH (1.3.22)","samavaparivibhyaH sthaH (1.3.22)","samavaparivibhyaH sthaH (1.3.22)","samavaparivibhyaH sthaH (1.3.22)","udvibhyAM tapaH (1.3.27)","udvibhyAM tapaH (1.3.27)","AGo yamahanaH (1.3.28)","AGo yamahanaH (1.3.28)","samo gamyRcCipracCisvarAyartishruvidibhyaH (1.3.29)","samo gamyRcCipracCisvarAyartishruvidibhyaH (1.3.29)","samo gamyRcCipracCisvarAyartishruvidibhyaH (1.3.29)","samo gamyRcCipracCisvarAyartishruvidibhyaH (1.3.29)","samo gamyRcCipracCisvarAyartishruvidibhyaH (1.3.29)","samo gamyRcCipracCisvarAyartishruvidibhyaH (1.3.29)","samo gamyRcCipracCisvarAyartishruvidibhyaH (1.3.29)","nisamupavibhyo hvaH (1.3.30)","nisamupavibhyo hvaH (1.3.30)","nisamupavibhyo hvaH (1.3.30)","nisamupavibhyo hvaH (1.3.30)","avAdgraH (1.3.51)","jJAzrusmRdRzAM sanaH (1.3.57)","jJAzrusmRdRzAM sanaH (1.3.57)","jJAzrusmRdRzAM sanaH (1.3.57)","jJAzrusmRdRzAM sanaH (1.3.57)",);
$sutradeva=array("नेर्विशः (१.३.१७)","परिव्यवेभ्यः क्रियः (१.३.१८)","परिव्यवेभ्यः क्रियः (१.३.१८)","परिव्यवेभ्यः क्रियः (१.३.१८)","विपराभ्यां जेः (१.३.१९)","विपराभ्यां जेः (१.३.१९)","क्रीडोऽनुसंपरिभ्यश्च (१.३.२०)","क्रीडोऽनुसंपरिभ्यश्च (१.३.२०)","क्रीडोऽनुसंपरिभ्यश्च (१.३.२०)","क्रीडोऽनुसंपरिभ्यश्च (१.३.२०)","समवप्रविभ्यः स्थः (१.३.२२)","समवप्रविभ्यः स्थः (१.३.२२)","समवप्रविभ्यः स्थः (१.३.२२)","समवप्रविभ्यः स्थः (१.३.२२)","उद्विभ्यां तपः (१.३.२७)","उद्विभ्यां तपः (१.३.२७)","आङो यमहनः (१.३.२८)","आङो यमहनः (१.३.२८)","समो गम्यृच्छिप्रच्छिस्वरत्यर्तिश्रुविदिभ्यः (१.३.२९)","समो गम्यृच्छिप्रच्छिस्वरत्यर्तिश्रुविदिभ्यः (१.३.२९)","समो गम्यृच्छिप्रच्छिस्वरत्यर्तिश्रुविदिभ्यः (१.३.२९)","समो गम्यृच्छिप्रच्छिस्वरत्यर्तिश्रुविदिभ्यः (१.३.२९)","समो गम्यृच्छिप्रच्छिस्वरत्यर्तिश्रुविदिभ्यः (१.३.२९)","समो गम्यृच्छिप्रच्छिस्वरत्यर्तिश्रुविदिभ्यः (१.३.२९)","समो गम्यृच्छिप्रच्छिस्वरत्यर्तिश्रुविदिभ्यः (१.३.२९)","निसमुपविभ्यो ह्वः (१.३.३०)","निसमुपविभ्यो ह्वः (१.३.३०)","निसमुपविभ्यो ह्वः (१.३.३०)","निसमुपविभ्यो ह्वः (१.३.३०)","अवाद्ग्रः (१.३.५१)","ज्ञाश्रुस्मृदृशां सनः (१.३.५७)","ज्ञाश्रुस्मृदृशां सनः (१.३.५७)","ज्ञाश्रुस्मृदृशां सनः (१.३.५७)","ज्ञाश्रुस्मृदृशां सनः (१.३.५७)",);
/* Function to find pratyAhAra from given two letters */ 
// Enter your letters in the arguments like prat('Jl') will mean pratyAhAra jhal.
function prat($text)  // prat for pratyAhAra
{
global $shiv; // incorporating $shiv from arrays.
if ($text === "ra") // for circumventing the imaginary ra pratyAhAra
{
$text = array("r","l"); 
} 
elseif ($text === "yR") // for circumventing the yaN pratyAhAra because of problem of double N
{
$text = array("y","y","v","v","r","r","l","l");
}
else
{
$a = str_split($text); // separating starting letter and ending letter.
$a[1] = str_replace($a[1],"-".$a[1],$a[1]);  // adding a dash.
$text = array_slice($shiv,array_search($a[0],$shiv),array_search($a[1],$shiv)-array_search($a[0],$shiv)+1);    // taking the necessary pratyAhAra from $shiv.
$b = implode(" ",$text); // creating a single string of pratyAhAra.
$b = str_replace(" -R","",$b); // removing the end markers of pratyAhAras in between.
$b = str_replace(" -k","",$b);
$b = str_replace(" -N","",$b);
$b = str_replace(" -c","",$b);
$b = str_replace(" -w","",$b);
$b = str_replace(" -m","",$b);
$b = str_replace(" -Y","",$b);
$b = str_replace(" -z","",$b);
$b = str_replace(" -S","",$b);
$b = str_replace(" -v","",$b);
$b = str_replace(" -y","",$b);
$b = str_replace(" -r","",$b);
$b = str_replace(" -l","",$b);
$b = str_replace("a","a A",$b); // Adding the dIrgha of vowels.
$b = str_replace("i","i I",$b);
$b = str_replace("u","u U",$b);
$b = str_replace("f","f F",$b);
$b = str_replace("x","x X",$b);
$b = str_replace("y","y y",$b);
$b = str_replace("v","v V",$b);
$b = str_replace("r","r r",$b);
$b = str_replace("l","l l",$b);
$text = explode(" ",$b); // creating the array of pratyAhAra back.
}
return $text; // returning the result of function to user.
}
/* function pratyAhAra check is for checking in regular expressions. 
 * In regular expressions we don't treat arrays. usually it is 'aAiIuU'. 
 * so this function converts the pratyAhAra to this flat format. */
function pc($text) // pratyAhAra check
{
$text = "'".implode("",prat($text))."'"; // e.g. converting array("a","A") to 'aA'.
return $text; // returning the result to the user.
}
/* Function one is for replacing one letter in the whole array of $text with another letter */
// There are three arguments.
// $a is the array which you want to change. 
// $b is the array which will be put in place of the replaced one.
// $merge can take two values. 0 will mean that the whole $text will be replaced with the new replaced values. Used in case of mandatory Adezas.
// 1 will mean that $text will not be replaced, but the replaced values will be added to it. Used in case of optional Adezas.
function one($a,$b,$merge)
{
    global $text; // taking $text from the subanta.php or sandhi.php and using it here.
    for($z=0;$z<count($text);$z++)
    {
        $p = $text[$z]; // $p is a word from the array $text.
        for($i=0;$i<count($a);$i++)
        {
            $p =  str_replace($a[$i],$b[$i],$p);    // Doing replace in $p.
        }
        $text1[$z] = $p; // storing $p in array $text1.
    }
    if ($merge === 0) // if the Adeza is mandatory.
    {
        $text = $text1; // replaced $text with $text1 (replace one)
        $text = array_unique($text); // keeping only unique values.
        $text = array_values($text); // giving new serial number to the values.
    }
    if ($merge === 1) // if the Adeza is optional.
    {
        $text = array_merge($text,$text1); // merging $text, and the replaced $text1.
        $text = array_unique($text);
        $text = array_values($text);
    }
return $text;  // giving the result to the user.
}
/* Function two is for replacing one letter in the whole array of $text with another letter */
// There are five arguments, $a,$b are the arrays which you want to change, $c,$d are the arrays which will be put in place of the replaced one.
// $merge can take five values. 
// 0 will mean that the whole $text will be replaced with the new replaced values. Used in case of mandatory Adezas.
// 1 will mean that $text will not be replaced, but the replaced values will be added to it. Used in case of optional Adezas.
// 2 = without + sign, mandatory (apadAnta etc)
// 3 = without + sign, optional
// 4 = with + sign only, mandatory (padAnta etc)
// 5 = with + sign only, optional.
// 11 - change at the end of word only.
function two($a,$b,$c,$d,$merge) // the comments are the same as one function.
{
    global $text;
    for ($z=0;$z<count($text);$z++)
    {$p = $text[$z];
          for($i=0;$i<count($a);$i++)
          {
           for($j=0;$j<count($b);$j++)
                {
                    if($merge<2 || $merge===11)
                    {
                    $p =  str_replace($a[$i].$b[$j],$c[$i].$d[$j],$p);   // replacement without "+" sign.
                    $p =  str_replace($a[$i]."+".$b[$j],$c[$i]."+".$d[$j],$p); // replacement for "+" sign.
                    }
                    elseif ($merge<4)
                    {
                    $p =  str_replace($a[$i].$b[$j],$c[$i].$d[$j],$p);  // replacement without "+" sign.                     
                    }
                    else
                    {
                    $p =  str_replace($a[$i]."+".$b[$j],$c[$i]."+".$d[$j],$p); // replacement with "+" sign.                                          
                    }
                }
          }
     $text1[$z]  = $p;      
    }
if (($merge === 0) || ($merge === 2) ||($merge === 4) ) // mandatory Adezas
    {
        $text2 = $text1;
        $text2 = array_unique($text2);
        $text2 = array_values($text2);
    }
if (($merge === 1) || ($merge === 3) ||($merge === 5) ) // optional Adezas.
    {
        $text2 = array_merge($text,$text1);
        $text2 = array_unique($text2);
        $text2 = array_values($text2);
    }
    return $text2;
}

/* Function three is for replacing one letter in the whole array of $text with another letter */
// There are seven arguments, $a,$b,$c are the arrays which you want to change, $d,$e,$f are the arrays which will be put in place of the replaced one.
// $merge can take two values. 
// 0 will mean that the whole $text will be replaced with the new replaced values. Used in case of mandatory Adezas.
// 1 will mean that $text will not be replaced, but the replaced values will be added to it. Used in case of optional Adezas.
function three($a,$b,$c,$d,$e,$f,$merge) // comments are the same as one function.
{global $text;
   for ($z=0;$z<count($text);$z++)
    {$p = $text[$z]; 
     for($i=0;$i<count($a);$i++)
    {
    for($j=0;$j<count($b);$j++)
        {
        for($k=0;$k<count($c);$k++)
            {
            $p =  str_replace($a[$i].$b[$j].$c[$k],$d[$i].$e[$j].$f[$k],$p);       
           $p =  str_replace($a[$i]."+".$b[$j].$c[$k],$d[$i]."+".$e[$j].$f[$k],$p);       
           $p =  str_replace($a[$i].$b[$j]."+".$c[$k],$d[$i].$e[$j]."+".$f[$k],$p);       
           $p =  str_replace($a[$i]."+".$b[$j]."+".$c[$k],$d[$i]."+".$e[$j]."+".$f[$k],$p);       
            }
        }
    }
    $text1[$z] = $p;
    }
    if ($merge === 0)
    {
        $text = $text1;
        $text = array_unique($text);
        $text = array_values($text);
    }
    if ($merge === 1)
    {
        $text = array_merge($text,$text1);
        $text = array_unique($text);
        $text = array_values($text);
    }
    return $text;
}
/* function flatten is a function to flatten a multidimentional array */
// I have borrowed this function from examples in php.net site.
// e.g. array([0]=> a [1]=> array([0] => b [1] => c)) this is flattened in array([0]=>a [1]=>b [2]=>c).
/*function flatten(array $array) // $array is the multidimentional array which you want to flatten.
{
    $return = array();
    array_walk_recursive($array, function($a) use (&$return) { $return[] = $a; });
    return $return;
}*/ // This code is immeculate. But unfortunately the servers don't support PHP5.4.
function flatten($array) {
    if (!is_array($array)) {
        // nothing to do if it's not an array
        return array($array);
    }

    $result = array();
    foreach ($array as $value) {
        // explode the sub-array, and add the parts
        $result = array_merge($result, flatten($value));
    }

    return $result;
}
/* function savarna is to find out savarNa of a character from the given pratyAhAra */
// $inarray is the array for which you are looking for savarNa.
// $array is the array in which you are looking for savarNa.
// e.g. savarNa(array("a"),prat('ac')) will give  savarNa of letter 'a' from the pratyAhAra 'ac'.
// Known issue - words having two Asyas are not treated properly.
function savarna($inarray,$array)
{
for($z=0;$z<count($inarray);$z++)
{
$text = $inarray[$z];    
    global $kantha,$talu,$murdha,$danta,$oshtha,$nasika,$kanthatalu,$kanthoshtha,$dantoshtha,$sprushta,$ishatsprushta,$vivruta,$samvruta,$aghosha,$alpaprana,$ghosha,$mahaprana,$ac,$udatta,$anudatta,$svarita,$shvasa,$nada,$vivara,$samvara,$hl,$ru,$e; // bringing the arrays in function
    // defining an array for sthAna
$i=0;
if (in_array($text,$kantha)) { $sthana[$i] = $kantha; $i++; } 
if (in_array($text,$talu)) { $sthana[$i] =  $talu; $i++; }
if (in_array($text,$murdha)) { $sthana[$i] = $murdha; $i++; }
if (in_array($text,$danta)) { $sthana[$i] = $danta; $i++; }
if (in_array($text,$oshtha)) { $sthana[$i] = $oshtha; $i++; }
if (in_array($text,$nasika)) { $sthana[$i] = $nasika; $i++; }
if (in_array($text,$kanthatalu)) { $sthana[$i] = $kanthatalu; $i++; }
if (in_array($text,$kanthoshtha)) { $sthana[$i] = $kanthoshtha; $i++;}
if (in_array($text,$dantoshtha)) { $sthana[$i] = $dantoshtha; $i++; }
// defining an array for Abhyantara prayatna for consonants
$j=0;
if (in_array($text,$sprushta)) { $abhyantara[$j] = $sprushta; $j++; }
if (in_array($text,$ishatsprushta)) { $abhyantara[$j] = $ishatsprushta; $j++; }
if (in_array($text,$vivruta)) { $abhyantara[$j] = $vivruta; $j++; }
if (in_array($text,$samvruta)) { $abhyantara[$j] = $samvruta; $j++; }
// defining an array for bAhya prayatna for consonants and prANa
$k=0;
if (in_array($text,$aghosha)) { $ghosh[$k] = $aghosha; $k++; }
if (in_array($text,$alpaprana)) { $prana[$k] = $alpaprana; $k++; }
if (in_array($text,$ghosha)) { $ghosh[$k] = $ghosha; $k++; }
if (in_array($text,$mahaprana)) { $prana[$k] = $mahaprana; $k++; }
// defining an array for bAhya prayatna of vowels
$u=0;
if (in_array($text,$ac)) { $svar[$u] = $udatta; $u++; }
// Finding out intersections of sthAna, Abhyantara prayatna and bAhya prayatnas of the given letter and the given array. 
if(empty($sthana)===FALSE)
{
$sthanasamya = array_intersect(flatten($sthana),$array);  // finding the intersection of sthAna
}
if(empty($abhyantara)===false)
{
$abhyantarasamya = array_intersect(flatten($abhyantara),$array); // finding the intersection of Abhyantara prayatna
}
if(empty($ghosh)===FALSE)
{
$ghoshasamya = array_intersect(flatten($ghosh),$array); // finding the intersection of bAhya prayatna
}
if(empty($prana)===FALSE)
{
$pranasamya = array_intersect(flatten($prana),$array); // finding the intersection of prANa.
}
if(empty($svar)===false)
{
if(in_array($text,$ac)) { $svarasamya = array_intersect(flatten($svar),$array,$ac); // finding the svarasAmya
}    
}
$l = array_intersect($sthanasamya,$abhyantarasamya,$ghoshasamya,$pranasamya); // $l is the case in which sthAna, Abhyantaraprayatna, ghoSa and prANa all are matching. The best match.
$m = array_intersect($sthanasamya,$abhyantarasamya,$ghoshasamya); // $m is the case in which sthAna, Abhyantaraprayatna and ghoSa are matching. The second best match.
$n = array_intersect($sthanasamya,$abhyantarasamya); // $n is the case in which sthAna and Abhyantaraprayatna are matching. The third best match.
$o = array_intersect($sthanasamya,$abhyantarasamya,$pranasamya); // $o is the case in which sthAna, Abhyantaraprayatna and prANa are matching. The second best match.
$p = array_intersect($sthanasamya,$ghoshasamya); // $p is the case in which sthAna and ghoSa are matching. The third best match.
$q = array_intersect($sthanasamya,$pranasamya); // $q is the case in which sthAna and prANa are matching. The third best match.
// Defining savarNas for consonants
if(in_array($text,$hl))
{
    if(empty($sthanasamya)===false&&empty($abhyantarasamya)===false&&empty($ghoshasamya)===false&&empty($pranasamya)===FALSE&&empty($l)===false)  // four match
    {
            $savarna = implode(", ",$l);     
    }
    elseif (empty($sthanasamya)===false&&empty($abhyantarasamya)===false&&empty($ghoshasamya)===false&&empty($m)===false) // three match
    {
            $savarna = implode(", ",$m);     
    }
    elseif (empty($sthanasamya)===false&&empty($abhyantarasamya)===false&&empty($pranasamya)===false&&empty($o)===false) // three match
    {
            $savarna = implode(", ",$o);     
    }
    elseif (empty($sthanasamya)===false&&empty($abhyantarasamya)===false&&empty($n)===false) // two match
    {
            $savarna = implode(", ",$n);     
    }
     elseif (empty($sthanasamya)===false&&empty($ghoshasamya)===false&&empty($p)===false) // two match
    {
            $savarna = implode(", ",$p);     
    } elseif (empty($sthanasamya)===false&&empty($pranasamya)===false&&empty($q)===false) // two match
    {
            $savarna = implode(", ",$q);     
    }
    else // no match
    {
    $savarna = implode(", ",$sthanasamya);    
    }
} 
// defining savarNas for vowels
else
{  
    if (in_array($text,$ru)||in_array($text,$e))
    {// patch for $ru
        for($i=0;$i<4;$i++)
        {
        if ($text === $ru[$i])
        {
            if (in_array($text,$array))
            { $savarna = "f, F, x, X"; }
            else
            { $savarna = ""; }
        }
        // patch for non sAvarNya of e,E,o,O
        elseif ($text === $e[$i])
        {
            if (in_array($text,$array))
            { $savarna = $text; }
            else
            { $savarna = ""; }
        }
        }
    }
  else 
    {// In case of other vowels.
        $savarna = implode(", ",$sthanasamya);
    }
}
// stores that savarNa letter in memory.
$arr[$z] =  $savarna; // We got the savarNa for the first letter of the array. The loop is repeated for all members of the array.
}
return $arr; // returning the desired savarNa array.
}
/* function display will show the text on screen. */
// There are three arguments. 0 will simply display the message. 
// 1 will show an additional message in dvitva. 
// 2 is not used in the code. Useful where there were two optional forms.
// 3 is for aGgAdhikAra.
// 4 is for yaNaH pratiSedho vAcyaH in case of yaN.
// 5 is for sarvAdeza.
// 6 is for bhasya adhikAra.
// 7 is for padasya, padAt, anudAttaM sarvamapAdAdau adhikAra.
// 8 is for anupasarjanAt adhikAra.
// new messages can be added if the message is of repeated nature.
function display($n)
{
    global $text; global $upasarga_joined; global $us; // bringing $text from main php function.
    /* removal of two ++ signs */
    $text = one(array("++"),array("+"),0);

    if ($n === 1) // sending special messages.
        {
        echo "<p class = hn>Please note: Wherever there is dvitva, it is optionally negated by sarvatra zAkalyasya. (".link_sutra("8.4.51").")</p>\n";
        echo "<p class = hn>द्वित्व का सर्वत्र सर्वत्र शाकल्यस्य (८.४.५१) से पाक्षिक निषेध होता है ।</p>\n";
        }
    if ($n === 2) 
        { 
        global $text1; $text2 = $text; $text = $text1; 
        }
    if ($n === 3) 
        {
        echo "<p class = pa>yasmAtpratyayavidhistadAdi pratyaye'Ggam (".link_sutra("2.4.13").") and aGgasya (".link_sutra("6.4.1").") </p>\n";
        echo "<p class = pa>यस्मात्प्रत्ययविधिस्तदादि प्रत्ययेऽङ्गम्‌ (२.४.१३) तथा अङ्गस्य (६.४.१) </p>\n";
        }
    if ($n === 4) 
        {
        echo "<p class = hn>N.B.: yaNaH pratiSedho vAcyaH (vA 4806) prevents application of saMyogAntasya lopaH (".link_sutra("8.2.23").") </p>\n";
        echo "<p class = hn>यणः प्रतिषेधो वाच्यः (वा ४८०६) से संयोगान्तस्य लोपः (८.२.२३) का निषेध होता है ।</p>\n";
        }
    if ($n === 5) 
        {
        echo "<p class = hn>N.B.: anekAlzitsarvasya (".link_sutra("1.1.55").") mandates sarvAdeza.  </p>\n";
        echo "<p class = hn>अनेकाल्शित्सर्वस्य (१.१.५५) से सर्वादेश होता है ।</p>\n";
        }
    if ($n === 6) 
        {
        echo "<p class = pa>yasmAtpratyayavidhistadAdi pratyaye'Ggam (".link_sutra("2.4.13").") aGgasya (".link_sutra("6.4.1").") and bhasya (".link_sutra("6.4.129").") :</p>\n";
        echo "<p class = pa>यस्मात्प्रत्ययविधिस्तदादि प्रत्ययेऽङ्गम्‌ (२.४.१३), अङ्गस्य (६.४.१) तथा भस्य (६.४.१२९) :</p>\n";
        }
    if ($n === 7) 
        {
        echo "<p class = pa>padasya (".link_sutra("8.1.16")."), padAt (".link_sutra("8.1.17").") and anudAttaM sarvamapAdAdau (".link_sutra("8.1.18").") :</p>\n";
        echo "<p class = pa>पदस्य (८.१.१६), पदात्‌ (८.१.१७) तथा अनुदात्तं सर्वमपादादौ (८.१.१८) :</p>\n";
        }
    if ($n === 8) 
        {
        echo "<p class = pa>anupasarjanAt (".link_sutra("4.1.14").") :</p>\n";
        echo "<p class = pa>अनुपसर्जनात्‌ (४.१.१४) :</p>\n";
        }
    for($i=1;$i<count($text)+1;$i++) // for all members of the $text array
    {
        if ($upasarga_joined===1 || $us==="")
        {
        echo "<p class = form>$i - ".convert($text[$i-1])."</p>\n"; // showing the output to the browser. e.g. 1. rAmaH. $i is for numbering. function convert converts the output into devanAgarI.
        }
        elseif ($upasarga_joined===0)
        {
        echo "<p class = form>$i - ".convert($us."+".$text[$i-1])."</p>\n"; // showing the output to the browser. e.g. 1. rAmaH. $i is for numbering. function convert converts the output into devanAgarI.
        }
    }
//    echo "<hr>\n"; // drawing a line after all the words are displayed. Thus two sUtras are separated by a separator line.
    if ($n === 2) { $text1 = $text; $text = $text2; } // not useful because the display(2) is not used in the code. If it is used, this will work.
}
/* function dvitva will be used to duplicate a letter */
// It has six arguments, first four arguments are the arrays which need to be replaced. 
// $location is to specify which of these 4 consecutive arrays is to be duplicated. e.g. 2 will mean that the second member will be duplicated.
// $merge is to specify whether to replace (0) or add (1) to the existing array. 0 is used for mandatory dvitva and 1 is used for optional dvitva.
// I am not able to elucidate this code much, because it is a borrowed code. I have kept it as the lender gave.
function dvitva ($kantha,$talu,$murdha,$oshtha,$location,$merge)
{ 
 global $text;   
// this is an array of the input values to use below 
 // get all possible combianations of $kantha+$talu+$murdha
   $combinations = array(); 
     foreach($kantha as $k) // "a","k","g","n","h"
     { 
        foreach($talu as $t) // "i","c","j","y","s"
        { 
            foreach($murdha as $m) // "f","w","q","r","z"
            {
                foreach ($oshtha as $o)
                {
                 $combinations[] = $k.$t.$m.$o;    
                }
            } 
        } 
     } 

$values1 = array();
foreach ($text as $stti => $string)  // 'aifkcwh', 'aifkcwhsz', 'kim', 'aif'
{
    $values = array($string);  
       reset($values); 
  // loop through $values using an array pointer 
    // while the current array pointer position is not null/false
    while(current($values)!==false)
    {
        // on the first iteration, $values will be the inputted string 
        // from $strings_to_test... our example is "aifkcwh"
        $value = current($values); 
        if ($merge === 1)
        {
        $values1[] = current($values);
        }
        // for each possible combination of $kantha.$talu.$murdha
        // let's say our first combination is "aif"
        foreach($combinations as $ci => $combination)
        {  
            // look and see if the current value we are looking
            // at ("aifkcwh") contains this combination string  
            if (strpos($value,$combination)!==false)
            { 
                // if it does... we perform the string mutation
                // "aif" does exist in the string "aifkcwh"

                // get the second letter in the combination string
               // echo $combination. "These are combinations </br>";
                $single = $combination[$location-1];   // i 

                // double that second letter
                $post = substr($combination,$location-1);
                // echo $post. "These are posts </br>";
                $pre = chop($combination,$post);
                // echo $pre. "These are pres </br>";
                // create a new string that is the combination with the 
                // second letter doubled... 
                $newcom = $pre.$combination[$location-1].$post;
               // echo $newcom."These are newcoms </br> ";
                // replace that string in $values so that
                // aifkcwh becomes aiifkcwh
                $newval = str_replace($combination, $newcom, $value); // aiifkcwh

                // does the new value ("aiifkcwh") exist in $values?  
                // have we already recorded this mutation?  
                if (!in_array($newval,$values1)) 
                { 
                    // if not... append it to the array $values
                    $values1[] = $newval; 
                    // now, values would go from being = array([0]=>'aifkcwh'); 
                    // to array ([ 0] => 'aifkcwh', [1] => 'aiifkcwh' ); 
                }
                else 
                {
                }
            } 
        } // <-- end of the foreach statement, this will go through all combinations 
          //     in our combinations array for this particular value which is currently aifkcwh


        // next($values) increments the array pointer so that we move to the next
        // value in the $values array.  since we just added a value, 
        // $values now contains array ([ 0] => 'aifkcwh', [1] => 'aiifkcwh' ); 

        // before this statement index 0, current($values) == 'aifkcwh'
        next($values);  
        // after this statement index 1, current($values) == 'aiifkcwh'
        // for the next loop, we will test this string for all the combinations
        // if there is no next value, the `while` loop will end 
    }  

    // after we have gone through every possible combination for "aifkcwh",
    // we will have something like this: 
    /*
        Array
          (
                [0] => aifkcwh
                [1] => aiifkcwh
                [2] => aifkccwh
                [3] => aiifkccwh
          )
    */
    // and we add that to the $output array that contains an index for 
    // each input string, which contains all possible mutations of that string 
    $output[$string] = $values1; 
}
$output = flatten($output);
$output = array_unique($output);
$output = array_values($output);
return $output;
}
/* function flat is used to make an array useful for regular expressions */
 function flat($array)
 {
     $array = "'".implode("",$array)."'";
     return $array;
 }
/* function blank will return an array having n blank members. blank(2) === array("",""); */
 function blank($n)
 {
     $array = array();
     while(count($array)< $n+1)
     {
        array_push($array,""); // adding blank ""s in the array.
     }
     return $array;
 }
/* function checkarray is used to see whether the sequence of $a,$b,$c,$d is found in any of the members of $text */ 
 function checkarray($a,$b,$c,$d) // usually sub function serves the purpose. Only once or twice this function is used where we have to test 4 consecutive letters to satisfy the demand of the rule.
 {
     global $text;
     $array = $text;
    $combinations = array();
     foreach ($a as $aa)
     {
         foreach ($b as $bb)
         {
             foreach ($c as $cc)
             {
                 foreach ($d as $dd)
                 {
                     $combinations[] = $aa.$bb.$cc.$dd; //  creating all permutations and combinations of given 4 arrays and storing it.
                 }
             }
         }
     }
     $counter = array();
     for ($i=0;$i<count($array);$i++)
     {
         for($j=0;$j<count($combinations);$j++)
         {
             if(strpos($array[$i],$combinations[$j]) !== false)
             {
                 $counter = 1; // if the occurence is found in any of the $text members, $counter is made 1. Otherwise it will remain 0.
                 break;
             }
             else
             {
                 $counter = 0;
             }  
         }
           if ($counter === 1)
           {
               break;
           }
           else 
           {
               $counter = 0;
           }
        
     }
     return $counter; // returns 1 for match found. 0 for no match found.
 }
/* function sub is a modified version of checkarray. It searches for the consecutive occurences of $a,$b,$c in the members of array $text. 
 * $repeat 0 will mean that the sequence doesnt matter. 1 will mean that the sequence has to be the same.
 */ 
 function sub($a,$b,$c,$repeat)
{   
     global $text;
     $needle = array();
    // for different length and all combinations
    if($repeat !== 1)
    {
        foreach ($a as $aa)
        {
         foreach ($b as $bb)
         {
             foreach ($c as $cc)
             {
                 $needle[]=$aa.$bb.$cc; // creating all permutations and combinations.
                 $needle[]=$aa."+".$bb.$cc; // adding "+" at all possible locations.
                 $needle[]=$aa.$bb."+".$cc;
                 $needle[]=$aa."+".$bb."+".$cc;
             }
         }
        }
    }
    // for similar length arrays and ordered combinations.
    if ($repeat === 1)
    {
        for($i=0;$i<count($a);$i++)
        {
            $needle[] = $a[$i].$b[$i].$c[$i]; // creating linear patterns.
            $needle[] = $a[$i]."+".$b[$i].$c[$i]; // adding "+" at all possible locations.
            $needle[] = $a[$i].$b[$i]."+".$c[$i];
            $needle[] = $a[$i]."+".$b[$i]."+".$c[$i];
        }
    }
    /*** map with preg_quote ***/
    $needle = array_map('preg_quote', $needle); 
    /*** loop of the array to get the search pattern ***/
    global $first;
    foreach ($needle as $pattern)
    {
        if ( $repeat<2 && count(preg_grep("/$pattern/", $text)) >0)
        {
        $can = 1; // match found
        break;
        }  
        elseif ( $repeat===2 && ends($text,$needle,0))
        {
        $can = 1; // match found
        break;
        }  
        else
        {
            $can = 0; // match not found
        }
    }
if ($can === 1)
{
    return true;
}
else
{
    return false;
}

}
/* function to search the occurence of a pattern in any of the member of an array */
// $text - the array to search for the occurence of pattern
// $a - pattern in regular expression.
function arr($text,$a)
{
    foreach ($text as $value)
    {
        if (preg_match($a,$value)) // if the regular expression matches the value of array member.
        {
            $count[] = 1; // match found
            break;
        }
        else 
        {
            $count[] = 0; // match not found
        }
    }
    if (in_array(1,$count))
    {
        return true; // if match found
    }
    else
    {
        return false; // if match not found
    }
}
/* function to remove the last n letters from a word in the $text array and replace them with another word */
function last($a,$b,$merge)
{
    global $text; // bringing $text from subanta.php.
    foreach ($text as $value)
    {
        for($i=0;$i<count($a);$i++)
        { $c = str_replace("\\","",$a[$i]);
            if (preg_match('/('.$a[$i].')$/',$value) || preg_match('/('.$c.')$/',$value))
            {
                $value1[] = substr($value,0,-strlen($a[$i])).$b[$i]; // removing the last letter and substituting it with the corresponding letter of $b.
                if ($merge === 1)
                {
                    $value1[] = $value;
                }
            }
            else
            {
                $value1[] = $value;
            }
        }
        if (array_unique($value1)===array($value))
        {
            $value2[] = array_unique($value1); // in case there is no change.
        }
        elseif ($merge === 1)
        {
            $value2[] = array_unique($value1); // in case there is optional Adeza.
        }
        else
        {
            $value2[] = array_diff($value1,array($value)); // in case there is mandatory Adeza.
        }
        $value1 = array(); // reseting the $value1 for future use.
    }
    $text = flatten($value2); // storing the result of $value2 in $text.
    $text = array_unique($text); // keeping only unique members
    $text = array_values($text); // reserialize the numbers.
    return $text; // return to the user.
}
/* function to remove the first n letters from a word in the $text array and replace them with another word */
function first($a,$b,$merge)
{
    global $text;
    foreach ($text as $value)
    {
        for($i=0;$i<count($a);$i++)
        {
            if (preg_match('/^['.$a[$i].']/',$value))
            {
                $value1[] = $b[$i].substr($value,strlen($a[$i])); // This function is the same as last function, except that the replacement here is preceded by the member of $b, unlike followed by member of $b in last function.
                if ($merge === 1)
                {
                    $value1[] = $value;
                }
            }
            else
            {
                $value1[] = $value;
            }
        }
        if (array_unique($value1)===array($value))
        {
            $value2[] = array_unique($value1);
        }
        elseif ($merge === 1)
        {
            $value2[] = array_unique($value1);
        }
        else
        {
            $value2[] = array_diff($value1,array($value));
        }
        $value1 = array();
    }
    $text = flatten($value2);
    $text = array_unique($text);
    $text = array_values($text);
    return $text;
}
/* vriddhi function */
function vriddhi($a)
{ $ac = array("a","A","i","I","u","U","f","F","x","X","e","o","E","O",);
  $acreplace = array("A","A","E","E","O","O","Ar","Ar","Al","Al","E","O","E","O",);
    foreach ($a as $value)
    {
        $out[] = str_replace($ac,$acreplace,$value); // replacing the vowels with their corresponding vRddhi letters.
    }
    return $out;
}
/* guna function */
function guna($a)
{ $ac = array("a","A","i","I","u","U","f","F","x","X","e","o","E","O",);
  $acreplace = array("a","a","e","e","o","o","ar","ar","al","al","e","o","e","o",);
    foreach ($a as $value)
    {
        $out[] = str_replace($ac,$acreplace,$value); // replacing the vowels with their corresponding guNa letters.
    }
    return $out;
}
/* dirgha function */
function dirgha($a)
{ $ac = array("a","A","i","I","u","U","f","F","x","X","e","o","E","O",);
  $acreplace = array("A","A","I","I","U","U","F","F","F","F","e","o","E","O",);
    foreach ($a as $value)
    {
        $out[] = str_replace($ac,$acreplace,$value); // replacing the vowels with their corresponding dIrgha letters.
    }
    return $out;
}

/* anekAca function */
// function to test whether the word is ekAc or anekAc i.e. whether there is only one vowel in it or more than one vowel in it.
function anekAca($a)
{
    $ac = array("a","A","i","I","u","U","f","F","x","X","e","o","E","O",); // vowel list.
    $b = preg_split('/['.flat($ac).']/',$a); // splitting the word by vowels.
    if (count($b)>2) // if there are more than 2 pieces, that means there are more than one vowel mandatorily.
    {
        return true; // returns true to the user.
    }
    else
    {
        return false;  // returns false to the user.
    }
}
/* ends function */
// to find if there is any member of array which end in a particular member of another array.
// 0 -> doesn't start with but ends with it. 1 -> ends with it or is equal to it. 2 -> is equal to it., 3 -> starts with it but doesn't end with it. 4 -> ends in verb (upasargas don't bother)
function ends($a,$b,$n)
{
    $upasarga = array("pra","prati","api","parA","apa","upa","pari","anu","ava","vi","saM","su","ati","ni","nir","ut","aDi","dur","aBi","A"); 
    $pattern=array("pari","pary","pra","prA","pro","prati","praty","api","apy","parA","paro","apa","apA","apo","upa","upA","upo","anu","anU","anv","ava","avA","avo","vi","vy","saM","sam","san","su","sU","sv","ati","aty","ni","ny","nir","niH","nis","niz","ut","ud","uc","ul","aDi","aDy","dur","duH","dus","duz","aBi","aBy","A",);
    
    foreach ($a as $aa)
    {
        foreach ($b as $bb)
        {
            if ($n===0) 
            {
                if (strpos($aa,$bb)>0 && strpos(strrev($aa),strrev($bb)) ===0) // strpos($aa,$bb)>0 means that it doesn't start with it. the next means that it ends with it.
                {
                    $can[] = 1;
                }
                else
                {
                    $can[] = 0;
                }                
            }
            if ($n===1)
            {
                if (strpos($aa,$bb) >= 0 && strpos(strrev($aa),strrev($bb)) ===0) // strpos($aa,$bb) >= 0 means that it starts with it or is included in it. the next means that it ends with it.
                {
                    
		    $can[] = 1;
                }
                else
                {
                    $can[] = 0;
                }                
            }
            if ($n===2)
            {
                if ($aa===$bb) // they are the same.
                {
                    
		    $can[] = 1;
                }
                else
                {
                    $can[] = 0;
                }                
            }
            if ($n===3) 
            {
                if (strpos($aa,$bb)===0 && strpos(strrev($aa),strrev($bb)) !==0) 
                {
                    $can[] = 1;
                }
                else
                {
                    $can[] = 0;
                }                
            }
            if ($n===4) 
            {
                    foreach ($pattern as $one)
                    {
                        foreach ($pattern as $two)
                        {
                            if (strpos($aa,$one)===0 && strpos($aa,$two.$bb)!==false && strpos(strrev($aa),strrev($bb))===0 )
                            {
                                $prat[]=1;
								break;
                            }
                        }
                    }
					if (!$prat) { $prat=array(0); }
                if ( (strpos($aa,$bb)>0 && in_array(1,$prat) ) || $aa===$bb) 
                {
                    $can[] = 1;
                }
                else
                {
                    $can[] = 0;
                }                
            }

        }
    }
    if (in_array(1,$can))
    {
        return true; // if any time $can becomes 1, it means that match is found.
    }
    else
    {
        return false; // match not found.
    }
}
/* function Ti to remove the Ti */
// $merge 0 - mandatory Adezas, 1 - optional Adezas.
function Ti($merge)
{   
    global $text;
    $te1 = '/(['.pc('ac').'])(['.pc('hl').']*)([+])/'; // vowel - unlimited combinations of consonants - '+' combination.
    $te2 = '$3'; // keep only "+" and remove the first two members.
        foreach ($text as $value)
        {
            $val[] = preg_replace($te1,$te2,$value); // removing the first two members.
        }
        if ($merge===0) // mandatory Adezas
        {
            $text = $val;
        }
        if ($merge === 1) // optional Adezas
        {
            $text = array_merge($text,$val);
        }        
    $val=array();
    $text = array_unique($text);
    $text = array_values($text);
    return $text; // giving the result to the user.
}
/* function mit */
// $pattern is the pattern to search in the word to add mit pratyaya.
// $b is the addition to upadha
// $merge 0 is replacement, 1 is optional.
function mit($pattern,$b,$merge)
{   global $text;
    $te1 = '/(['.pc('ac').'])(['.pc('hl').']*)([+])/';
    $te2 = '$1'.$b.'$2$3'; // Adding the mit Agama after the last vowel. 'midaco'ntyAtparaH'.
        foreach ($text as $value)
        {
            if (preg_match($pattern,$value))
            {
//                $val[] = preg_replace($te1,'$1n$2$3',$value); // executing mit Agama.
                  $val[] = preg_replace($te1,$te2,$value); // executing mit Agama.
            }
            else
            {
                $val[] = $value;
            }
        }        
        if ($merge===0)
        {
            $text = $val;
        }
        if ($merge === 1)
        {
            $text = array_merge($text,$val);
        }        
    $val=array();
    $text = array_unique($text);
    $text = array_values($text);
    return $text;
}
/* function samprasarana */
function samprasarana($input,$merge)
{
    global $text; global $ac;
    $yan = array("ya","va","ra","la");
    $yanik = array("ia","ua","fa","xa"); // list of samprasAraNa for yaN.
    foreach ($input as $value)
    {
        $val1[]=str_replace($yan,$yanik,$value);
    }
        if ($merge===0)
        {
            $text = one($input,$val1,0);        // doing samprasARaNa.            
        }
        if ($merge===1)
        {
            $text = one($input,$val1,1);        // doing samprasARaNa.            
        }
        echo "<p class = sa >igyaNaH samprasAraNam (".link_sutra("1.1.45").") :</p>\n";
        echo "<p class = sa >इग्यणः सम्प्रसारणम्‌ (१.१.४५) :</p>\n";
        display(0);
    if (arr($text,'/[iufx][aAiIuUfFxXeEoO]/'))
    {
        $text = two(array("i","u","f","x"),$ac,array("i","u","f","x"),blank(count($ac)),2);
        echo "<p class = sa >samprasAraNAcca (".link_sutra("6.1.104").") :</p>\n"; 
        echo "<p class = sa >सम्प्रसारणाच्च (६.१.१०४) :</p>\n";
        display(0);    
    }   
	if (sub(array("u+uc","i+ij","u+up","u+ud","u+uh","u+uS","u+us"),blank(0),blank(0),0))
	{
		$text = one(array("u+uc","i+ij","u+up","u+ud","u+uh","u+uS","u+us"),array("Uc","Ij","Up","Ud","Uh","US","us"),0);
		echo "<p class = sa >By akaH savarNe dIrghaH (".link_sutra("6.1.101").") :</p>\n";
		echo "<p class = sa >अकः सवर्णे दीर्घः (६.१.१०१) :</p>\n";
		display(0);		
	}
    return $text;
}
/* function itcheck */
// $a to contain the array of it markers to check.
// $b. 0 for it. 1 for itprakriti. 2 for itpratyaya
function itcheck($a,$b)
{
    global $text; global $it; global $itprakriti; global $itpratyaya;
    if ($b===0)
    {
        if(count(array_intersect($it,$a))>0) // finds in $it.
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    if ($b===1)
    {
        if(count(array_intersect($itprakriti,$a))>0) // finds in $itprakriti
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    if ($b===2)
    {
        if(count(array_intersect($itpratyaya,$a))>0) // finds in $itpratyaya
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
}
/* function it (to find an it marker). The function adds the marker to its arrays. */
// $pattern is the pattern to look for
// $a 0 for finding it in the whole word. 1 for it in prakriti. 2 for it in pratyaya.
function it($pattern)
{
    global $text; global $it; global $itprakriti; global $itpratyaya;
        foreach ($text as $value)
        {
            $b = preg_split($pattern,$value,null,PREG_SPLIT_DELIM_CAPTURE); // spliting the string by the pattern.
            for($i=1;$i<((count($b)+1)/2);$i++)
            {
                $b[$i*2-1]= str_replace("!","",$b[$i*2-1]); // removing !
                $b[$i*2-1]= str_replace("+","",$b[$i*2-1]); // removing +
                $it = array_merge($it,array($b[$i*2-1])); // adding the it marker to the array $it.
                $it = array_unique($it);
                $it = array_values($it);                
            }                   
        }
       foreach ($text as $value)
        {
            $c = explode("+",$value);
            $b = preg_split($pattern,$c[0],null,PREG_SPLIT_DELIM_CAPTURE);
            for($i=1;$i<((count($b)+1)/2);$i++)
            {
                $b[$i*2-1]= str_replace("!","",$b[$i*2-1]);
                $b[$i*2-1]= str_replace("+","",$b[$i*2-1]);
                $itprakriti = array_merge($itprakriti,array($b[$i*2-1])); // adding it to array $itprakriti
                $itprakriti = array_unique($itprakriti);
                $itprakriti = array_values($itprakriti);         
            }                   
        }
       foreach ($text as $value)
        {
            $c = explode("+",$value);
            $pattern = str_replace("[+]","^",$pattern); 
            $b = preg_split($pattern,$c[1],null,PREG_SPLIT_DELIM_CAPTURE); 
            for($i=1;$i<((count($b)+1)/2);$i++)
            {
                $b[$i*2-1]= str_replace("!","",$b[$i*2-1]);
                $b[$i*2-1]= str_replace("+","",$b[$i*2-1]);
                $itpratyaya = array_merge($itpratyaya,array($b[$i*2-1])); // adding it to array $itpratyaya
                $itpratyaya = array_unique($itpratyaya);
                $itpratyaya = array_values($itpratyaya);         
            }                   
        }
}
/* function to find out it markers when they can occur only in the pratayayas. */
function itprat($pattern)
{
    global $text; global $it; global $itprakriti; global $itpratyaya; 
       foreach ($text as $value)
        {
            $c = explode("+",$value);
            $b = preg_split($pattern,$c[1],null,PREG_SPLIT_DELIM_CAPTURE);
            for($i=1;$i<((count($b)+1)/2);$i++)
            {
                $b[$i*2-1]= str_replace("!","",$b[$i*2-1]);
                $b[$i*2-1]= str_replace("+","",$b[$i*2-1]);
                $itpratyaya = array_merge($itpratyaya,array($b[$i*2-1])); // adding it to array $itpratyaya
                $itpratyaya = array_unique($itpratyaya);
                $itpratyaya = array_values($itpratyaya);         
            }                   
        }
}
/* function antya to do antyAdeza */
// $a - array where we want to do antyAdeza. $rep - replacement in place of the last letter.
function antya($a,$rep)
{
    foreach ($a as $value)
    {
        $value1[] = substr($value,0,-1).$rep;
    }
    return $value1;
}
/* adding a specific letter/word at the end of all members of array */
function addlast($a,$b,$merge)
{
    foreach($a as $value)
    {
        $value1[] = $value.$b;
    }
    if ($merge===0)
    {
        $text = $value1;
    }
    if ($merge === 1)
    {
        $text = array_merge($a,$value1);
    }
    $output = flatten($text);
    $output = array_unique($output);
    $output = array_values($output);
return $output;    
}
/* function anubandha to remove it markers */
function anubandha()
{ 
    global $text; global $first; global $pada; global $itprakriti; global $wa1; global $sarva2; global $purva; global $taddhita; global $sarva; global $sup; global $so; global $al; global $hl;
    /* AdirGiTuDavaH (1.3.5) */
    if ((substr($first,0,2) === "Yi" || substr($first,0,2) === "wu" || substr($first,0,2) === "qu") && $pada=== "pratyaya")
    {
        if(substr($first,0,2) === "Yi") { $itprakriti = array_merge($itprakriti,array("Yi")); }
        if(substr($first,0,2) === "wu") { $itprakriti = array_merge($itprakriti,array("wu")); }
        if(substr($first,0,2) === "qu") { $itprakriti = array_merge($itprakriti,array("qu")); }
        echo "<p class = pa >By AdirGiTuDavaH (".link_sutra("1.3.5").") :</p>\n";
        echo "<p class = pa >आदिर्ञिटुडवः (१.३.५) :</p>\n";
        display(0);
        $text = first(array("Yi","wu","qu"),array("","",""),0); // function first removes and replaces specific strings from the words. For details see function.php.
        echo "<p class = sa >tasya lopaH (".link_sutra("1.3.9").") :</p>\n";
        echo "<p class = sa >तस्य लोपः (१.३.९) :</p>\n";
        display(0);
    }
    /* cuTU (1.3.7) */ 
    if (arr($text,'/[+][cCjJYwWqQR]/') )
    {
        echo "<p class = pa >By cuTU (".link_sutra("1.3.7").") :</p>\n";
        echo "<p class = pa >चुटू (१.३.७) :</p>\n";
        display(0);
        $text = two(array("+"),array("c","C","j","J","Y","w","W","q","Q","R"),array("+"),blank(10),0);
        $text = last(array("jas","wA",),array("as","A"),0);
        echo "<p class = sa >tasya lopaH (".link_sutra("1.3.9").") :</p>\n";
        echo "<p class = sa >तस्य लोपः (१.३.९) :</p>\n";
        display(0);
    }
    /* SaH pratyayasya (1.3.6) */
    if (arr($text,'/[+][z]/') && $pada=== "pratyaya")
    {
        it('/([+][z])/');
        echo "<p class = pa >By SaH pratyayasya (".link_sutra("1.3.6").") :</p>\n";
        echo "<p class = pa >षः प्रत्ययस्य (१.३.६) :</p>\n";
        display(0);
        $text = two(array("+"),array("z"),array("+"),array(""),0);
        echo "<p class = sa >By tasya lopaH (".link_sutra("1.3.9").") :</p>\n";
        echo "<p class = sa >तस्य लोपः (१.३.९) :</p>\n";
        display(0);
    }
    /* lazakvataddhite (1.3.8) */
    if (((arr($text,'/[+][lSkKgGN]/'))||$sarva2===1||$purva===1) && $taddhita === 0 )
    {
        it('/([+][lSkKgGN])/');
        echo "<p class = pa >By lazakvataddhite (".link_sutra("1.3.8").") :</p>\n";
        echo "<p class = pa >लशक्वतद्धिते (१.३.८) :</p>\n";
        display(0);
        $text = two(array("+"),array("l","S","k","K","g","G","N"),array("+"),array("","","","","","",""),0);
        echo "<p class = sa >By tasya lopaH (".link_sutra("1.3.9").") :</p>\n";
        echo "<p class = sa >तस्य लोपः (१.३.९) :</p>\n";
        display(0);
    }
    if (arr($text,'/['.flat($ac).'][!]/')  )
    {
        it('/(['.flat($ac).'][!])/');
        echo "<p class = pa >By upadeze'janunAsika it (".link_sutra("1.3.2").") :</p>\n";
        echo "<p class = pa >उपदेशेऽजनुनासिक इत्‌ (१.३.२) :</p>\n";
        display(0);
        $text = two($ac,array("!"),blank(count($ac)),array(""),0);
        echo "<p class = sa >By tasya lopaH (".link_sutra("1.3.9").") :</p>\n";
        echo "<p class = sa >तस्य लोपः (१.३.९) :</p>\n";
        display(0);    
    }

return $text;

}
/* function AdivRddhi to find AdivRddhi */
function AdivRddhi($a)
{
    foreach ($a as $value)
    {
        $b=preg_split('/([aAiIuUfFxXeEoO])/',$value,null,PREG_SPLIT_DELIM_CAPTURE);
        if(in_array($b[1],array("A","E","O")))
        {
            $can[]=1;
        }
        else
        {
            $can[]=0;
        }
    }
    if (in_array(1,$can))
    {
        return TRUE;
    }
    else
    {
        return FALSE;
    }
}
/* function dvigu to find whether ther is dvigu */
function dvigu($a)
{
    if (ends($a,array("eka","ekA","eke","dvi","dvI","dvy","tri","trI","try","catur","catuH","catuz","paYc","zaq","zaw","sapt","azw","nav","daS","Sat"),3) && !ends($a,array("ekaka","dvika","trika","catuzka","paYcaka","zawka","saptaka","azwaka","navaka","daSaka","Sataka"),2))
    {
        return true;
    }
    else
    {
        return false;
    }
}
function removeaccent($text)
{
$text = stripslashes($text);
    $a=array("\\","/","^","-","°","*","(",")","[","]","-","?","॑","॒",);
    $b=array("","","","","","","","","","","","","","");
$text = str_replace($a,$b,$text);
return $text;
}
function removeanusvar($text)
{
    $a=array("a!","A!","i!","I!","u!","U!","f!","F!","x!","X!","e!","o!","E!","O!",);
    $b=array("","","","","","","","","","","","","","");
    $text = str_replace($a,$b,$text);
    return $text;
}
function verbprocess($text)
{
    if(arr(array($text),'/^[Ywq][iu]/'))
    {
        $text=preg_replace('/^([Ywq][iu])/',"",$text);
    }
    if(arr(array($text),'/(^[z])/') && !in_array($text,array("zvazk","zWiv")))
    {
        $text=preg_replace('/^([z])/',"s",$text);
        $text=str_replace(array("sw","sW","sq","sQ","sR",),array("st","sT","sd","sd","sn",),$text);
    }
    if(arr(array($text),'/(^[R])/') )
    {
        $text=preg_replace('/^([R])/',"n",$text);
    }
    if(arr(array($text),'/[iu][r]['.pc('hl').']/') )
    {
        $text=str_replace(array("ir","ur"),array("Ir","Ur"),$text);              
    }
    return $text;
}

/* Process to remove it markers from verb lists and return pure verb lists */
// $text = array to be converted. $num 1 = nakARa is not changed to panchama letter. 2 = nakAra is changed to panchama lettter.
function pureverbs($text,$num)
{
$a=array_map('trim',$text);
$a=array_map('convert1',$a);
$a=array_map('removeaccent',$a);
foreach ($a as $value)
{
    if (preg_match('/[i][!]$/',$value))
    {
        $idit=1;
    }
    else { $idit=0; }
    $value=preg_replace('/(['.pc('hl').']$)/','',$value);
    $value=preg_replace('/([aAiIuUfFxXeoEO][!])/','',$value);
    if ($idit===1)
    {
        $value=preg_replace('/(['.pc('ac').'])(['.pc('hl').']*)$/','$1'.'n'.'$2',$value);
    }
    $value=preg_replace('/(^[Ywq][iu])/','',$value);
    if ($num===2)
    {
        $value=preg_replace('/([n])([kKgGN])/','N$2',$value);        
        $value=preg_replace('/([n])([cCjJY])/','Y$2',$value);        
        $value=preg_replace('/([n])([wWqQR])/','R$2',$value);        
        $value=preg_replace('/([n])([pPbBm])/','m$2',$value);        
    }
    $val1[]=$value;
}
return $val1;    
}
/* function Ti1 to remove the Ti for words and not for whole array $text. */
function Ti1($a)
{   
    $te1 = '/(['.pc('ac').'])(['.pc('hl').']*)$/'; // vowel - unlimited combinations of consonants - '+' combination.
    $te2 = ''; // keep only "+" and remove the first two members.
    $val = preg_replace($te1,$te2,$a); // removing the first two members.
    return $val;
}
/* function mit1 for arrays other than $text */
// $array is the input.
// $pattern is the pattern to search in the word to add mit pratyaya.
// $b is the addition to upadha
// $merge 0 is replacement, 1 is optional.
function mit1($array,$b,$merge)
{   
    $te1 = '/(['.pc('ac').'])(['.pc('hl').']*)([+])/';
    $te2 = '$1'.$b.'$2$3'; // Adding the mit Agama after the last vowel. 'midaco'ntyAtparaH'.
        foreach ($array as $value)
        {
                  $val[] = preg_replace($te1,$te2,$value); // executing mit Agama.
        }        
        if ($merge===0)
        {
            $text = $val;
        }
        if ($merge === 1)
        {
            $text = array_merge($text,$val);
        }        
    $val=array();
    $text = array_unique($text);
    $text = array_values($text);
    return $text;
}

/* Creating a function to fetch data from the verbdata variable */
// The function is almost ready. Now rename the variables so that it can be used.
// $a = the input to take as base, $a1 = ref number of $a, $b = the thing to search. $c 1=whole list, 2=corresponding list. $d=additional field to be displayed, $e=additional condition, $e1= its ref no.
// Ref nos. 0=upadeza, 1=Meaning, 2=verb without anubandhas, 3=verbset, 4=number in dhatupatha, 5=Atmane/parasmai/ubhaya, 6=seT/aniT. 7. verb with accent 8.Set+number 9. Set name
// 0 to 6 are in the array. after that we process.
function scrape($a,$a1,$b,$c,$d,$e,$e1)
{
    global $verbdata;
    for($i=0;$i<count($verbdata);$i++)
    {
        $bomb=explode(':',$verbdata[$i]);
        $bomb[8]=$bomb[3].".".$bomb[4];
        $bomb[9]=str_replace(array("01","02","03","04","05","06","07","08","09","10",),array("BvAdi","adAdi","juhotyAdi","divAdi","svAdi","tudAdi","ruDAdi","tanAdi","kryAdi","curAdi",),$bomb[3]);
        if ($c===1 && $e!=="" && $d!=="")
        {
            if($a===$bomb[$a1] && $e===$bomb[$e1])
            {
                $ret[]=$bomb[$b]." ".$bomb[$d];
            }
        }
        if ($c===1 && $e==="" && $d!=="")
        {
            if($a===$bomb[$a1] )
            {
                $ret[]=$bomb[$b]." ".$bomb[$d];
            }
        }
        if ($c===1 && $e!=="" && $d==="")
        {
            if($a===$bomb[$a1] && $e===$bomb[$e1])
            {
                $ret[]=$bomb[$b];
            }
        }
        if ($c===1 && $e==="" && $d==="")
        {
            if($a===$bomb[$a1] )
            {
                $ret[]=$bomb[$b];
            }
        }
    }
    $ret=array_map('trim',$ret);
    return $ret;
}
/* Creating a function to fetch data from the verbdata variable */
// The function is almost ready. Now rename the variables so that it can be used.
// $a = the input to take as base, $a1 = ref number of $a, $b = the thing to search. $c 1=whole list, 2=corresponding list. $d=additional field to be displayed, $e=additional condition, $e1= its ref no.
// Ref nos. 0=upadeza, 1=Meaning, 2=verb without anubandhas, 3=verbset, 4=number in dhatupatha, 5=Atmane/parasmai/ubhaya, 6=seT/aniT. 7. verb with accent 8.Set+number 9. Set name
// 0 to 6 are in the array. after that we process.
function scrape1($a,$a1,$b,$c)
{
    global $verbdata;
    for($i=0;$i<count($verbdata);$i++)
    {
        $bomb=explode(':',$verbdata[$i]);
        $bomb[8]=$bomb[3].".".$bomb[4];
        $bomb[9]=str_replace(array("01","02","03","04","05","06","07","08","09","10",),array("BvAdi","adAdi","juhotyAdi","divAdi","svAdi","tudAdi","ruDAdi","tanAdi","kryAdi","curAdi",),$bomb[3]);
            if($a===$bomb[$a1] )
            {
                $ret[]=$bomb[$b];
            }
    }
    $ret=array_map('trim',$ret);
    return $ret;
}
// for ajax display in case the verb entered belongs to more than one gaNa.
function verb_meaning_gana_number($text)
{
    global $html;
    $verbaccent=scrape1($text,0,7,1);
    $meaning=scrape1($text,0,1,1);
    $verbset=scrape1($text,0,9,1);
    $number=scrape1($text,0,8,1);
	$upadeza=scrape1($text,0,7,1);
    
            $html .= '<div id="step22">';
    for($i=0;$i<count($verbaccent);$i++)
    {
            $html .= '<input required autocomplete="off" type="radio" value="'.trim($number[$i]).'" name="number" > '.$verbaccent[$i].' - '.convert($meaning[$i]).', '.convert($verbset[$i]).' '.$number[$i];        
    }
            $html .= '</div>';            
return $html;
}
// for display in tiGanta.php
function verb_meaning_gana_number1($text)
{
    $verbaccent=scrape1($text,0,7,1);
    $meaning=scrape1($text,0,1,1);
    $verbset=scrape1($text,0,9,1);
    $number=scrape1($text,0,8,1);
    echo "<p class = st >".$verbaccent[0].' - '.convert($meaning[0]).', '.convert($verbset[0]).' '.$number[0].' '."</p>\n";
    echo "<hr>\n";
}
// for display in tiGanta.php in case the user has chosen the gaNa.
function verb_meaning_gana_number2($text)
{
    global $verbset;
    $verbaccent=scrape($text,0,7,1,"",$verbset,9);
    $meaning=scrape($text,0,1,1,"",$verbset,9);
    $verbset1=scrape($text,0,9,1,"",$verbset,9);
    $number=scrape($text,0,8,1,"",$verbset,9);
    echo "<p class = st >".$verbaccent[0].' - '.convert($meaning[0]).', '.convert($verbset1[0]).' '.$number[0].' '."</p>\n";
    echo "<hr>\n";
}
// for display in tiGanta.php in case the user has chosen the gaNa.
function verb_padafinder($text)
{
    global $verbset;
    $verbpada=scrape($text,0,5,1,"",$verbset,9);
	$verbpada=array_unique($verbpada);
	$verbpada=array_values($verbpada);
    return $verbpada;
}
// Searching for seT / aniT of a verb for use in tiGanta.php in case the user has chosen the gaNa.
function verb_itfinder($text)
{
    global $verbset;
	global $fo; global $number;
    $verb_it=scrape1($number,8,6,1);
	$verb_it=array_unique($verb_it);
	$verb_it=array_values($verb_it);
	return $verb_it;
}
/* function change to change all members of $text based on a regular expression */
function change($a,$b)
{
    global $text;
    foreach ($text as $value)
    {
        $val[]=preg_replace($a,$b,$value);
    }
    return $val;
} 
/* function Adyanta */
// $text - input array, $a - string to be added. $b - 1 for Adi, 2 for anta.
function Adyanta($text,$a,$b)
{
    foreach ($text as $value)
    {
        if ($b===1)
        {
            $val[]=$a.$value;
        }
        if ($b===2)
        {
            $val[]=$value.$a;
        }
    }
    return $val;
}
/* function to replace the tiG pratyayas as per sahajabodha text. */
// Please note that when sUtras are taught to the machine, it will no longer be required. But till then, please bear with it.
function tiGreplace()
{
    global $text;
    global $lakAra;
    global $set;
    global $taG; global $tis; global $tiG; global $so;
    $default_Atmane_1=array("ta","AtAm","anta","TAs","ATAm","Dvam","i","vahi","mahi");  
    $tiG_law_Atmane_1=array("te","Ate","ante","se","ATe","Dve","i","vahe","mahe");
    $tiG_law_parasmai_1=array("ti","tas","anti","si","Tas","Ta","mi","vas","mas");
    $tiG_law_Atmane_1=array("te","ite","ante","se","iTe","Dve","e","vahe","mahe");
    $tiG_low_parasmai_1=array("tu","tAm","antu","tAt","tam","ta","Ani","Ava","Ama"); // there is a blank pratyaya at ma.pu.
    $tiG_low_Atmane_1=array("tAm","itAm","antAm","sva","iTAm","Dvam","E","AvahE","AmahE");
    $tiG_laN_parasmai_1=array("t","tAm","an","s","tam","ta","am","va","ma");
    $tiG_laN_Atmane_1=array("ta","itAm","anta","TAs","iTAm","Dvam","i","vahi","mahi");
    $tiG_viDiliN_parasmai_1=array("it","itAm","iyus","is","itam","ita","iyam","iva","ima");
    $tiG_viDiliN_Atmane_1=array("Ita","IyAtAm","Iran","ITAs","IyATAm","IDvam","Iya","Ivahi","Imahi");
    $tiG_sArvaDAtukalew_parasmai_1=array("ati","atas","anti","asi","aTas","aTa","ami","avas","amas");
    $tiG_sArvaDAtukalew_Atmane_1=array("ate","Ete","ante","ase","ETe","aDve","e","avahe","amahe");
// second set pratyayas
    $default_Atmane_2=array("ta","AtAm","anta","TAs","ATAm","Dvam","i","vahi","mahi");  
    $tiG_law_Atmane_2=array("te","Ate","ante","se","ATe","Dve","i","vahe","mahe");
    $tiG_law_parasmai_2=array("ti","tas","anti","si","Tas","Ta","mi","vas","mas");
    $tiG_law_Atmane_2=array("te","Ate","ate","se","ATe","Dve","e","vahe","mahe");
    $tiG_low_parasmai_2=array("tu","tAm","antu","tAt","tam","ta","Ani","Ava","Ama"); // there is tAt and hi missing.
    $tiG_low_Atmane_2=array("tAm","AtAm","atAm","sva","ATAm","Dvam","E","AvahE","AmahE");
    $tiG_laN_parasmai_2=array("t","tAm","an","s","tam","ta","am","va","ma");
    $tiG_laN_Atmane_2=array("ta","AtAm","ata","TAs","ATAm","Dvam","i","vahi","mahi");
    $tiG_viDiliN_parasmai_2=array("yAt","yAtAm","yus","yAs","yAtam","yAta","yAm","yAva","yAma");
    $tiG_viDiliN_Atmane_2=array("Ita","IyAtAm","Iran","ITAs","IyATAm","IDvam","Iya","Ivahi","Imahi");
    $tiG_sArvaDAtukalew_parasmai_2=array("ati","atas","anti","asi","aTas","aTa","ami","avas","amas");
    $tiG_sArvaDAtukalew_Atmane_2=array("ate","Ete","ante","ase","ETe","aDve","e","avahe","amahe");
   if($set===1)
   {
        if ($lakAra==="low" && in_array($so,$tis))
        {
            $text=pratyayareplace($tiG_law_parasmai_1,$tiG_low_parasmai_1,$text);
        }        
        if ($lakAra==="laN" && in_array($so,$tis))
        {
            $text=pratyayareplace($tiG_law_parasmai_1,$tiG_laN_parasmai_1,$text);
        }        
        if ($lakAra==="viDiliN" && in_array($so,$tis))
        {
            $text=pratyayareplace($tiG_law_parasmai_1,$tiG_viDiliN_parasmai_1,$text);
        }        
        if ($lakAra==="sArvadhAtukalew" && in_array($so,$tis))
        {
            $text=pratyayareplace($tiG_law_parasmai_1,$tiG_sArvaDAtukalew_parasmai_1,$text);
        }        
        if ($lakAra==="law" && in_array($so,$taG))
        {
            $text=pratyayareplace($default_Atmane_1,$tiG_law_Atmane_1,$text);
        }        
        if ($lakAra==="low" && in_array($so,$taG))
        {
            $text=pratyayareplace($default_Atmane_1,$tiG_low_Atmane_1,$text);
        }        
        if ($lakAra==="laN" && in_array($so,$taG))
        {
            $text=pratyayareplace($default_Atmane_1,$tiG_laN_Atmane_1,$text);
        }        
        if ($lakAra==="viDiliN" && in_array($so,$taG))
        {
            $text=pratyayareplace($default_Atmane_1,$tiG_viDiliN_Atmane_1,$text);
        }               
        if ($lakAra==="sArvadhAtukalew" && in_array($so,$taG))
        {
            $text=pratyayareplace($default_Atmane_1,$tiG_sArvaDAtukalew_Atmane_1,$text);
        }               
   }
   if($set===2)
   {
        if ($lakAra==="low" && in_array($so,$tis))
        {
            $text=pratyayareplace($tiG_law_parasmai_2,$tiG_low_parasmai_2,$text);
        }        
        if ($lakAra==="laN" && in_array($so,$tis))
        {
            $text=pratyayareplace($tiG_law_parasmai_2,$tiG_laN_parasmai_2,$text);
        }        
        if ($lakAra==="viDiliN" && in_array($so,$tis))
        {
            $text=pratyayareplace($tiG_law_parasmai_2,$tiG_viDiliN_parasmai_2,$text);
        }        
        if ($lakAra==="sArvadhAtukalew" && in_array($so,$tis))
        {
            $text=pratyayareplace($tiG_law_parasmai_2,$tiG_sArvaDAtukalew_parasmai_2,$text);
        }        
        if ($lakAra==="law" && in_array($so,$taG))
        {
            $text=pratyayareplace($default_Atmane_2,$tiG_law_Atmane_2,$text);
        }        
        if ($lakAra==="low" && in_array($so,$taG))
        {
            $text=pratyayareplace($default_Atmane_2,$tiG_low_Atmane_2,$text);
        }        
        if ($lakAra==="laN" && in_array($so,$taG))
        {
            $text=pratyayareplace($default_Atmane_2,$tiG_laN_Atmane_2,$text);
        }        
        if ($lakAra==="viDiliN" && in_array($so,$taG))
        {
            $text=pratyayareplace($default_Atmane_2,$tiG_viDiliN_Atmane_2,$text);
        }               
        if ($lakAra==="sArvadhAtukalew" && in_array($so,$taG))
        {
            $text=pratyayareplace($default_Atmane_2,$tiG_sArvaDAtukalew_Atmane_2,$text);
        }               
   }
    // patch for optional forms.
   // Patch for sArvadhAtuka leT forms is pending. 
    foreach ($text as $val1)
    {
        if (strpos($val1,"+tAt")!==false && $set===1)
        {
            $val2[]=$val1;
            $val2[]=str_replace("+tAt","",$val1);
        }
        elseif (strpos($val1,"+tAt")!==false && $set===2)
        {
            $val2[]=$val1;
            $val2[]=str_replace("+tAt","+hi",$val1);
        }
        elseif (strpos($val1,"+tu")!==false)
        {
            $val2[]=$val1;
            $val2[]=str_replace("+tu","+tAt",$val1);
        }        
        else
        {
            $val2[]=$val1;
        }
    }
    
    return $val2;
}
/* function pratyayareplace to change pratyayas as per Sahajabodha */
// sub is not specific. For pratyayas, we test whether it is at end or not.
function pratyayareplace($a,$b,$test)
{
    foreach($test as $value)
    {
        for($i=0;$i<count($a);$i++)
        {
            if(substr($value,(-strlen($a[$i])-1))==="+".$a[$i])
            {
                $out[]=substr($value,0,-strlen($a[$i])).$b[$i];
            }
        }
    }
    return $out;
}

/* function pratyayareplace2 (pr2) to change pratyayas as per Sahajabodha */
// sub is not specific. For pratyayas, we test whether it is at end or not.
function pr2($a,$b,$c,$d,$e,$f,$test)
{
	$out=array();
    foreach($test as $value)
    {
        $counter=1;
        for($i=0;$i<count($a);$i++)
        {
            for($j=0;$j<count($b);$j++)
            {
                for($k=0;$k<count($c);$k++)
                {
                    if(substr($value,(-strlen($a[$i].$b[$j].$c[$k])))===$a[$i].$b[$j].$c[$k])
                    {
                        $out[]=substr($value,0,-strlen($a[$i].$b[$j].$c[$k])).$d[$i].$e[$j].$f[$k];
                        $counter=2;
                    }
                }
            }            
        }
        if(in_array($value,$out))
        {
            $test=array_diff($test,array($value));
            $out[]=$value;
        }
        elseif($counter===1)
        {
            $out[]=$value;
        }
        $counter=1;
    }
    return $out;
}

/* Code for converting from IAST and Devanagari to SLP1 for input from tiGanta.html */
function toslp($text)
{
    global $tran;
    // defining IAST letters.
    $iast = array("a","ā","i","ī","u","ū","ṛ","ṝ","ḷ","ḹ","e","ai","o","au","ṃ","ḥ","kh","ch","ṭh","th","ph","gh","jh","ḍh","dh","bh","ṅ","ñ","ṇ","k","c","ṭ","t","p","g","j","ḍ","d","b","n","m","y","r","l","v","s","h","ś","ṣ",);
    // defining SLP1 letters.
    $slp = array("a","A","i","I","u","U","f","F","x","X","e","E", "o","O", "M","H","K", "C",  "W", "T", "P","G", "J",  "Q", "D","B", "N","Y","R","k","c","w","t","p","g","j","q","d","b","n","m","y","r","l","v","s","h","S","z",);
      if (preg_match('/[āĀīĪūŪṛṚṝṜḷḶḹḸṃṂḥḤṭṬḍḌṅṄñÑṇṆśŚṣṢV]/',$text) )// if there is IAST letters in the input, change them to SLP1
    {
        $text = str_replace($iast,$slp,$text);
    }
    if ($tran === "IAST") // if the user says that the input is IAST - change it to SLP1.
    {
         $text = str_replace($iast,$slp,$text);
    }
    /* Code for converting from devanagari - SLP1 */ 
    //This is innocuous. Therefore even running without the selection in dropdown menu. 
    $text = json_encode($text);
    $text = str_replace("\u200d","",$text); // removing whitespace
    $text = str_replace("\u200c","",$text); // removing whitespace
    $text = json_decode($text);
    $text = convert1($text); // converting to SLP1
    
    return $text;
}
function toiast($text)
{
    /* Code for converting from devanagari - SLP1 */ 
    //This is innocuous. Therefore even running without the selection in dropdown menu. 
    $text = json_encode($text);
    $text = str_replace("\u200d","",$text); // removing whitespace
    $text = str_replace("\u200c","",$text); // removing whitespace
    $text = json_decode($text);
    $text = convert1($text); // converting to SLP1
    // defining IAST letters.
    $iast = array("a","ā","i","ī","u","ū","ṛ","ṝ","ḷ","ḹ","e","ai","o","au","ṃ","ḥ","kh","ch","ṭh","th","ph","gh","jh","ḍh","dh","bh","ṅ","ñ","ṇ","k","c","ṭ","t","p","g","j","ḍ","d","b","n","m","y","r","l","v","s","h","ś","ṣ",);
    // defining SLP1 letters.
    $slp = array("a","A","i","I","u","U","f","F","x","X","e","E", "o","O", "M","H","K", "C",  "W", "T", "P","G", "J",  "Q", "D","B", "N","Y","R","k","c","w","t","p","g","j","q","d","b","n","m","y","r","l","v","s","h","S","z",);

	$text = str_replace($slp,$iast,$text);    
    return $text;
}

function Adezapratyaya($text)
{
	global $ksa, $SaHsaH, $sic, $syatAsI, $us;
	foreach ($text as $value)
	{
		if (preg_match('/[iIuUfFxXeEoOhyvrlkKgGN][+][s]/',$value) && ($ksa===1 || $SaHsaH===1 || $sic===1 || $syatAsI===1 || $us!=="")) // patch for ksa
		{
			$val[]=preg_replace('/([iIuUfFxXeEoOhyvrlkKgGN])([+][s])/',"$1+z",$value);			
		}
		elseif (preg_match('/^[s]/',$value) && ends(array($us),prat('ik'),1))
		{
			$val[]=preg_replace('/^([s])/',"z",$value);			
		}
		else
		{
			$parts=explode('+',$value);
			for ($i=1;$i<count($parts);$i++) // leaving the first part and starting from second because it is not pratyaya. Mostly it is prakRti.
			{
				$parts[$i]=preg_replace('/([iIuUfFxXeEoOhyvrlkKgGN])([s])/','$1z',$parts[$i]);
				if (arr($text,'/[s]$/')) // patch for aDAsIs, aDAsisus
				{
					$parts[count($parts)-1]=preg_replace('/([z])$/','s',$parts[count($parts)-1]);
				}
			}
			$val[] = implode('+',$parts);			
		}
	}
	if ($val!==$text)
	{
		$output = $val;
	}
	else
	{
		$output = $text;
	}
    return $output;
}


function ekAcobazo()
{
    global $text; global $verb_without_anubandha;
	foreach ($text as $value)
	{	
		if ( !anekAca($verb_without_anubandha) && ( preg_match('/[bgqd](['.pc('al').']*)[JBGQD][+][sD]/',$value) || preg_match('/[JBGQD][+]$/',$value) ) )
		{
			$value = preg_replace('/([b])(['.pc('al').']*)([JBGQD][+])/',"B$2$3",$value);
			$value = preg_replace('/([g])(['.pc('al').']*)([JBGQD][+])/',"G$2$3",$value);
			$value = preg_replace('/([q])(['.pc('al').']*)([JBGQD][+])/',"Q$2$3",$value);
			$val[] = preg_replace('/([d])(['.pc('al').']*)([JBGQD][+])/',"D$2$3",$value);
		}
		else
		{
				$val[] = $value;
		}
	}
		$text = $val;
		echo "<p class = sa >By ekAco bazo bhaS jhaSantasya sdhvoH (".link_sutra("8.2.37").") :</p>\n";
		echo "<p class = sa >एकाचो बशो भष्‌ झषन्तस्य स्ध्वोः (८.२.३७):</p>\n";
		display(0);  
    return $text;
}
function link_sutra($s) {
 /* $s is a string of form X.Y.Z where X,Y,Z are digits
   Returns a string   
   <a href="http://sanskritdocuments.org/learning_tools/ashtadhyayi/vyakhya/X/X.Y.Z.htm">X.Y.Z</a>
  e.g., if s = "3.4.113", returns
   <a href="http://sanskritdocuments.org/learning_tools/ashtadhyayi/vyakhya/3/3.4.113.htm">3.4.113</a>
 */
 $parts = preg_split('/[.]/',$s);
 if (count($parts) != 3) {  // error checking
  echo "<p>link_sutra error: input = $s</p>\n";
  exit(1);
 }
 $X=$parts[0];
 $Y=$parts[1];
 $Z=$parts[2];
 $ans = "<a href=\"http://sanskritdocuments.org/learning_tools/ashtadhyayi/vyakhya/$X/$X.$Y.$Z.htm\">$X.$Y.$Z</a>";
 return $ans;
}
function caG_halAdi()
{
	global $text;
	foreach ($text as $value)
	{
		$parts=explode('+',$value);
		if (preg_match('/^['.pc('hl').']/',$parts[0]) && preg_match('/[+][a][+]/',$value) && !anekAca($parts[0]) ) // halAdi ekAc
		{
			$parts[0]=$parts[0]."+".$parts[0];
		}
		elseif (preg_match('/^['.pc('hl').']/',$parts[0]) && preg_match('/[+][a][+]/',$value) && anekAca($parts[0]) ) // halAdi anekAc
		{
			$splitvowel=preg_split('/([aAiIuUfFxXeEoO])/',$parts[0],null,PREG_SPLIT_DELIM_CAPTURE);
			$parts[0]=$splitvowel[0].$splitvowel[1]."+".implode('',$splitvowel);
		}
		$val[]=implode('+',$parts);
	}
	$text = $val;
	$text = one(array("Sva+Sva+"),array("Sva+"),0);
	/* caGi (6.1.11) */
	echo "<p class = sa >By caGi (".link_sutra("6.1.11").") and ekAco dve prathamasya (".link_sutra("6.1.1").") :</p>\n"; 
	echo "<p class = sa >चङि (६.१.११) तथा एकाचो द्वे प्रथमस्य (६.१.१) :</p>\n";
	display(0);
return $text;
}
function caG_ajAdi()
{
	global $text; global $caG; global $fo;
	foreach ($text as $value)
	{
		$parts=explode('+',$value);
		$splitvowel=preg_split('/([aAiIuUfFxXeEoO])/',$parts[0],null,PREG_SPLIT_DELIM_CAPTURE);
		if (preg_match('/^['.pc('ac').']/',$parts[0]) && preg_match('/[\+][a]/',$value) && preg_match('/[ndr]['.pc('hl').']/',$splitvowel[count($splitvowel)-3]) ) 
		{
			$splitvowel=preg_split('/([aAiIuUfFxXeEoO])/',$parts[0],null,PREG_SPLIT_DELIM_CAPTURE);
			$rep=substr($splitvowel[count($splitvowel)-3],1,1);
			$parts[0]=implode('',$splitvowel)."+".$rep.$splitvowel[count($splitvowel)-2];
			$nandra=1;
		}		
		elseif (preg_match('/^['.pc('ac').']/',$parts[0]) && preg_match('/[\+][a]/',$value) && preg_match('/[b]['.pc('hl').']/',$splitvowel[count($splitvowel)-3]) ) 
		{
			$splitvowel=preg_split('/([aAiIuUfFxXeEoO])/',$parts[0],null,PREG_SPLIT_DELIM_CAPTURE);
			$rep=substr($splitvowel[count($splitvowel)-3],1,1);
			$parts[0]=implode('',$splitvowel)."+".$rep.$splitvowel[count($splitvowel)-2];
			$bakara=1;
		}		
		elseif (preg_match('/^['.pc('ac').']/',$parts[0]) && preg_match('/[\+][a]/',$value) ) 
		{
			$splitvowel=preg_split('/([aAiIuUfFxXeEoO])/',$parts[0],null,PREG_SPLIT_DELIM_CAPTURE);
			$parts[0]=implode('',$splitvowel)."+".$splitvowel[count($splitvowel)-3].$splitvowel[count($splitvowel)-2];
		}
		$val[]=implode('+',$parts);
	}
	$text = $val;
	if ($nandra===1)
	{
		/* na ndrAH saMyogAdayaH (6.1.3) */
		echo "<p class = sa >By na ndrAH saMyogAdayaH (".link_sutra("6.1.3").") :</p>\n"; 
		echo "<p class = sa >न न्द्राः संयोगादयः (६.१.३) :</p>\n";
		display(0);				
	}
	elseif ($bakara===1)
	{
		/* bakArasyApyayaM pratiSedhaH (vA) */
		echo "<p class = sa >By bakArasyApyayaM pratiSedhaH (vA) :</p>\n"; 
		echo "<p class = sa >बकारस्याप्ययं प्रतिषेधः (वा) :</p>\n";
		display(0);				
	}
	else
	{
		/* caGi (6.1.11) */
		echo "<p class = sa >By caGi (".link_sutra("6.1.11").") and ajAderdvitIyasya (".link_sutra("6.1.2").") :</p>\n"; 
		echo "<p class = sa >चङि (६.१.११) तथा अजादेर्द्वितीयस्य (६.१.२) :</p>\n";
		display(0);		
	}
	foreach ($text as $value)
	{
		$parts=explode('+',$value);
		$splitvowel=preg_split('/([aAiIuUfFxXeEoO])/',$parts[0],null,PREG_SPLIT_DELIM_CAPTURE);
		$split2=preg_split('/(['.pc('hl').'])/',$splitvowel[0],null,PREG_SPLIT_DELIM_CAPTURE);
		/* urat (7.4.66) */
		if (in_array($splitvowel[1],array("f","F")) && !preg_match('/[Szs]['.pc('Ky').'][fF]/',$parts[0]) )
		{
			$parts[0]=str_replace("f","ar",$parts[0]);
			$urat=1;
		}
		$parts=explode('+',$value);
		/* zarpUrvAH khayaH (7.4.61) */
		if ( preg_match('/[Szs]['.pc('Ky').']/',$parts[0])  ) // zarpUrvA khayaH
		{
			$splitvowel=preg_split('/([aAiIuUfFxXeEoO])/',$parts[0],null,PREG_SPLIT_DELIM_CAPTURE);
			$split2=preg_split('/(['.pc('hl').'])/',$splitvowel[2],null,PREG_SPLIT_DELIM_CAPTURE);
			$parts[0]=$splitvowel[1].$split2[3].$splitvowel[3];
			$zar=1;
		}
		/* halAdiH zeSaH (7.4.60) */
		elseif ( preg_match('/['.pc('hl').']['.pc('hl').']/',$parts[0]) && $bakara!==1 && $nandra!==1 ) // halAdiH zeSaH
		{
			$splitvowel=preg_split('/([aAiIuUfFxXeEoO])/',$parts[0],null,PREG_SPLIT_DELIM_CAPTURE);
				$split2=preg_split('/(['.pc('hl').'])/',$splitvowel[2],null,PREG_SPLIT_DELIM_CAPTURE);
			$parts[0]=$splitvowel[1].$split2[1].$splitvowel[3];
			$halAdi=1;
		}
		$val5[]=implode('+',$parts);
	}
	$text = $val5;
	/* halAdiH zeSaH (7.4.60) */
	if ($halAdi===1)
	{
		echo "<p class = sa >By halAdiH zeSaH (".link_sutra("7.4.60").") :</p>\n"; 
		echo "<p class = sa >हलादिः शेषः (७.४.६०) :</p>\n";
		display(0);
	}
	/* zarpUrvAH khayaH (7.4.61) */
	if ($zar===1)
	{
		echo "<p class = sa >By zarpUrvAH khayaH (".link_sutra("7.4.61").") :</p>\n"; 
		echo "<p class = sa >शर्पूर्वाः खयः (७.४.६१) :</p>\n";
		display(0);
	}
	/* urat (7.4.66) */
	if ($urat===1)
	{
		echo "<p class = sa >By urat (".link_sutra("7.4.66").") and uraNraparaH (".link_sutra("1.1.51").") :</p>\n"; 
		echo "<p class = sa >उरत्‌ (७.४.६६) तथा उरण्रपरः (१.१.५१) 1:</p>\n";
		display(0);	
	}
	$splitvowel=preg_split('/([aAiIuUfFxXeEoO])/',$parts[0],null,PREG_SPLIT_DELIM_CAPTURE);
	$split2=preg_split('/(['.pc('hl').'])/',$splitvowel[0],null,PREG_SPLIT_DELIM_CAPTURE);
	$parts=explode('+',$value);
		/* hrasvaH (7.4.59) */
		if (in_array($splitvowel[1],array("A","I","U","F","X","e","o","E","O")) && !preg_match('/^['.pc('ac').']/',$parts[0]) )
		{
			foreach ($text as $value)
			{
				if (preg_match('/[\+][a]/',$value) && $caG===1)
				{
					$parts=explode('+',$value);
					$parts[0]=str_replace(array("A","I","U","F","X","e","o","E","O"),array("a","i","u","f","x","i","u","i","u"),$parts[0]);
					$val1[] = implode('+',$parts);
				}
				else
				{
					$val1[] = $value;
				}
			}
			$text=$val1;
			echo "<p class = sa >By hrasvaH (".link_sutra("7.4.59").") :</p>\n"; 
			echo "<p class = sa >ह्रस्वः (७.४.५९) :</p>\n";
			display(0);
		}
		/* kuhozcuH (7.4.62) */
		if (preg_match('/[kKgGNh]/',$parts[0]) ) 
		{
			foreach ($text as $value)
			{
				if (preg_match('/[\+][a]/',$value) && $caG===1)
				{
					$parts=explode('+',$value);
					$parts[0]=str_replace(array("k","K","g","G","N","h"),array("c","C","j","J","Y","j"),$parts[0]);
					$val2[] = implode('+',$parts);
				}
				else
				{
					$val2[] = $value;
				}
			}
			$text=$val2;
			echo "<p class = sa >By kuhozcuH (".link_sutra("7.4.62").") :</p>\n"; 
			echo "<p class = sa >कुहोश्चुः (७.४.६२) :</p>\n";
			display(0); 
		}
		/* abhyAse carca (8.4.54) */
		if (preg_match('/[JBGQDKPCWT]/',$parts[0]) )
		{
			foreach ($text as $value)
			{
				if (preg_match('/[\+][a]/',$value) && $caG===1)
				{
					$parts=explode('+',$value);
					$parts[0]=str_replace(array("J","B","G","Q","D","K","P","C","W","T"),array("j","b","g","q","d","k","p","c","w","t"),$parts[0]);
					$val3[] = implode('+',$parts);
				}
				else
				{
					$val3[]=$value;
				}
			}
			$text=$val3;
			echo "<p class = sa >By abhyAse carca (".link_sutra("8.4.54").") :</p>\n"; 
			echo "<p class = sa >अभ्यासे चर्चः (८.४.५४) :</p>\n";
			display(0);            
		}
		/* abhyAsAcca (7.3.85) */
		if (in_array($fo,array("hana!")))
		{
			foreach ($text as $value)
			{
				if (preg_match('/[\+][a]/',$value) && $caG===1)
				{					
					$parts=explode('+',$value);
					$parts[1]=str_replace(array("h"),array("G"),$parts[1]);
					$val4[] = implode('+',$parts);
				}
				else
				{
					$val4[] = $value;
				}
			}
			$text = $val4;
			echo "<p class = sa >By abhyAsAcca (".link_sutra("7.3.85").") :</p>\n"; 
			echo "<p class = sa >अभ्यासाच्च (७.३.८५) :</p>\n";
			display(0);            		
	}
return $text;
}
function liT_ajAdi()
{
	global $text, $caG, $lakAra, $verb_without_anubandha; 
	/* ajAderdvitIyasya (6.1.2) */
	if (anekAca($verb_without_anubandha) )
	{
		foreach ($text as $value)
		{
			if ( (preg_match('/[\+][a]/',$value) && $caG===1) || $lakAra==="liw")
			{
				$parts=explode('+',$value);
				$splitvowel=preg_split('/([aAiIuUfFxXeEoO])/',$parts[0],null,PREG_SPLIT_DELIM_CAPTURE);
				$split2=preg_split('/(['.pc('hl').'])/',$splitvowel[2],null,PREG_SPLIT_DELIM_CAPTURE);
				$parts[0]=$parts[0].$split2[3].$splitvowel[3];
				$parts[0]=str_replace("UrRuRu","UrRunu",$parts[0]);
				$val4[] = implode('+',$parts);
			}
			else
			{
				$val4[] = $value;
			}
		}
		$text=$val4;
		echo "<p class = sa >By liTi dhAtoranabhyAsasya (".link_sutra("6.1.8").") and ajAderdvitIyasya (".link_sutra("6.1.2").") :</p>\n"; 
		echo "<p class = sa >लिटि धातोरनभ्यासस्य (६.१.८) तथा अजादेर्द्वितीयस्य (६.१.२) :</p>\n";
		display(0); 				
	}
	else
	{
		foreach ($text as $value)
		{
			$parts=explode('+',$value);
			$splitvowel=preg_split('/([aAiIuUfFxXeEoO])/',$parts[0],null,PREG_SPLIT_DELIM_CAPTURE);
			if (preg_match('/^['.pc('ac').']/',$parts[0]) ) 
			{
				$parts[0]=$parts[0]."+".$parts[0];
			}
			$val[]=implode('+',$parts);
		}
		$text = $val;
		/* liTi dhAtoranabhyAsasya (6.1.8) */
		echo "<p class = sa >By liTi dhAtoranabhyAsasya (".link_sutra("6.1.8").") and ekAco dve prathamasya (".link_sutra("6.1.1").") :</p>\n"; 
		echo "<p class = sa >लिटि धातोरनभ्यासस्य (६.१.८) तथा एकाचो द्वे प्रथमस्य (६.१.१) :</p>\n";
		display(0);		
	}
	foreach ($text as $value)
	{
		$parts=explode('+',$value);
		$splitvowel=preg_split('/([aAiIuUfFxXeEoO])/',$parts[0],null,PREG_SPLIT_DELIM_CAPTURE);
		$split2=preg_split('/(['.pc('hl').'])/',$splitvowel[0],null,PREG_SPLIT_DELIM_CAPTURE);
		/* liTyabhyAsasyobhayeSAm (6.1.17) */
		if (in_array($parts[0],array("vac","svap","yaj","vap","vah","vas","vad","ve","hve","Svi","vye","grah","jyA","vay","vyaD","vaS","vyac","vraSc","pracC","Brasj",)) )
		{
			$parts[0]=str_replace(array("vac","svap","yaj","vap","vah","vas","vad","ve","hve","Svi","vye","grah","jyA","vay","vyaD","vaS","vyac","vraSc","pracC","Brasj",),array("uc","sup","ij","up","uh","us","ud","u","hu","Su","vi","gfh","ji","uy","viD","uS","vic","vfSc","pfcC","Bfsj",),$parts[0]);
			$litya=1;
		}
			$value=implode("+",$parts);
		$parts=explode('+',$value);
		/* halAdiH zeSaH (7.4.60) */
			$splitvowel=preg_split('/([aAiIuUfFxXeEoO])/',$parts[0],null,PREG_SPLIT_DELIM_CAPTURE);
				$split2=preg_split('/(['.pc('hl').'])/',$splitvowel[2],null,PREG_SPLIT_DELIM_CAPTURE);
			if ($parts[0]!=="UrRunu"){$parts[0]=$splitvowel[1];	$halAdi=1;}
		$val5[]=implode('+',$parts);
	}
	$text = $val5;
	if ($litya===1)
	{
		echo "<p class = sa >By liTyabhyAsasyobhayeSAm (".link_sutra("6.1.17").") and samprasAraNAcca (".link_sutra("6.1.104").") :</p>\n"; 
		echo "<p class = sa >लिट्यभ्यासस्योभयेषाम्‌ (६.१.१७) तथा सम्प्रसारणाच्च (६.१.१०४) 1:</p>\n";
		display(0);
	}
	/* halAdiH zeSaH (7.4.60) */
	if ($halAdi===1)
	{
		echo "<p class = sa >By halAdiH zeSaH (".link_sutra("7.4.60").") :</p>\n"; 
		echo "<p class = sa >हलादिः शेषः (७.४.६०) :</p>\n";
		display(0);
	}
	/* zarpUrvAH khayaH (7.4.61) */
	if ($zar===1)
	{
		echo "<p class = sa >By zarpUrvAH khayaH (".link_sutra("7.4.61").") :</p>\n"; 
		echo "<p class = sa >शर्पूर्वाः खयः (७.४.६१) :</p>\n";
		display(0);
	}
		/* urat (7.4.66) */
		if (in_array($splitvowel[1],array("f","F"))  && !preg_match('/[Szs]['.pc('Ky').'][fF]/',$parts[0]))
		{
			$parts[0]="ar";
			$text = array(implode('+',$parts)); 
			$value = implode('+',$parts);
			echo "<p class = sa >By urat (".link_sutra("7.4.66").") and uraNraparaH (".link_sutra("1.1.51").") :</p>\n"; 
			echo "<p class = sa >उरत्‌ (७.४.६६) तथा उरण्रपरः (१.१.५१) 2:</p>\n";
			display(0);
		}
		$parts=explode('+',$value);
	$splitvowel=preg_split('/([aAiIuUfFxXeEoO])/',$parts[0],null,PREG_SPLIT_DELIM_CAPTURE);
	$split2=preg_split('/(['.pc('hl').'])/',$splitvowel[0],null,PREG_SPLIT_DELIM_CAPTURE);
		/* ata AdeH (7.4.70) */
		if (in_array($splitvowel[1],array("a"))  )
		{
			foreach ($text as $value)
			{
				if ( (preg_match('/[\+][a]/',$value) && $caG===1) || $lakAra==="liw")
				{
					$parts=explode('+',$value);
					$parts[0]="A";
					$val1[] = implode('+',$parts);
				}
				else
				{
					$val1[] = $value;
				}
			}
			$text=$val1;
			echo "<p class = sa >By ata AdeH (".link_sutra("7.4.70").") :</p>\n"; 
			echo "<p class = sa >अत आदेः (७.४.७०) :</p>\n";
			display(0);
		}
		/* tasmAnnuDdvihalaH (7.4.71) */
		if (preg_match('/['.pc('hl').']['.pc('hl').']/',$parts[1]) || preg_match('/[f]/',$parts[1])) 
		{
			foreach ($text as $value)
			{
				if ( (preg_match('/[+][a]/',$value) && $caG===1) || $lakAra==="liw")
				{
					$parts=explode('+',$value);
					$parts=explode('+',$value);
					$parts[1]="n".$parts[1];
					$val2[] = implode('+',$parts);
				}
				else
				{
					$val2[] = $value;
				}
			}
			$text=$val2;
			if (preg_match('/[f]/',$parts[1]))
			{
			echo "<p class = sa >By tasmAnnuDdvihalaH (".link_sutra("7.4.71").") and nuDvidhau RkAraikadezo repho haltvena gRhyate (vA) :</p>\n"; 
			echo "<p class = sa >तस्मान्नुड्द्विहलः (७.४.७१) तथा नुड्विधौ ऋकारैकदेशो रेफो हल्त्वेन गृह्यते (वा) :</p>\n";
			display(0); 				
			}
			else
			{
			echo "<p class = sa >By tasmAnnuDdvihalaH (".link_sutra("7.4.71").") :</p>\n"; 
			echo "<p class = sa >तस्मान्नुड्द्विहलः (७.४.७१) :</p>\n";
			display(0); 				
			}
		}
		/* aznotezca (7.4.72) */
		if ($parts[1]==="aS") 
		{
			foreach ($text as $value)
			{
				if ( (preg_match('/[\+][a]/',$value) && $caG===1) || $lakAra==="liw")
				{
					$parts=explode('+',$value);
					$parts[1]="n".$parts[1];
					$val3[] = implode('+',$parts);
				}
				else
				{
					$val3[] = $value;
				}
			}
			$text=$val3;
			echo "<p class = sa >By aznotezca (".link_sutra("7.4.72").") :</p>\n"; 
			echo "<p class = sa >अश्नोतेश्च (७.४.७२) :</p>\n";
			display(0); 				
		}
return $text;
}

function liT_halAdi()
{
	global $text;
	foreach ($text as $value)
	{
		$parts=explode('+',$value);
		if (preg_match('/^['.pc('hl').']/',$parts[0]) && !anekAca($parts[0]) ) // halAdi ekAc
		{
			$parts[0]=$parts[0]."+".$parts[0];
		}
		elseif (preg_match('/^['.pc('hl').']/',$parts[0]) && anekAca($parts[0]) ) // halAdi anekAc
		{
			$splitvowel=preg_split('/([aAiIuUfFxXeEoO])/',$parts[0],null,PREG_SPLIT_DELIM_CAPTURE);
			$parts[0]=$splitvowel[0].$splitvowel[1]."+".implode('',$splitvowel);
		}
		$val[]=implode('+',$parts);
	}
	$text = $val;
	$text = one(array("Sva+Sva+"),array("Sva+"),0);
	/* liTi dhAtoranabhyAsasya (6.1.8) */
	echo "<p class = sa >By liTi dhAtoranabhyAsasya (".link_sutra("6.1.8").") and ekAco dve prathamasya (".link_sutra("6.1.1").") :</p>\n"; 
	echo "<p class = sa >लिटि धातोरनभ्यासस्य (६.१.८) तथा एकाचो द्वे प्रथमस्य (६.१.१) :</p>\n";
	display(0);
return $text;
}

function abhyAsa_halAdi()
{
	global $text;	global $caG; global $lakAra; global $fo;
	foreach ($text as $value)
	{
		$parts=explode('+',$value);
		$splitvowel=preg_split('/([aAiIuUfFxXeEoO])/',$parts[0],null,PREG_SPLIT_DELIM_CAPTURE);
		$split2=preg_split('/(['.pc('hl').'])/',$splitvowel[0],null,PREG_SPLIT_DELIM_CAPTURE);
		/* liTyabhyAsasyobhayeSAm (6.1.17) */
		if (in_array($parts[0],array("vac","svap","yaj","vap","vah","vas","vad","ve","hve","Svi","vye","grah","jyA","vay","vyaD","vaS","vyac","vraSc","pracC","Brasj",)) )
		{
			$parts[0]=str_replace(array("vac","svap","yaj","vap","vah","vas","vad","ve","hve","vye","grah","jyA","vay","vyaD","vaS","vyac","vraSc","pracC","Brasj",),array("uc","sup","ij","up","uh","us","ud","u","hu","vi","gfh","ji","uy","viD","uS","vic","vfSc","pfcC","Bfsj",),$parts[0]);
			$litya=1;
		}
		if (in_array($parts[0],array("vyaT")))
		{
			$parts[0]="viT";
			$vyatha=1;
		}
		if (in_array($parts[0],array("dyut","svap"))) // pending to code for svap.
		{
			$parts[0]=str_replace(array("dyut","svap"),array("dit","sup"),$parts[0]);
			$dyu=1;
		}
			$val6[] = implode('+',$parts);
	}
	$text=$val6;
	if ($litya===1)
	{
			echo "<p class = sa >By liTyabhyAsasyobhayeSAm (".link_sutra("6.1.17").") and samprasAraNAcca (".link_sutra("6.1.104").") :</p>\n"; 
			echo "<p class = sa >लिट्यभ्यासस्योभयेषाम्‌ (६.१.१७) तथा सम्प्रसारणाच्च (६.१.१०४) 2:</p>\n";
			display(0);		
	}
	if ($vyatha===1)
	{
			echo "<p class = sa >By vyatho liTi (".link_sutra("7.4.68").") and samprasAraNAcca (".link_sutra("6.1.104").") :</p>\n"; 
			echo "<p class = sa >व्यथो लिटि (७.४.६८) तथा सम्प्रसारणाच्च (६.१.१०४) :</p>\n";
			display(0);		
	}
	if ($dyut===1)
	{
			echo "<p class = sa >By dyutisvApyoH samprasAraNam (".link_sutra("7.4.67").") and samprasAraNAcca (".link_sutra("6.1.104").") :</p>\n"; 
			echo "<p class = sa >द्युतिस्वाप्योः सम्प्रसारणम्‌ (७.४.६७) तथा सम्प्रसारणाच्च (६.१.१०४) :</p>\n";
			display(0);		
	}
	foreach ($text as $value)
	{
		$parts=explode('+',$value);
		$splitvowel=preg_split('/([aAiIuUfFxXeEoO])/',$parts[0],null,PREG_SPLIT_DELIM_CAPTURE);
		$split2=preg_split('/(['.pc('hl').'])/',$splitvowel[0],null,PREG_SPLIT_DELIM_CAPTURE);
		/* urat (7.4.66) */
		if (in_array($splitvowel[1],array("f","F"))  && !preg_match('/[Szs]['.pc('Ky').'][fF]/',$parts[0]))
		{
			$parts[0]=str_replace(array("f","F"),array("ar","ar"),$parts[0]);
			$urat=1;
			$splitvowel=preg_split('/([a])/',$parts[0],null,PREG_SPLIT_DELIM_CAPTURE);
			$split2=preg_split('/(['.pc('hl').'])/',$splitvowel[0],null,PREG_SPLIT_DELIM_CAPTURE);
			$parts[0]=$split2[1].$splitvowel[1];
			$halAdi=1;
			$value = implode('+',$parts);
		}
		$parts=explode('+',$value);
		/* zarpUrvAH khayaH (7.4.61) */
		if (preg_match('/^[Szs]['.pc('Ky').']/',$parts[0])  ) // zarpUrvA khayaH
		{
			$splitvowel=preg_split('/([aAiIuUfFxXeEoO])/',$parts[0],null,PREG_SPLIT_DELIM_CAPTURE);
			$split2=preg_split('/(['.pc('hl').'])/',$splitvowel[0],null,PREG_SPLIT_DELIM_CAPTURE);
			$parts[0]=$split2[3].$splitvowel[1];
			$zar=1;
		}
		/* halAdiH zeSaH (7.4.60) */
		else
		{
			$splitvowel=preg_split('/([aAiIuUfFxXeEoO])/',$parts[0],null,PREG_SPLIT_DELIM_CAPTURE);
			$split2=preg_split('/(['.pc('hl').'])/',$splitvowel[0],null,PREG_SPLIT_DELIM_CAPTURE);
			$parts[0]=$split2[1].$splitvowel[1];
			$halAdi=1;
		}
		$val[]=implode('+',$parts);
	}
	$text = $val;
	/* urat (7.4.66) */
	if ($urat===1)
	{
		echo "<p class = sa >By urat (".link_sutra("7.4.66").") and uraNraparaH (".link_sutra("1.1.51").") :</p>\n"; 
		echo "<p class = sa >उरत्‌ (७.४.६६) तथा उरण्रपरः (१.१.५१) 1:</p>\n";
		display(0);	
	}

	/* halAdiH zeSaH (7.4.60) */
	if ($halAdi===1)
	{
		echo "<p class = sa >By halAdiH zeSaH (".link_sutra("7.4.60").") :</p>\n"; 
		echo "<p class = sa >हलादिः शेषः (७.४.६०) :</p>\n";
		display(0);
	}
	/* zarpUrvAH khayaH (7.4.61) */
	if ($zar===1)
	{
		echo "<p class = sa >By zarpUrvAH khayaH (".link_sutra("7.4.61").") :</p>\n"; 
		echo "<p class = sa >शर्पूर्वाः खयः (७.४.६१) :</p>\n";
		display(0);
	}
		/* hrasvaH (7.4.59) */
		if (in_array($splitvowel[1],array("A","I","U","F","X","e","o","E","O")) && !preg_match('/^['.pc('ac').']/',$parts[0]) )
		{
			foreach ($text as $value)
			{
				$parts=explode('+',$value);
				$splitvowel=preg_split('/([aAiIuUfFxXeEoO])/',$parts[0],null,PREG_SPLIT_DELIM_CAPTURE);
				$split2=preg_split('/(['.pc('hl').'])/',$splitvowel[0],null,PREG_SPLIT_DELIM_CAPTURE);
				if ( ((preg_match('/[\+][a]/',$value) && $caG===1) || $lakAra==="liw") && in_array($splitvowel[1],array("A","I","U","F","X","e","o","E","O")))
				{
					$parts=explode('+',$value);
					$parts[0]=str_replace(array("A","I","U","F","X","e","o","E","O"),array("a","i","u","f","x","i","u","i","u"),$parts[0]);
					$val1[] = implode('+',$parts);
				}
				else
				{
					$val1[] = $value;
				}
			}
			$text=$val1;
			echo "<p class = sa >By hrasvaH (".link_sutra("7.4.59").") :</p>\n"; 
			echo "<p class = sa >ह्रस्वः (७.४.५९) :</p>\n";
			display(0);
		}
		/* kuhozcuH (7.4.62) */
		if (preg_match('/[kKgGNh]/',$splitvowel[0]) ) 
		{
			foreach ($text as $value)
			{
				if ((preg_match('/[\+][a]/',$value) && $caG===1) || $lakAra==="liw")
				{
					$parts=explode('+',$value);
					$parts[0]=str_replace(array("k","K","g","G","N","h"),array("c","C","j","J","Y","j"),$parts[0]);
					$val2[] = implode('+',$parts);
				}
				else
				{
					$val2[] = $value;
				}
			}
			$text=$val2;
			echo "<p class = sa >By kuhozcuH (".link_sutra("7.4.62").") :</p>\n"; 
			echo "<p class = sa >कुहोश्चुः (७.४.६२) :</p>\n";
			display(0); 
		}
		/* abhyAse carca (8.4.54) */
		if (preg_match('/[JBGQDKPCWT]/',$splitvowel[0]) )
		{
			foreach ($text as $value)
			{
				if ((preg_match('/[\+][a]/',$value) && $caG===1) || $lakAra==="liw")
				{
					$parts=explode('+',$value);
					$parts[0]=str_replace(array("J","B","G","Q","D","K","P","C","W","T"),array("j","b","g","q","d","k","p","c","w","t"),$parts[0]);
					$val3[] = implode('+',$parts);
				}
				else
				{
					$val3[]=$value;
				}
			}
			$text=$val3;
			echo "<p class = sa >By abhyAse carca (".link_sutra("8.4.54").") :</p>\n"; 
			echo "<p class = sa >अभ्यासे चर्चः (८.४.५४) :</p>\n";
			display(0);            
		}
		/* abhyAsAcca (7.3.85) */
		if (in_array($fo,array("hana!")))
		{
			foreach ($text as $value)
			{
				if ((preg_match('/[\+][a]/',$value) && $caG===1) || $lakAra==="liw")
				{					
					$parts=explode('+',$value);
					print_r($parts);
					$parts[1]=str_replace(array("h"),array("G"),$parts[1]);
					$val4[] = implode('+',$parts);
				}
				else
				{
					$val4[] = $value;
				}
			}
			$text=$val4;
			echo "<p class = sa >By abhyAsAcca (".link_sutra("7.3.85").") :</p>\n"; 
			echo "<p class = sa >अभ्यासाच्च (७.३.८५) :</p>\n";
			display(0);            
	}
return $text;
}

function san()
{
	global $text, $atolopa;
	foreach ($text as $value)
	{
		$parts=explode('+',$value);
		if (preg_match('/[a]$/',$parts[0]) && !preg_match('/^['.pc('ac').']['.pc('hl').']['.pc('hl').']/',$parts[1]) && !preg_match('/^[AIUFXeoEO]/',$parts[1]) && $atolopa!==1 && !in_array($parts[1],array("smar","dar","tvar","praT","mrad","star","spaS")) )
		{
			$parts[0]=preg_replace('/([a])$/','i',$parts[0]);
			$sanyata=1;
		}
		$val1[]=implode('+',$parts);
	}
	$text = $val1;
	/* atsmRdRtvaraprathamradastRRspazAm (7.4.95) */	
	if (in_array($parts[1],array("smar","dar","tvar","praT","mrad","star","spaS")))
	{
		echo "<p class = sa >By atsmRdRtvaraprathamradastRRspazAm (".link_sutra("7.4.95").") :</p>\n"; 
		echo "<p class = sa >अत्स्मृदृत्वरप्रथम्रदस्तॄस्पशाम्‌ (७.४.९५) :</p>\n";
		display(0);				
	}
	/* vibhASA veSTiceSTyoH (7.4.96) */	
	elseif (in_array($parts[1],array("vezw","cezw")))
	{
		$text = one(array("vi+vezw","ci+cezw"),array("va+vezw","ca+cezw"),1);
		echo "<p class = sa >By vibhASA veSTiceSTyoH (".link_sutra("7.4.96").") :</p>\n"; 
		echo "<p class = sa >विभाषा वेष्टिचेष्ट्योः (७.४.९६) :</p>\n";
		display(0);				
	}	
	/* I ca gaNaH (7.4.97) */	
	elseif (in_array($parts[1],array("gaR")))
	{
		$text = one(array("ja+gaR"),array("jI+gaR"),0);
		echo "<p class = sa >By I ca gaNaH (".link_sutra("7.4.97").") :</p>\n"; 
		echo "<p class = sa >ई च गणः (७.४.९७) :</p>\n";
		display(0);
	}
	/* sanyataH (7.4.79) */
	elseif ($sanyata===1)
	{
		echo "<p class = sa >By sanyataH (".link_sutra("7.4.49").") :</p>\n"; 
		echo "<p class = sa >सन्यतः (७.४.४९) :</p>\n";
		display(0);		
	}

	foreach ($text as $value)
	{
		$parts=explode('+',$value);
		if (preg_match('/[u]$/',$parts[0]) && preg_match('/^[pPbBmyrlvj][a]/',$parts[1]) )
		{
			$parts[0]=preg_replace('/([u])$/','i',$parts[0]);
			$ohpuyan=1;
		}
		$val3[]=implode('+',$parts);
	}
	$text = $val3;
	/* oH puyaNjyapare (7.4.80) */
	if ($ohpuyan===1)
	{
		echo "<p class = sa >By oH puyaNjyapare (".link_sutra("7.4.80").") :</p>\n"; 
		echo "<p class = sa >ओः पुयण्ज्यपरे (७.४.८०) :</p>\n";
		display(0);		
	}

	foreach ($text as $value)
	{
		$parts=explode('+',$value);
		$val4[]=implode('+',$parts);
		if (preg_match('/[u]$/',$parts[0]) && in_array($parts[1],array("srav","Srav","drav","prav","plav","cyav",)) )
		{
			$parts[0]=preg_replace('/([u])$/','i',$parts[0]);
			$sravati=1;
			$val4[]=implode('+',$parts);
		}
	}
	$text = $val4;
	/* sravatizRNotidravatipravatiplavaticyavatInAM vA (7.4.81) */
	if ($sravati===1)
	{
		echo "<p class = sa >By sravatizRNotidravatipravatiplavaticyavatInAM vA (".link_sutra("7.4.81").") :</p>\n"; 
		echo "<p class = sa >स्रवतिशृणोतिद्रवतिप्रवतिप्लवतिच्यवतीनां वा (७.४.८१) :</p>\n";
		display(0);
	}

	foreach ($text as $value)
	{
		$parts=explode('+',$value);
		if (preg_match('/[aiufx]$/',$parts[0]) && !preg_match('/^['.pc('ac').']['.pc('hl').']['.pc('hl').']/',$parts[1]) && !preg_match('/^['.pc('hl').']['.pc('hl').']/',$parts[1]) && !preg_match('/^[AIUFXeoEO]/',$parts[1]) && !preg_match('/^['.pc('hl').'][AIUFXeoEO]/',$parts[1]) && $atolopa!==1 && !in_array($parts[1],array("smar","dar","tvar","praT","mrad","star","spaS")) )
		{
			$parts[0]=preg_replace('/([a])$/','A',$parts[0]);
			$parts[0]=preg_replace('/([i])$/','I',$parts[0]);
			$parts[0]=preg_replace('/([u])$/','U',$parts[0]);
			$parts[0]=preg_replace('/([f])$/','F',$parts[0]);
			$parts[0]=preg_replace('/([x])$/','X',$parts[0]);
			$dirgholagho=1;
		}
		$val2[]=implode('+',$parts);
	}
	$text = $val2;
	/* dIrgho laghoH (7.4.94) */
	if ($dirgholagho===1)
	{
		echo "<p class = sa >By dIrgho laghoH (".link_sutra("7.4.94").") :</p>\n"; 
		echo "<p class = sa >दीर्घो लघोः (७.४.९४) :</p>\n";
		display(0);		
	}
}

function firstmember($a,$b)
{
	foreach ($a as $value)
	{
		$parts=explode('[\+]',$value);
		if (preg_match($b,$parts[0]))
		{
			$can[]=1;
			break;
		}
		else
		{
			$cal[]=0;
		}
	}
	if (in_array(1,$can))
	{
		return true;
	}
	else
	{
		return false;
	}
}

function zlu()
{
	global $text, $juhotyAdi, $tiG;
	// taking replacements directly from sahajabodha p 329. Only hu's process is shown. For everything else there is direct substitution.
	$juhotyAdireplace=array("if","kiki","kikit","gigA","GiGf","jajan","tutur","dadA","daDan","daDA","diDiz","nenij","pipf","pipF","baBas","biBI","biBfMS","mimA","vevij","veviz","sisf","hihA","hahA","huhu","hihf","jihrI");
	if(sub(array("quBfY","mAN","o!hAN"),array("+"),blank(0),0))
	{
		$text=two(array("quBfY","mAN","o!hAN"),array("+"),array("biBf","mimA","jihA"),array("+"),0);
		echo "<p class = sa >By zlau (".link_sutra("6.1.10").") and bhRJAmit (".link_sutra("7.4.76").") :</p>\n"; 
		echo "<p class = sa >श्लौ (६.१.१०) तथा भृञामित्‌ (७.४.७६) :</p>\n";
		display(0);                    
	}
	elseif(sub(array("f","pipF",),array("+"),blank(0),0))
	{
		$text=two(array("f","pipF",),array("+"),array("if","pipF",),array("+"),0);
		echo "<p class = sa >By zlau (".link_sutra("6.1.10").") and artipipartyozca (".link_sutra("7.4.77").") :</p>\n"; 
		echo "<p class = sa >श्लौ (६.१.१०) तथा अर्तिपिपर्त्योश्च (७.४.७७) :</p>\n";
		display(0);                    
	}
	elseif(sub(array("Riji!r","viji!r","vizx!"),array("+"),blank(0),0))
	{
		$text=two(array("Riji!r","viji!r","vizx!"),array("+"),array("nenij","vevij","veviz"),array("+"),0);
		echo "<p class = sa >By zlau (".link_sutra("6.1.10").") and nijAM trayANAM guNaH zlau (".link_sutra("7.4.75").") :</p>\n"; 
		echo "<p class = sa >श्लौ (६.१.१०) तथा निजां त्रयाणां गुणः श्लौ (७.४.७५) :</p>\n";
		display(0);                    
	}
	else
	{
		$text=two($juhotyAdi,array("+"),$juhotyAdireplace,array("+"),0);
		echo "<p class = sa >By zlau (".link_sutra("6.1.10").") :</p>\n"; 
		echo "<p class = sa >श्लौ (६.१.१०) :</p>\n";
		display(0);            
	}
	
	if (sub(array("kiki","kikit","gagA","GiGf","hahA","huhu","hihf","hihrI"),array("+"),$tiG,0))
	{
		$text=three(array("kiki","kikit","gagA","GiGf","hahA","huhu","hihf","hihrI"),array("+"),$tiG,array("ciki","cikit","jagA","JiGf","JahA","Juhu","Jihf","JihrI"),array("+"),$tiG,0);
		echo "<p class = sa >By kuhozcuH (".link_sutra("7.4.62").") :</p>\n"; 
		echo "<p class = sa >कुहोश्चुः (७.४.६२) :</p>\n";
		display(0);            
	}
	if (sub(array("JiGf","JahA","Juhu","Jihf","JihrI"),array("+"),$tiG,0))
	{
		$text=three(array("JiGf","JahA","Juhu","Jihf","JihrI"),array("+"),$tiG,array("jiGf","jahA","juhu","jihf","jihrI"),array("+"),$tiG,0);
		echo "<p class = sa >By abhyAse carca (".link_sutra("8.4.54").") :</p>\n"; 
		echo "<p class = sa >अभ्यासे चर्चः (८.४.५४) :</p>\n";
		display(0);            
	}
	if (sub(array("JiGf","JahA","Juhu","Jihf","JihrI"),array("+"),$tiG,0))
	{
		$text=three(array("JiGf","JahA","Juhu","Jihf","JihrI"),array("+"),$tiG,array("jiGf","jahA","juhu","jihf","jihrI"),array("+"),$tiG,0);
		echo "<p class = sa >By abhyAse carca (".link_sutra("8.4.54").") :</p>\n"; 
		echo "<p class = sa >अभ्यासे चर्चः (८.४.५४) :</p>\n";
		display(0);            
	}
}
function Am()
{
	global $lakAra, $fo, $verb_without_anubandha; 
	/* UrNotezca pratiSedho vaktavyaH (vA) */
	if ($lakAra==="liw" && ends(array($fo),array("UrRuY"),4) )
	{
		echo "<p class = sa >By UrNotezca pratiSedho vaktavyaH (vA) :</p>\n"; 
		echo "<p class = sa >ऊर्णोतेश्च प्रतिषेधो वक्तव्यः (वा) :</p>\n";
		display(0);
	}
	/* ijAdezca gurumato'nRcCaH (3.1.36) */
	elseif ($lakAra==="liw" && arr(array($verb_without_anubandha),'/^[IUFXeEoO]/') && !ends(array($fo),array("fCa!"),4) )
	{
		$text=two(array("+"),$tiG,array("+Am+"),$tiG,0);
		echo "<p class = sa >By ijAdezca gurumato'nRcCaH (".link_sutra("3.1.36").") :</p>\n";
		echo "<p class = sa >इजादेश्च गुरुमतोऽनृच्छः (३.१.३६) :</p>\n";
		display(0);
	}
	/* dayAyAysazca (3.1.37) */
	elseif ($lakAra==="liw" && ends(array($fo),array("daya!","aya!","Asa!"),4) )
	{
		$text=two(array("+"),$tiG,array("+Am+"),$tiG,0);
		echo "<p class = sa >By dayAyAysazca (".link_sutra("3.1.37").") :</p>\n";
		echo "<p class = sa >दयायासश्च (३.१.३७) :</p>\n";
		display(0);
	}
	/* uSavidajAgRbhyo'nyatarasyAm (3.1.38) */
	elseif ($lakAra==="liw" && ends(array($fo),array("uza!","vida!","jAgf"),4) )
	{
		$text=two(array("+"),$tiG,array("+Am+"),$tiG,1);
		echo "<p class = sa >By uSavidajAgRbhyo'nyatarasyAm (".link_sutra("3.1.38").") :</p>\n";
		echo "<p class = sa >उषविदजागृभ्योऽन्यतरस्याम्‌ (३.१.३८) :</p>\n";
		display(0);
	}
	/* bhIhrIbhRhuvAM zluvacca (3.1.39) */
	elseif ($lakAra==="liw" && ends(array($fo),array("YiBI","hrI","quBfY","hu"),4) )
	{
		$text=two(array("+"),$tiG,array("+Am+"),$tiG,1);
		echo "<p class = sa >By uSavidajAgRbhyo'nyatarasyAm (".link_sutra("3.1.38").") :</p>\n";
		echo "<p class = sa >उषविदजागृभ्योऽन्यतरस्याम्‌ (३.१.३८) :</p>\n";
		display(0);
		$zluvat=1;
		zlu();
	}
	/* kAspratyayAdAmamantre liTi (3.1.35) */
	elseif ($lakAra==="liw" && $veda===0 && (anekAca($verb_without_anubandha) || $sanAdi!=='' || $verbset==="curAdi" || $fo==="kAsf!") )
	{
		$text=two(array("+"),$tiG,array("+Am+"),$tiG,0);
		echo "<p class = sa >By kAspratyayAdAmamantre liTi (".link_sutra("3.1.35").") :</p>\n"; 
		echo "<p class = sa >कास्प्रत्ययादाममन्त्रे (३.१.३५) :</p>\n";
		display(0);
	}
	/* AmaH (2.4.81) and kRJcAnuprayujyate liTi (3.1.40) */
	if ($lakAra==="liw" && sub(array("+Am+"),$tiG,blank(0),0) )
	{
		$text=three(array("+Am+"),array("","",""),$tiG,array("+Am+"),array("kf+"),$tiG,0);
		$text=one(array("+Am+kf+"),array("+Am+BU+"),1);
		$text=one(array("+Am+kf+"),array("+Am+as+"),1);
		echo "<p class = sa >By AmaH (".link_sutra("2.4.81").") and kRJcAnuprayujyate liTi (".link_sutra("3.1.40").") :</p>\n"; 
		echo "<p class = sa >आमः (२.४.८१) तथा कृञ्चानुप्रयुज्यते लिटि (३.१.४०) :</p>\n";
		display(0);
	}
}
/* Function gui to overcome issues pointed out in https://github.com/drdhaval2785/SanskritVerb/issues/125 */
function gui($sutra_number)
{
	global $text; global $ASdata; global $upasarga_joined; global $us; // bringing $text from main php function.
	for($i=0;$i<count($ASdata);$i++)
	{
		$int = explode(':',$ASdata[$i]);
		$sutra_no[$i] = $int[0];
		$sutra_type[$i] = $int[1];
		$sutra_dev[$i] = $int[2];
		if ($sutra_no[$i] === $sutra_number)
		{	
			echo "<p class = sa >By ".toiast($sutra_dev[$i])." (".link_sutra($sutra_number).") - ".toiast($sutra_type[$i])." :</p>\n";
			echo "<p class = sa >".$sutra_dev[$i]." (".convert($sutra_number).") - ".$sutra_type[$i]." :</p>\n";
			display(0);
		}
	}
}




/* Functions which are not used in the code */
/* Function f to find the nth letter in the word */
function f($text,$n) // Not used in code.
{
$p = str_split($text); // splits the word in its letters.
$text = $p[$n-1]; // finds the nth letter. 1st letter is $p[0], 2nd $p[1]... nth is $p[$n-1]
return $text; // returning the result to the user.
}
/* find string after removing 'n' letters from beginning of the word (sa for string after) */
function sa($text,$n)        // Not used in code.
{
$p = str_split($text); 
$a = "";
for ($q=0;$q<$n;$q++)
{ $text = ltrim($text,$p[$q]); }
return $text;
}
/* find 'n'th letter from the end in a word (r for reverse direction) */
function r($text,$n)                 // Not used in code
{
$p = str_split($text);
$text = $p[count($p)-$n];
return $text;
}
/* find the string remaining after removing n characters from the end (sb for string before) */
function sb($text, $n)        // Not used in code.
{
$p = str_split($text);
$a= "";
for ($q=0;$q<$n;$q++)
{$text = chop($text,$p[count($p)-$q-1]);} 
return $text;
}
/* function lopa is not used in the code because it is not stable */
function lopa ($kantha,$talu,$murdha,$oshtha,$location,$merge)
{ 
 global $text;   
// this is an array of the input values to use below 
 // get all possible combianations of $kantha+$talu+$murdha
//$combinations = get_string_combinations(); 
   $combinations = array(); 

     foreach($kantha as $k) // "a","k","g","n","h"
     { 
        foreach($talu as $t) // "i","c","j","y","s"
        { 
            foreach($murdha as $m) // "f","w","q","r","z"
            {
                foreach ($oshtha as $o)
                {
                 $combinations[] = $k.$t.$m.$o;    
                }
            } 
        } 
     } 
//print_r($combinations);
$values1 = array();
foreach ($text as $stti => $string)  // 'aifkcwh', 'aifkcwhsz', 'kim', 'aif'
{

    $values = array($string);  
    
    reset($values); 


    // loop through $values using an array pointer 
    // while the current array pointer position is not null/false
    while(current($values)!==false)
    {
        // on the first iteration, $values will be the inputted string 
        // from $strings_to_test... our example is "aifkcwh"
        $value = current($values); 
        
       if ($merge === 1)
        {
        $values1[] = current($values);
        } 
        // for each possible combination of $kantha.$talu.$murdha
        // let's say our first combination is "aif"
        foreach($combinations as $ci => $combination)
        {  
            // look and see if the current value we are looking
            // at ("aifkcwh") contains this combination string  
            if (strpos($value,$combination)!==false)
            {   $posterior = substr($value,strpos($value,$combination)+$location+2);
                $previous = chop($value,$posterior);
                $previous = substr($previous,0,strlen($previous)); 
                $newval = $previous.$posterior; 
               // echo $value."<br>".$combination."</br>".$previous."</br>".$posterior."</br>";
                // have we already recorded this mutation?  
                if (!in_array($newval,$values1)) 
                { 
                    // if not... append it to the array $values
                    $values1[] = $newval; 
                    // now, values would go from being = array([0]=>'aifkcwh'); 
                    // to array ([ 0] => 'aifkcwh', [1] => 'aiifkcwh' ); 
                }
                else 
                {
                }
            } 
        } // <-- end of the foreach statement, this will go through all combinations 
          //     in our combinations array for this particular value which is currently aifkcwh
        next($values);  
    }  

    $output[$string] = $values1;
}
// print_r($output);
$output = flatten($output);
$output = array_unique($output);
$output = array_values($output);

return $output;
}
/* function nosavarna is not used in the code. It is for finding the array of savarNas without the letter itself. */
function nosavarna($c)
{
    global $ac;
     $i = array("i","I");$u = array("u","U");$f = array("f","F","x","X");
    
    if ( $c === $i[0] ) {$non = array_diff($ac, $i);}
    if ( $c === $i[1] ) {$non = array_diff($ac, $i);}
    if ( $c === $u[0] ) {$non = array_diff($ac, $u);}
    if ( $c === $u[1] ) {$non = array_diff($ac, $u);}
    if ( $c === $f[0] ) {$non = array_diff($ac, $f);}
    if ( $c === $f[1] ) {$non = array_diff($ac, $f);}
    if ( $c === $f[2] ) {$non = array_diff($ac, $f);}
    if ( $c === $f[3] ) {$non = array_diff($ac, $f);}
       return $non;
}
/* function get_string_combinations is a subset of the function dvitva and lopa. In modified version, this code segment is redundant. */
 function get_string_combinations()
 {
     $kantha = array("a","k","g","n","h");
     $talu   = array("i","c","j","y","s");
     $murdha = array("f","w","q","r","z");

     $combinations = array(); 

     foreach($kantha as $k) // "a","k","g","n","h"
     { 
        foreach($talu as $t) // "i","c","j","y","s"
        { 
            foreach($murdha as $m) // "f","w","q","r","z"
            {
                $combinations[] = $k.$t.$m; 
            } 
        } 
     } 
     // this gives us an array if 125 items 
     /*
     $combinations = 
        Array
        (
             [0] => aif
             [1] => aiw
             [2] => aiq
             [3] => air
             [4] => aiz
             .... 
             [121] => hsw
             [122] => hsq
             [123] => hsr
             [124] => hsz
        ) 
     */
     return $combinations;
 }
 /* function merge is not used in the code */
 function merge($text,$text1)
 {
     $text = array_merge($text,$text1);
    $text = array_unique($text);
    $text = array_values($text);
    return $text;
 }
/* function blank1 will return an array having n members of $a. blank("a",2) === array("a","a"); Not used in code. */
 function blank1($a,$n)
 {
     $array = array();
     while(count($array)< $n+1)
     {
        array_push($array,$a);
     }
     return $array;
 }
/* Function to find savarna of a given letter from the given array. Not used in code. */
function sl($text,$array) // Known issue - words having two Asyas.
{
    global $kantha,$talu,$murdha,$danta,$oshtha,$nasika,$kanthatalu,$kanthoshtha,$dantoshtha,$sprushta,$ishatsprushta,$vivruta,$samvruta,$aghosha,$alpaprana,$ghosha,$mahaprana,$ac,$udatta,$anudatta,$svarita,$shvasa,$nada,$vivara,$samvara,$hl,$ru,$e;
    // defining an array for sthAna
$i=0;
if (in_array($text,$kantha)) { $sthana[$i] = $kantha; $i++; }
if (in_array($text,$talu)) { $sthana[$i] =  $talu; $i++; }
if (in_array($text,$murdha)) { $sthana[$i] = $murdha; $i++; }
if (in_array($text,$danta)) { $sthana[$i] = $danta; $i++; }
if (in_array($text,$oshtha)) { $sthana[$i] = $oshtha; $i++; }
if (in_array($text,$nasika)) { $sthana[$i] = $nasika; $i++; }
if (in_array($text,$kanthatalu)) { $sthana[$i] = $kanthatalu; $i++; }
if (in_array($text,$kanthoshtha)) { $sthana[$i] = $kanthoshtha; $i++;}
if (in_array($text,$dantoshtha)) { $sthana[$i] = $dantoshtha; $i++; }
// defining an array for Abhyantara prayatna for consonants
$j=0;
if (in_array($text,$sprushta)) { $abhyantara[$j] = $sprushta; $j++; }
if (in_array($text,$ishatsprushta)) { $abhyantara[$j] = $ishatsprushta; $j++; }
if (in_array($text,$vivruta)) { $abhyantara[$j] = $vivruta; $j++; }
if (in_array($text,$samvruta)) { $abhyantara[$j] = $samvruta; $j++; }
// defining an array for bAhya prayatna for consonants
$k=0;
if (in_array($text,$aghosha)) { $ghosh[$k] = $aghosha; $k++; }
if (in_array($text,$alpaprana)) { $prana[$k] = $alpaprana; $k++; }
if (in_array($text,$ghosha)) { $ghosh[$k] = $ghosha; $k++; }
if (in_array($text,$mahaprana)) { $prana[$k] = $mahaprana; $k++; }
// defining an array for bAhya prayatna of vowels
$u=0;
if (in_array($text,$ac)) { $svar[$u] = $udatta; $u++; }

// Finding out intersections of sthAna, Abhyantara prayatna and bAhya prayatnas of the given letter and the given array. 
if(empty($sthana)===FALSE)
{
$sthanasamya = array_intersect(flatten($sthana),$array); 
//echo "The letters in the pratyAhAra with same sthAna (Asya) as the letter input are: ".implode(",",$sthanasamya)."</br>";    
}
if(empty($abhyantara)===false)
{
$abhyantarasamya = array_intersect(flatten($abhyantara),$array);
//echo "The letters in the pratyAhAra with the same Abhyantara prayatna as the letter input are: ".implode(",",$abhyantarasamya)."</br>";    
}
if(empty($ghosh)===FALSE)
{
$ghoshasamya = array_intersect(flatten($ghosh),$array);
//echo "The letters in the pratyAhAra with the same ghoSa as the letter input are: ".implode(",",$ghoshasamya)."</br>";    
}
if(empty($prana)===FALSE)
{
$pranasamya = array_intersect(flatten($prana),$array);
//echo "The letters in the pratyAhAra with the same prANa as the letter input are: ".implode(",",$pranasamya)."</br>";    
}
if(empty($svar)===false)
{
if(in_array($text,$ac)) 
        { $svarasamya = array_intersect(flatten($svar),$array,$ac); 
//echo "The letters in the pratyAhAra with the same udAtta/anudAtta/svarita as the letter input are: ".implode(",",$svarasamya)."</br>";
        }    
}
if(empty($sthanasamya)===false && empty($abhyantarasamya)===false && empty($ghoshasamya)===false && empty($pranasamya)===false)
{ $l = array_intersect($sthanasamya,$abhyantarasamya,$ghoshasamya,$pranasamya); }
if(empty($sthanasamya)===false && empty($abhyantarasamya)===false && empty($ghoshasamya)===false)
{ $m = array_intersect($sthanasamya,$abhyantarasamya,$ghoshasamya); }
if(empty($sthanasamya)===false && empty($abhyantarasamya)===false)
{ $n = array_intersect($sthanasamya,$abhyantarasamya); }
if(empty($sthanasamya)===false && empty($abhyantarasamya)===false && empty($pranasamya)===false)
{ $o = array_intersect($sthanasamya,$abhyantarasamya,$pranasamya); }
if(empty($sthanasamya)===false && empty($ghoshasamya)===false)
{ $p = array_intersect($sthanasamya,$ghoshasamya); }
if(empty($sthanasamya)===false && empty($pranasamya)===false)
{ $q = array_intersect($sthanasamya,$pranasamya); }
// Defining savarNas for consonants
if(in_array($text,$hl))
{
    if(empty($sthanasamya)===false&&empty($abhyantarasamya)===false&&empty($ghoshasamya)===false&&empty($pranasamya)===FALSE&&empty($l)===false) 
    {//echo "four match";
            $savarna = implode(", ",$l);     
    }
    elseif (empty($sthanasamya)===false&&empty($abhyantarasamya)===false&&empty($ghoshasamya)===false&&empty($m)===false)
    {//echo "three match";
            $savarna = implode(", ",$m);     
    }
    elseif (empty($sthanasamya)===false&&empty($abhyantarasamya)===false&&empty($pranasamya)===false&&empty($o)===false)
    {//echo "three match";
            $savarna = implode(", ",$o);     
    }
    elseif (empty($sthanasamya)===false&&empty($abhyantarasamya)===false&&empty($n)===false)
    {//echo "Two match";
            $savarna = implode(", ",$n);     
    }
     elseif (empty($sthanasamya)===false&&empty($ghoshasamya)===false&&empty($p)===false)
    {//echo "Two match";
            $savarna = implode(", ",$p);     
    } elseif (empty($sthanasamya)===false&&empty($pranasamya)===false&&empty($q)===false)
    {//echo "Two match";
            $savarna = implode(", ",$q);     
    }
    else
    {//echo "no match";
    $savarna = implode(", ",$sthanasamya);    
    }
} 
// defining savarNas for vowels
else
{  
    if (in_array($text,$ru)||in_array($text,$e))
    {// patch for $ru
        for($i=0;$i<4;$i++)
        {
        if ($text === $ru[$i])
        {
            if (in_array($text,$array))
            { $savarna = "f, F, x, X"; }
            else
            { $savarna = ""; }
        }
        // patch for non sAvarNya of e,E,o,O
        elseif ($text === $e[$i])
        {
            if (in_array($text,$array))
            { $savarna = $text; }
            else
            { $savarna = ""; }
        }
        }
    }
    
    
    else 
    {// In case of other vowels.
        $savarna = implode(", ",$sthanasamya);
    }
    
    if (in_array($text,$array))
    {
        $savarna = $text;
    }
}
// giving output to the browser for savarNa letter
//echo "The savarna letter of '".$text."' among the given pratyAhAra is: ".$savarna;    
// stores that savarNa letter in memory.
return $savarna;
}
/* Function one1 is for replacing one letter in the whole array of $text with another letter. Not used in code */
// There are three arguments, $a is the array which you want to change, $b is the array which will be put in place of the replaced one.
// $merge can take two values. 0 will mean that the whole $text will be replaced with the new replaced values. Used in case of mandatory Adezas.
// 1 will mean that $text will not be replaced, but the replaced values will be added to it. Used in case of optional Adezas.
function one1($text,$a,$b,$merge)
{
        for($i=0;$i<count($a);$i++)
        {
            $text =  str_replace($a[$i],$b[$i],$text);    
        }
return $text;  
}
/* Function two is for replacing one letter in the whole array of $text with another letter. Not used in code */
// There are five arguments, $a,$b are the arrays which you want to change, $c,$d are the arrays which will be put in place of the replaced one.
// $merge can take two values. 0 will mean that the whole $text will be replaced with the new replaced values. Used in case of mandatory Adezas.
// 1 will mean that $text will not be replaced, but the replaced values will be added to it. Used in case of optional Adezas.
function two1($text,$a,$b,$c,$d,$merge)
{
    for($i=0;$i<count($a);$i++)
          {
    for($j=0;$j<count($b);$j++)
            {
      $text =  str_replace($a[$i].$b[$j],$c[$i].$d[$j],$text);   
            }
          }
    return $text;
}

/* Function three1 is for replacing one letter in the whole array of $text with another letter. Not used in code */
// There are seven arguments, $a,$b,$c are the arrays which you want to change, $d,$e,$f are the arrays which will be put in place of the replaced one.
// $merge can take two values. 0 will mean that the whole $text will be replaced with the new replaced values. Used in case of mandatory Adezas.
// 1 will mean that $text will not be replaced, but the replaced values will be added to it. Used in case of optional Adezas.
function three1($text,$a,$b,$c,$d,$e,$f,$merge)
{
     for($i=0;$i<count($a);$i++)
    {
    for($j=0;$j<count($b);$j++)
        {
        for($k=0;$k<count($c);$k++)
            {
         $text =  str_replace($a[$i].$b[$j].$c[$k],$d[$i].$e[$j].$f[$k],$text);       
            }
        }
    }
    return $text;
}

/* An attempt to create an all encompassing function 
 * name is panini
 * three arrays for checking,
 * one for adding additional checking in addition to sub function
 * one for adding whether pratyaya / pada
 *  one for the 0/1/2/3/4 etc of sub function, 
 * three for the substituted, 
 * three for substitution, 
 * one for 0/1 of one/two/three function,
 * one for english sutra name,
 * one for english sutra number
 * one for hindi sutra name,
 * one for hindi sutra number
 * 
 */
?>