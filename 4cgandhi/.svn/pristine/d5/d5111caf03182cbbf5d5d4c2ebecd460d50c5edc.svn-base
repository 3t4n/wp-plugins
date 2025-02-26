function convert_to_unicode()
{
var array_one = new Array( 

"X","Y","Û","Ú","Ü","Ý","Ù",

"n","o","p","{","}","~",
"‚","ƒ","„","…","†","‡","ˆ","‰","Š","‹","Œ",
"‘","’","“","”","–","˜","™","š","›","œ",
"¤","¥","©","«",
"Â","Ã","Ä","Å","Ï",
"Ö","Ø","OÞ","PÞ","ß",

"á","â","ã","ä","å","æ","ç","è","é","ê","ë","ì","í","î","ï",
"ð","ñ","ò","ó","ô","õ","ö","÷","ø","ù","ú","ÿ",

"LÑ","MÑ","OÑ","PÑ",
"i","j","É",
"×¢","×£","£Þ","×¦","¬","×µ","×I","×J","JÞ","×¦f","¬f","×R",  

"¢","I","£","J","¦","§","K",    
"¨","L","ª","þ","¬","Ó","®",
"M","N","O","P","¯",

"°","±","Q","ý","²","³",
"´","µ","R", "¶", "·", "¸",

"¹","S","»","Õ","¼","T","½","U","V","¾","à","¿","À","Á","W",

"Aü","A","BÊ","B","C","D","EZ","Em","E|","E","F","G","H", 

"f","e","b","c","Æ","Ç","È","Z","m","|","`","û","ü","a","h","g",
"Ð","Ò","Ô","×",

"q","r","s","t","u","v","w","x","y","z",

"्ा","्ो","्ौ","अो","अा","आै","आे","ाो","ाॅ","ॅा","ाे",
"ंु","ेे","अै","ाे","अे","ंा","अॅ","ाै","ैा","ंृ",
"ँा","ँू","ेा","ंे","ाें","ॅं","ंॅ")     // Remove typing mistakes in the original file

var array_two = new Array(

"","","ॐ","ऽ","।","॥","॰", 

"ल्ल","ङ्म","स्र","त्र","त्न","प्त",
"ङ्क","ङ्ख","ङ्ग","ङ्घ","ङ्क्त","ञ्च","क्च","ह्न","द्ब्र","ढ्ढ","छ्व",
"ह्य","ह्ण","ह्ल","ह्व","झ्र","ट्ट","ट्ठ","ह्म्","श्च","क्र",
"ख्र्","ख्न्","च्च्","ज्ज्",
"त्र्","क्ष्","ज्ञ्","ष्ट्व","ह्र",
"न्न्","त्त्","ड़","ढ़","श्र्",

"ष्ट","ष्ठ","श्ल","श्व","स्त्र","क्क","ड्ड","ड्ढ","क्व","स्र","्य","ञ्ज","द्ग","द्घ","द्द",
"द्ध","द्ब","द्भ","द्म","द्य","द्व","क्त","रु","रू","हृ","दृ","ठ्ठ",

"छ्र","ट्र","ड्र","ढ्र",
"्र","्न","्ल",
"क़्","ख़्","ख़्","ग़्","ज़्","फ़्","क़","ख़","ख़","ग़","ज़","फ़",

"क्","क","ख्","ख","ग्","घ्","ङ",  
"च्","छ","ज्","ज","ज़्","झ्","ञ्",
"ट","ठ","ड","ढ","ण्",

"त्","थ्","द","द","ध्","न्",
"प्","फ्","फ","ब्","भ्","म्",

"य्","र","ल्","ल","ळ्","ळ","व्","व","श्","श्","श","ष्","स्","ह्","ह",

"औ","अ","ई","इ","उ","ऊ","ऐ","ऐ","ऐ","ए","ऋ","ॠ","ऌ", 

"ा","ी","ु","ू","ु","ू","ृ","े","े","े","ै","ो","ौ","ं","ँ","ॅ",
"्","ँ","ं","़",

"०","१","२","३","४","५","६","७","८","९",

 
"","े","ै","ओ","आ","औ","ओ","ो","ॉ","ॉ","ो",
"ुं","े","अ‍ै","ो","अ‍े","ां","अ‍ॅ","ौ","ौ","ृं",
"ाँ","ूँ","ो","ें","ों","ँ","ँ")     // Remove typing mistakes in the original file 

//**************************************************************************************
//
// Punctuation marks incorporated at the end
//
//**************************************************************************************
// The following two characters are to be replaced through proper checking of locations:
//**************************************************************************************
// "d",
// "ि",
//
// "Ê",
// "र्" (reph) 
//**************************************************************************************

var array_one_length = array_one.length ;

document.getElementById("unicode_text").value = "आपके द्वारा हमें यूनीकोड में बदलने के लिए दिये गये शब्द 4cGandhi लिपि में नहीं हैं"  ;  

var modified_substring = document.getElementById("legacy_text").value  ;

//****************************************************************************************
//  Break the long text into small bunches of max. max_text_size  characters each.
//****************************************************************************************
    var text_size = document.getElementById("legacy_text").value.length ;

    var processed_text = '' ;  //blank

//**********************************************
//    alert("text size = "+text_size);
//**********************************************

    var sthiti1 = 0 ;  var sthiti2 = 0 ;  var chale_chalo = 1 ;
 
    var max_text_size = 6000;

    while ( chale_chalo == 1 ) 
    {
     sthiti1 = sthiti2 ; 

     if ( sthiti2 < ( text_size - max_text_size ) )  
     { 
      sthiti2 +=  max_text_size ;
      while (document.getElementById("legacy_text").value.charAt ( sthiti2 ) != ' ') {sthiti2--;}
     } 
     else  { sthiti2 = text_size  ;  chale_chalo = 0 }
      
//   alert(" sthiti 1 = "+sthiti1); alert(" sthit 2 = "+sthiti2) 

     var modified_substring = document.getElementById("legacy_text").value.substring ( sthiti1, sthiti2 )  ;

    Replace_Symbols( );

    processed_text += modified_substring;
     

//****************************************************************************************
//  Breaking part code over
//****************************************************************************************
//  processed_text = processed_text.replace( /mangal/g , "SUCHI-DEV-708 " ) ;   

    document.getElementById("unicode_text").value = processed_text;
   }


// --------------------------------------------------


function Replace_Symbols( )

{

//substitute array_two elements in place of corresponding array_one elements

if ( modified_substring != "" )  // if stringto be converted is non-blank then no need of any processing.
{
for ( input_symbol_idx = 0; input_symbol_idx < array_one_length; input_symbol_idx++ )

{ 

//  alert(" modified substring = "+modified_substring)

//***********************************************************
// if (input_symbol_idx==106) 
//  { alert(" input_symbol_idx = "+input_symbol_idx);
//    alert(" input_symbol_idx = "+input_symbol_idx)
//; alert(" character =" + modified_substring.CharCodeAt(input_symbol_idx))
//     alert(" character = "+modified_string.fromCharCode(input_symbol_idx)) 
//   }
// if (input_symbol_idx == 107) 
//   { alert(" input_symbol_idx = "+input_symbol_idx);
//    alert(" character = ",+string.fromCharCode(input_symbol_idx)) 
//   }
//***********************************************************
idx = 0 ;  // index of the symbol being searched for replacement

while (idx != -1 ) //while-00
{

modified_substring = modified_substring.replace( array_one[ input_symbol_idx ], array_two[input_symbol_idx] )
idx = modified_substring.indexOf( array_one[input_symbol_idx] )

} // end of while-00 loop

} // end of for loop


// alert(" modified substring2 = "+modified_substring)
//**********************************************************************************
// Codes for Special Glyphs
//**********************************************************************************
// Glyph1 : Ë (reph+anusvAr)
// Glyph2 : Í  (ि+reph)
// Glyph3 : Î ("िं") 
// Glyph4 : Ì (reph+ikAr+anusvAr "र्िं")
//**********************************************************************************
// Code for Glyph1 : Ë (reph+anusvAr)
//**********************************************************************************
   modified_substring = modified_substring.replace( /Ë/g , "Êं" ) ; // at some places  ì  is  used eg  in "कर्कंधु,पूर्णांक".

//**********************************************************************************
// Code for Glyph2 : Í  (ि+reph)
//**********************************************************************************
   modified_substring = modified_substring.replace( /Í/g , "र्d" ) ;  // at some places  Ì  is  used eg  in "धार्मिक".

// ****************************** 
var position_of_i = modified_substring.indexOf( "d" )

while ( position_of_i != -1 )  //while-02
{
var charecter_next_to_i = modified_substring.charAt( position_of_i + 1 )
var charecter_to_be_replaced = "d" + charecter_next_to_i
modified_substring = modified_substring.replace( charecter_to_be_replaced , charecter_next_to_i + "ि" ) 
position_of_i = modified_substring.search( /d/ , position_of_i + 1 ) // search for i ahead of the current position.

} // end of while-02 loop

//**********************************************************************************
// Glyph3 : Î (ि+anusvAr)
// Glyph4 : Ì (reph+ikAr+anusvAr "र्िं")
//**********************************************************************************
modified_substring = modified_substring.replace( /Ì/g , "ÊÎ" ) ;  // at some places  Ì  is  used eg  in "धार्मिक".
modified_substring = modified_substring.replace( /Î/g , "da" ) ;  // at some places  Ì  is  used eg  in "धार्मिक".

var position_of_i = modified_substring.indexOf( "da" )

while ( position_of_i != -1 )  //while-02
{
var charecter_next_to_ip2 = modified_substring.charAt( position_of_i + 2 )
var charecter_to_be_replaced = "da" + charecter_next_to_ip2
modified_substring = modified_substring.replace( charecter_to_be_replaced , charecter_next_to_ip2 + "िं" ) 
position_of_i = modified_substring.search( /da/ , position_of_i + 2 ) // search for i ahead of the current position.

} // end of while-02 loop

//**********************************************************************************
// End of Code for Replacing four Special glyphs
//**********************************************************************************

// following loop to eliminate 'chhotee ee kee maatraa' on half-letters as a result of above transformation.

var position_of_wrong_ee = modified_substring.indexOf( "ि्" ) 

while ( position_of_wrong_ee != -1 )  //while-03

{
var consonent_next_to_wrong_ee = modified_substring.charAt( position_of_wrong_ee + 2 )
var charecter_to_be_replaced = "ि्" + consonent_next_to_wrong_ee 
modified_substring = modified_substring.replace( charecter_to_be_replaced , "्" + consonent_next_to_wrong_ee + "ि" ) 
position_of_wrong_ee = modified_substring.search( /ि्/ , position_of_wrong_ee + 2 ) // search for 'wrong ee' ahead of the current position. 

} // end of while-03 loop

// following loop to eliminate 'chhotee ee kee maatraa' on half-letters as a result of above transformation.

var position_of_wrong_ee = modified_substring.indexOf( "िं्" ) 

while ( position_of_wrong_ee != -1 )  //while-03

{
var consonent_next_to_wrong_ee = modified_substring.charAt( position_of_wrong_ee + 3 )
var charecter_to_be_replaced = "िं्" + consonent_next_to_wrong_ee 
modified_substring = modified_substring.replace( charecter_to_be_replaced , "्" + consonent_next_to_wrong_ee + "िं" ) 
position_of_wrong_ee = modified_substring.search( /िं्/ , position_of_wrong_ee + 3 ) // search for 'wrong ee' ahead of the current position. 

} // end of while-03 loop


// Eliminating reph "Ê" and putting 'half - r' at proper position for this.
set_of_matras = "ािीुूृेैोौं:ँॅ" 

modified_substring = '' + modified_substring ;  // to avoid error due to search index becoming negative.
var position_of_R = modified_substring.indexOf( "Ê" )

while ( position_of_R > 0 )  // while-04
{
probable_position_of_half_r = position_of_R - 1 ;
var charecter_at_probable_position_of_half_r = modified_substring.charAt( probable_position_of_half_r )


// trying to find non-maatra position left to current O (ie, half -r).

while ( set_of_matras.match( charecter_at_probable_position_of_half_r ) != null )  // while-05

{
probable_position_of_half_r = probable_position_of_half_r - 1 ;
charecter_at_probable_position_of_half_r = modified_substring.charAt( probable_position_of_half_r ) ;

} // end of while-05

if ( modified_substring.charAt( probable_position_of_half_r - 1 ) == '्' )
  { probable_position_of_half_r = probable_position_of_half_r - 2 ;
      if ( modified_substring.charAt( probable_position_of_half_r - 1 ) == '्' )
           probable_position_of_half_r = probable_position_of_half_r - 2 ; }

charecter_to_be_replaced = modified_substring.substr ( probable_position_of_half_r , ( position_of_R - probable_position_of_half_r ) ) ;
new_replacement_string = "र्" + charecter_to_be_replaced ; 
charecter_to_be_replaced = charecter_to_be_replaced + "Ê" ;
modified_substring = modified_substring.replace( charecter_to_be_replaced , new_replacement_string ) ;
position_of_R = modified_substring.indexOf( "Ê" ) ;

} // end of while-04

//**********punctuation marks ****************
// "k","l",
//  "‘","’",

modified_substring = modified_substring.replace( /k/g , "‘" )   ;  
modified_substring = modified_substring.replace( /l/g , "’" )   ;  

} // end of IF  statement  meant to  supress processing of  blank  string.

} // end of the function  Replace_Symbols

} // end of legacy_to_unicode function



