<?php if(isset($_POST["xoasubmit"])){
      $arrCheckBox=  $_POST["checkboxArr"];

            foreach( $arrCheckBox as $checkbox){
                $sql = "delete from binhluan where id =$checkbox";
        pdo_execute($sql);
                header ('location:?act=dsbl');
            }
}
        
    ?>
<div class="row">
                <div class="row frmtitle mb10">
                    <h1>DANH SÁCH TÀI KHOẢN</h1>
                </div>
                <form action="index.php?act=listb-luan" method="post">
                    <input class="tk-form" type="text" name="kyw" placeholder="Nhập mã sản phẩm">
                    <input class="tk-form-bt" type="submit" name="listbl" value="Check">
                </form>
                <div class="row frmcontent">
                    <form action="index.php?act=dsbl" method="post">
                        <div class="row mb10 frmdsloai">
                            <table>
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" name="" class="all"></th>
                                        <th>ID</th>
                                        <th>Nội dung<th>
                                        <th>Mã tài khoản<th>
                                        <th>Mã sản phẩm<th>
                                        <th>Ngày bình luận<th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        foreach($listbinhluan as $binhluan){
                                            extract($binhluan);
                                            $xoabl = "index.php?act=xoabl&id=".$id;
                                            ?>
                                                <tr>
                                                    <td><input value="<?php echo $id?>" type="checkbox" name="checkboxArr[]" class="allcheck"></td>
                                                    <td><?=$id?></td>
                        
                                                    <td><?=$noidung?></td>
                                                    <td></td>
                                                    <td><?=$iduser?></td>
                                                    <td></td>
                                                    <td><?=$idpro?></td>
                                                    <td></td>
                                                    <td><?=$ngaybinhluan?></td>                                             
                                                    <td>
                                                        <a href="<?=$xoabl?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><input type="button" value="Xóa"></a>      
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
                        </div>
                    </form> 
                </div>
        </div>  <script>
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