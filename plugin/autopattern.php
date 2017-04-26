<script type="text/javascript">
function autoTab(obj){

   /* กำหนดรูปแบบข้อความโดยให้ _ แทนค่าอะไรก็ได้ แล้วตามด้วยเครื่องหมาย หรือสัญลักษณ์ที่ใช้แบ่ง เช่นกำหนดเป็น
   
   1. รูปแบบเลขที่บัตรประชาชน เช่น 4-2215-54125-6-12 ก็สามารถกำหนดเป็น  _-____-_____-_-__
   2. รูปแบบเบอร์โทรศัพท์ เช่น 08-4521-6521 กำหนดเป็น __-____-____
   3. รูปแบบกำหนดเวลา เช่น 12:45:30 กำหนดเป็น __:__:__
   
   ตัวอย่างข้างล่างเป็นการกำหนดรูปแบบเลขบัตรประชาชน
   */

      var pattern=new String("_-____-_____-__-_"); // กำหนดรูปแบบในนี้
      var pattern_ex=new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้
      var returnText=new String("");
      var obj_l=obj.value.length;
      var obj_l2=obj_l-1;
      for(i=0;i<pattern.length;i++){         
         if(obj_l2==i && pattern.charAt(i+1)==pattern_ex){
            returnText+=obj.value+pattern_ex;
            obj.value=returnText;
         }
      }
      if(obj_l>=pattern.length){
         obj.value=obj.value.substr(0,pattern.length);         
      }
}

// --- 2

function autoTabdate(obj){

      var pattern=new String("__-__-____"); // กำหนดรูปแบบในนี้
      var pattern_ex=new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้
      var returnText=new String("");
      var obj_l=obj.value.length;
      var obj_l2=obj_l-1;
      for(i=0;i<pattern.length;i++){         
         if(obj_l2==i && pattern.charAt(i+1)==pattern_ex){
            returnText+=obj.value+pattern_ex;
            obj.value=returnText;
         }
      }
      if(obj_l>=pattern.length){
         obj.value=obj.value.substr(0,pattern.length);         
      }
}

function autoTabdateEN(obj){

      var pattern=new String("____-__-__"); // กำหนดรูปแบบในนี้
      var pattern_ex=new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้
      var returnText=new String("");
      var obj_l=obj.value.length;
      var obj_l2=obj_l-1;
      for(i=0;i<pattern.length;i++){         
         if(obj_l2==i && pattern.charAt(i+1)==pattern_ex){
            returnText+=obj.value+pattern_ex;
            obj.value=returnText;
         }
      }
      if(obj_l>=pattern.length){
         obj.value=obj.value.substr(0,pattern.length);         
      }
}
</script>