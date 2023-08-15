<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Smtradingbd</title>
    
    <style>
        
        .button {
          background-color: #4CAF50; /* Green */
          border: none;
          color: white;
          padding: 4px 8px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 16px;
          border-radius:4px;
        }
        
        .container{
            width: 700px; padding:10px
        }
        
        .card-body{
            text-align:center;
            padding:10px;
            height:200px;
            background-color:#eee;
        }
        
        .card-header{
            text-align:center;
            padding:10px;
            
        }
        
        .card-footer{
            text-align:center;
            padding:10px
        }
        
        .card{
            
            border:1px solid #ccc;
        }
        
    </style>
  </head>
  <body>
    
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Smtradingbd</h3>
            </div>
            
             <div class="card-body">
                <p>Hello , This Mail from smtrading.maaoshi.com</p>
                
            </div>
            
             <div class="card-footer">
                
                <h3>Your Invoice is here <a class="btn btn-sm btn-primary" href="{{$url}}">PDF</a></h3>
                <p> Thanks,<br>
                {{ config('app.name') }}</p>
            </div>
        
        </div>
    
    </div>
  </body>
</html>