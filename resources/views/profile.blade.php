<div style="flex-direction:column; display:flex; align-items: center; justify-content:center;">
        <div>
            <h2>Profile Page</h2>
        </div>
        <div>
            <h3>Welcome, {{ session('name') }}</h3>
        </div>
        <div>
            <h3>Books Issued by {{ session('name') }}:</h3>
        </div>
        <br>
        <?php
            if(session('issued_books')[0]->B_T === null) {
                echo "No books issued.";
            }

            else {
                echo '
                <table style="width:80%; text-align:center; font-size:14pt;">
                <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Date of Issue</th>
                <th>Date of Return</th>
                </tr>
                ';
                for($i=0;$i<count(session('issued_books'));$i++) {
                                echo "<tr><td>" . session('issued_books')[$i]->B_T . "</td>" .
                                    "<td>" . session('issued_books')[$i]->AR . "</td>" .
                                    "<td>" . session('issued_books')[$i]->D_B . "</td>" .
                                    "<td>" . session('issued_books')[$i]->D_R . "</td> </tr>";    
                            }
                 
            }
            echo '</table>';
        ?>
    <br><br><br><br><br><br>
    <div>
        <a href="/book_list">See list of available books</a>
    </div>
    <br>       
    <div>
        <a href="/logout">Logout</a>
    </div>
    <br>
</div>

