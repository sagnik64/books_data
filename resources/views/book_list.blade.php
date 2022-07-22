
<div style="flex-direction:column; display:flex; align-items: center; justify-content:center;">
    <div>
        <h2>Book List</h2>
    </div>
    <div style="text-align: center;">
        <?php
        if(count(session('book_list'))) {
            for( $i=0; $i<count(session('book_list')); $i++) {
                echo session('book_list')[$i]->T . ", " . session('book_list')[$i]->AR . "<br><br>";
            }
        }
        else {
            echo "No books available. <br>";
        }
        ?>
    </div>
    <div>
        <a href="profile">Go Back</a>
    </div>
</div>
