
<div style="flex-direction:column; display:flex; align-items: center; justify-content:center;">
    <div>
        <h2>Book List</h2>
    </div>
    <div style="text-align: center; font-size:14pt;">
        <?php
        if(count($book_list_data)) {
            foreach($book_list_data as $data) {
                echo $data['T'] . ", " . $data['AR'] . "<br><br>";
            }
        }
        else {
            echo "No books available. <br>";
        }
        ?>
    </div>
    <br><br>
    <div style=" display:flex; gap:100pt;">
        <div>
            <a style="text-decoration: none; " href="{{$book_list_data->previousPageUrl()}}"><button class="button-10">Prev</button></a>
        </div>
        <div>
            <a style="text-decoration: none; " href="{{$book_list_data->nextPageUrl()}}"><button class="button-10">Next</button></a>
        </div>
    </div>
    <br>
    <div>
        Page:
        {{$book_list_data->currentPage()}}
    </div>
    <br><br><br><br>
    <div>
        <a href="profile"><button>Go Back</button></a>
    </div>
</div>

<style>
/* CSS */
.button-10 { 
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 6px 14px;
  font-family: -apple-system, BlinkMacSystemFont, 'Roboto', sans-serif;
  border-radius: 6px;
  border: none;

  color: #fff;
  background: linear-gradient(180deg, #4B91F7 0%, #367AF6 100%);
   background-origin: border-box;
  box-shadow: 0px 0.5px 1.5px rgba(54, 122, 246, 0.25), inset 0px 0.8px 0px -0.25px rgba(255, 255, 255, 0.2);
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-10:focus {
  box-shadow: inset 0px 0.8px 0px -0.25px rgba(255, 255, 255, 0.2), 0px 0.5px 1.5px rgba(54, 122, 246, 0.25), 0px 0px 0px 3.5px rgba(58, 108, 217, 0.5);
  outline: 0;
}
</style>
