<?php if(isset($_POST["xoasubmit"])){
      $arrCheckBox=  $_POST["checkboxArr"];

            foreach( $arrCheckBox as $checkbox){
                $sql = "delete from sanpham where id =$checkbox";
        pdo_execute($sql);
                header ('location:?act=listsp');
            }
}
        
    ?>

<div class="row">
                <div class="row frmtitle mb">
                    <h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
                </div>
                <form action="index.php?act=listsp" method="post">
                                <div class="mb10">
                                    <input class="tk-form" type="text" name="kyw">
                                    <select class="tk-form-sl" name="iddm" id="">
                                        <option value="0" selected>Tất cả</option>
                                        <?php 
                                            foreach ($listdanhmuc as $danhmuc){
                                                extract($danhmuc);
                                                echo '<option value="'.$id.'">'.$name.'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <input class="tk-form-bt" type="submit" name="listok" value="Check">
                </form>
                <div class="row frmcontent">
                    <form action="#" method="post">
                        <div class="row mb10 frmdsloai">

                            <table>
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" name="" class="all"></th>
                                        <th>MÃ SP</th>
                                        <th>TÊN SẢN PHẨM<th>
                                        <th>HÌNH ẢNH<th>
                                        <th>GIÁ<th>
                                        <th>LƯỢT XEM<th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    <?php 
                                        foreach($listsanpham as $sanpham){
                                            extract($sanpham);
                                            $suasp = "index.php?act=suasp&id=".$id;
                                            $xoasp = "index.php?act=xoasp&id=".$id;
                                            $hinhpath = "../upload/".$img;
                                            if(is_file($hinhpath)){
                                                $hinh = "<img src='".$hinhpath."' height = '60px'>";
                                            }else{
                                                $hinh = "No Photo";
                                            }
                                            ?>
                                                <tr>
                                                    <td><input value="<?php echo $id?>" type="checkbox" name="checkboxArr[]" class="allcheck"></td>
                                                    <td><?=$id?></td>
                                                    <td><?=$name?></td>
                                                    <td></td>
                                                    <td><?=$hinh?></td>
                                                    <td></td>
                                                    <td><?=$price?></td>
                                                    <td></td>
                                                    <td><?=$luotxem?></td>
                                                    <td>
                                                        <a href="<?=$suasp?>"><input class="mr5" type="button" value="Sửa"></a>  
                                                        <a href="<?=$xoasp?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><input type="button" value="Xóa"></a>   
                                                    </td>
                                                </tr>
                                        <?php } ?>  
                                </tbody>
                            </table>
                        </div>
                        <div class="row mb10 mt10" >
                            <input type="button" id="chontatca" onclick="hehe()" class="mr5" value="Chọn tất cả">
                            <input type="button" class="mr5" onclick="hihi()" value="Bỏ chọn tất cả">
                            <input type="submit"name="xoasubmit" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="mr5" value="Xóa các mục tất tả">
                            <a href="index.php?act=addsp"><input type="button" value="Thêm mới"></a>    
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