//******************************************************************************



function Convert_to_4CGandhi()
{
var array_one = new Array(
"क़्","ख़्","ग़्","ज़्","ड़्","ढ़्","फ़्","क़","ख़","ग़","ज़","ड़","ढ़","फ़", //two-byte nuqta characters

"ड़","ढ़", // "ड़ि","ढ़ि","क़ि","ख़ि","ग़ि","ज़ि","फ़ि",

"ॐ","ऽ","।","॥","॰", 

"ल्ल","ङ्म","स्र","त्न","प्त",
"ङ्क","ङ्ख","ङ्ग","ङ्घ","ङ्क्त","ञ्च","क्च","ह्न","द्ब्र","ढ्ढ","छ्व",
"ह्य","ह्ण","ह्ल","ह्व","झ्र","ट्ट","ट्ठ","ह्म्","ह्म","श्च","फ्र","क्र", // "क्र",
"ख्र्","ख्न्","च्च्","ज्ज्",
"त्र्","त्र","क्ष्","क्ष","ज्ञ्","ज्ञ","ष्ट्व","ह्र",  //"श्र्य","त्र्य",
"न्न्","त्त्","त्त","श्र्","श्र","शृ",


"ष्ट","ष्ठ","श्ल","श्व","स्त्र","क्क","ड्ड","ड्ढ","क्व","स्र","ञ्ज","द्ग","द्घ","द्द",

"छ्र","ट्र","ड्र","ढ्र","्र",

"द्ध","द्ब","द्भ","द्म","द्य","द्व","क्त","रु","रू","हृ","दृ","ठ्ठ",

"कु","कू","कृ","के","कै","कँ","कं",
"फु","फू","फे","फै","फँ","फं",

"क़्","ख़्","ख़्","ग़्","ज़्","फ़्","क़","ख़","ख़","ग़","ज़","फ़",

"क्","ख्","ग्","घ्",
"क","ख","ग","घ","ङ",
  
"च्","ज्","झ्","ञ्",
"च","छ","ज","झ","ञ",

"ट","ठ","ड","ढ","ण्","ण",

"त्","थ्","ध्","न्",
"त","थ","द","ध","न",

"प्","फ्","ब्","भ्","म्",
"प","फ","ब","भ","म",

"य्","ल्","ळ्","व्",
"य","र","ल","ळ","व",

"श्","ष्","स्","ह्",
"श","ष","स","ह",

"्य","्न","्ल",  // "्रु","्रू",

"औ","ओ","ऑ","आ","अ","ई","इ","उ","ऊ","ऐ","ए","ऋ","ॠ","ऌ", 

"ॉ","ा","ी","ु","ू","ृ","े","ै","ो","ौ","ं","ँ","ः","ॅ",   //"ु","ू","े","े",
"्","ँ","ं","़",

"०","१","२","३","४","५","६","७","८","९"  )

var array_two = new Array(

"क़्","ख़्","ग़्","ज़्","ड़्","ढ़्","फ़्","क़","ख़","ग़","ज़","ड़","ढ़","फ़",  //one-byte nuqta characters

"OÞX","PÞX",  // "dOÞX","dPÞX","d×I","d×J","d×¦f","d¬f","d×R",

"Û","Ú","Ü","Ý","Ù",

"n","o","p","}","~",
"‚","ƒ","„","…","†","‡","ˆY","‰","Š","‹","Œ",
"‘","’","“","”","–","˜","™","š","šf","›","RiY","IiY", // "œY",
"¤","¥","©","«",
"Â","Âf","Ã","Ãf","Ä","Äf","Å","Ï",  // "ß¹f","Â¹f",
"Ö","Ø","Øf","ß","ßf","àÈ",


"á","â","ã","ä","å","æY","ç","è","é","ê","ì","í","î","ï",

"LÑ","MÑ","OÑ","PÑ","i",

"ð","ñ","ò","ó","ô","õ","öY","÷Y","øY","ù","ú","ÿ",

"IbY","IcY","IÈY","IZY","I`Y","IhY","IaY",
"RbY","RcY","RZY","R`Y","RhY","RaY",

"×¢","×£","£Þ","×¦","¬","×µ","×I","×J","JÞ","×¦f","¬f","×R",  

"¢","£","¦","§",    
"IY","J","¦f","§f","K",    

"¨","ª","¬","Ó",
"¨f","L","þ","Óf","®f",

"MX","NX","OX","PX","¯","¯f",

"°","±","²","³",
"°f","±f","Q","²f","³f",

"´","µ","¶","·","¸",
"´f","RY","¶f","·f","¸f",

"¹","»","¼","½",
"¹f","SX","»f","T","U",

"V","¿","À","Á",
"Vf","¿f","Àf","WX",

"ë","j","É",    //"fib","fic",

"Aü","Aû","Afg","Af","A","BÊ","B","CX","DY","EZ","E","FY","GY","H", 

"fg","f","e","b","c","È","Z","`","û","ü","a","h",":","g",   //"Æ","Ç","m","|",
"Ð","Ò","Ô","×",

"q","r","s","t","u","v","w","x","y","z" )


//**************************************************************************************
//  To be edited above this line
//**************************************************************************************
// The following two characters are to be replaced through proper checking of locations:
//**************************************************************************************
// "d",
// "ि",
//
// "Ê",
// "र्" (reph) 
//**************************************************************************************

var array_one_length = array_one.length ;
var array_two_length = array_two.length ;

if ( array_one_length == array_two_length ) 
  document.getElementById("legacy_text").value = "Both the arrays are of equal length"  ;  
  else document.getElementById("legacy_text").value = "Both the arrays are NOT of equal length"  ;  

  document.getElementById("legacy_text").value = "You have chosen SIMPLE TEXT in Unicode to convert into 4CGandhi. Conversion in progress.."  ;  

var modified_substring = document.getElementById("unicode_text").value  ;

    Replace_Symbols( ) ;

  //  alert(" modified substring = "+modified_substring)

    var processed_text = modified_substring ;

 //   alert(" modified substring2 = "+modified_substring)

    document.getElementById("legacy_text").value = processed_text  ;

	

//**************************************************
//--------------------------------------------------
//**************************************************



function Replace_Symbols( )
   {
// "d",
// "ि",
//
// "Ê",
// "र्" (reph) 


    // if string to be converted is non-blank then no need of any processing.
    if (modified_substring != "" )  
       {
        // code for replacing "ि" (chhotee ee kii maatraa) with "d" and correcting its position too.
        
        var position_of_f = modified_substring.indexOf( "ि" )  ;
         while ( position_of_f != -1 )  //while-02
           {
            var character_left_to_f = modified_substring.charAt( position_of_f - 1 )  ;
            modified_substring = modified_substring.replace( character_left_to_f + "ि" ,  "d" + character_left_to_f )  ;

            position_of_f = position_of_f - 1  ;

            while (( modified_substring.charAt( position_of_f - 1 ) == "्" )  &  ( position_of_f != 0  ) )
               {
                var string_to_be_replaced = modified_substring.charAt( position_of_f - 2 ) + "्"  ;
                  modified_substring = modified_substring.replace( string_to_be_replaced + "d", "d" + string_to_be_replaced ) ;

                position_of_f = position_of_f - 2  ;
               }
            position_of_f = modified_substring.search( /ि/ , position_of_f + 1 ) ; // search for f ahead of the current position.

           } // end of while-02 loop
		   
 
   //************************************************************     
        // Eliminating "र्" and putting  "Ê"   at proper position for this.
		
// before searching and replacing half-R,  replace 'tr' and 'shr' so that they  do not intrude with half-R search-and-replace activity.				
		modified_substring = modified_substring.replace( /श्र्/g  , 'ß' ) ;
		modified_substring = modified_substring.replace( /त्र्/g  , 'Â' ) ;
		

       set_of_matras = "ािीुूृेैोौं:ँॅ" 

modified_substring += '  ' ;  // add two spaces after the string to avoid UNDEFINED char in the following code.

       var position_of_half_R = modified_substring.indexOf( "र्" ) ;
        while ( position_of_half_R > 0  )  // while-04
           {
            // "र्"  is two bytes long
			 if ( modified_substring.charAt( position_of_half_R + 3 ) != '्' ) 
                  var probable_position_of_Z = position_of_half_R + 3    
			
			    else { if ( modified_substring.charAt( position_of_half_R + 5 ) != '्' ) 
			              probable_position_of_Z = position_of_half_R + 5
                         else probable_position_of_Z = position_of_half_R + 7 ;				  
					  }
			
            var character_right_to_probable_position_of_Z = modified_substring.charAt( probable_position_of_Z + 0 )

            // trying to find non-maatra position right to probable_position_of_Z .

            while ( set_of_matras.indexOf( character_right_to_probable_position_of_Z ) != -1 )  
               {
                probable_position_of_Z = probable_position_of_Z + 1 ;
                character_right_to_probable_position_of_Z = modified_substring.charAt( probable_position_of_Z + 1 ) ;
               } // end of while-05
			   
			  
            string_to_be_replaced = modified_substring.substr ( position_of_half_R + 2 , ( probable_position_of_Z - position_of_half_R - 2 ))  ;
            modified_substring = modified_substring.replace( "र्" + string_to_be_replaced  ,  string_to_be_replaced + "Ê" ) ;
            position_of_half_R = modified_substring.indexOf( "र्" ) ;
           } // end of while-04


        modified_substring = modified_substring.substr ( 0 , modified_substring.length - 2 )  ;



        //substitute array_two elements in place of corresponding array_one elements

   //************************************************************     
        for( input_symbol_idx = 0; input_symbol_idx < array_one_length; input_symbol_idx++ )
           {
            idx = 0  ;  // index of the symbol being searched for replacement

            while (idx != -1 ) //whie-00
               {
                modified_substring = modified_substring.replace( array_one[ input_symbol_idx ] , array_two[input_symbol_idx] )
                idx = modified_substring.indexOf( array_one[input_symbol_idx] )
               } // end of while-00 loop
           } // end of for loop
//***********************************************************************
// shift the ikAr mAtrAs of nuqta characters in 4CGandhi
//***********************************************************************
         modified_substring = modified_substring.replace( /OXd×/g , "dOÞX" ) ;
         modified_substring = modified_substring.replace( /PXd×/g , "dPÞX" ) ;
         modified_substring = modified_substring.replace( /IYd×/g , "d×IY" ) ;
         modified_substring = modified_substring.replace( /Jd×/g , "d×J" ) ;
         modified_substring = modified_substring.replace( /¦fd×/g , "d×¦f" ) ;
         modified_substring = modified_substring.replace( /þd×/g , "dþÞ" ) ;
         modified_substring = modified_substring.replace( /RYd×/g , "d×RY" ) ;
		 modified_substring = modified_substring.replace( /ái/g , "¿MÑX" ) ;
		 modified_substring = modified_substring.replace( /Êe/g , "eÊ" ) ;
		 modified_substring = modified_substring.replace( /×R/g , "×RY" ) ;
		 modified_substring = modified_substring.replace( /ä/g , "V½f" ) ;
		 modified_substring = modified_substring.replace( /Êf/g , "fÊ" ) ;
		 modified_substring = modified_substring.replace( /×Ie/g , "×IYe" ) ;
		 modified_substring = modified_substring.replace( /ea/g , "eÔ" ) ;
		 modified_substring = modified_substring.replace( /¬f/g , "þ" ) ;
		 modified_substring = modified_substring.replace( /×I/g , "×IY" ) ;
		 modified_substring = modified_substring.replace( /a/g , "Ô" ) ;
		 modified_substring = modified_substring.replace( /é/g , "¢½f" ) ;
		 modified_substring = modified_substring.replace( /×RYi/g , "RiÞY" ) ;
		 modified_substring = modified_substring.replace( /n/g , "»»f" ) ;
		 modified_substring = modified_substring.replace( /æY/g , "¢IY" ) ;
		 modified_substring = modified_substring.replace( /øY´f¹fZ/g , "÷Y´fE" ) ; 
		 modified_substring = modified_substring.replace( /VfbøYAf°f/g , "Vfb÷YAf°f" ) ;
		 modified_substring = modified_substring.replace( /Vfb÷YAf°fe/g , "Vfb÷YAf°fe" ) ;
		 modified_substring = modified_substring.replace( /Vfb÷Y/g , "VfbøY" ) ;
		 
//		in newspaper nukta used in urdu and farshi words are not in use
		modified_substring = modified_substring.replace( /×RY/g , "RY" ) ;
		modified_substring = modified_substring.replace( /×J/g , "J" ) ;
		modified_substring = modified_substring.replace( /×¦f/g , "¦f" ) ;
		modified_substring = modified_substring.replace( /×IY/g , "IY" ) ;
		modified_substring = modified_substring.replace( /¬/g , "ª" ) ;

		
        } // end of IF  statement  meant to  supress processing of  blank  string.

    } // end of the function  Replace_Symbols( )

  } // end of legacy_to_unicode  function
