<?php if(isset($_POST["xoasubmit"])){
      $arrCheckBox=  $_POST["checkboxArr"];

            foreach( $arrCheckBox as $checkbox){
                $sql = "delete from danhmuc where id =$checkbox";
        pdo_execute($sql);
                header ('location:?act=listdm');
            }
}
        
    ?>
<div class="row">
                <div class="row frmtitle">
                    <h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
                </div>
                <div class="row frmcontent">
                    <form action="#" method="post">
                        <div class="row mb10 frmdsloai">
                            <table>
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" name="" class="all"></th>
                                        <th>MÃ LOẠI</th>
                                        <th>TÊN LOẠI<th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        foreach($listdanhmuc as $danhmuc){
                                            extract($danhmuc);
                                            $suadm = "index.php?act=suadm&id=".$id;
                                            $xoadm = "index.php?act=xoadm&id=".$id;
                                            ?>
                                                <tr>
                                                    <td><input value="<?php echo $id?>" type="checkbox" name="checkboxArr[]" class="allcheck"></td>
                                                    <td><?=$id?></td>
                                                    <td><?=$name?></td>
                                                    <td>
                                                        <a href="<?=$suadm?>"><input class="mr5" type="button" value="Sửa"></a>  
                                                        <a href="<?=$xoadm?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><input type="button" value="Xóa"></a>      
                                                    </td>
                                                </tr>
                                       <?php } ?>                                   
                                </tbody>
                            </table>
                        </div>
                        <div class="row mb10 mt10">
                        <input type="button" id="chontatca" onclick="hehe()" class="mr5" value="Chọn tất cả">
                            <input type="button" class="mr5" onclick="hihi()" value="Bỏ chọn tất cả">
                            <input type="submit"name="xoasubmit" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="mr5" value="Xóa các mục tất tả">
                            <a href="index.php?act=adddm"><input type="button" value="Thêm mới"></a>    
                        </div>
                    </form> 
                </div>
        </div>
        <script>
            const allCheckBoxes = document.querySelector(".all");
            const checkall=document.querySelector(".chontatca");
            const selectAllBoxesChild = document.querySelectorAll(".allcheck");
            function hehe(){   
                selectAllBoxesChild.forEach((checkbox) => {
                checkbox.checked = true;
    });      
            }
            function hihi(){
                selectAllBoxesChild.forEach((checkbox) => {
      checkbox.checked = false;
    });
            }
allCheckBoxes.addEventListener("click", function () {
  if (this.checked) {
    selectAllBoxesChild.forEach((checkbox) => {
      checkbox.checked = true;
    });
  } else {
    selectAllBoxesChild.forEach((checkbox) => {
      checkbox.checked = false;
    });
  }
});
        </script>