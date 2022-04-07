@include('header')
    <div class="request-api">
        <form method="post" action="/getData" name="getdata" id="getdata" onSubmit="actionOnSubmit()">
            @csrf
            <div class="form-control">
                <select name="method_name" id="form-method">
                    <option value="" selected disabled>Select Method</option>
                    <option value="get">GET</option>
                    <option value="post">POST</option>
                </select>
            </div>
            <div class="form-control">
                <input type="text" name="request_url" placeholder="Enter request URL" id="request_url">
            </div>
            <div class="form-control">
                <input type="submit" name="getdata" value="Submit">
            </div>
            <div class="full-width">
                <textarea name="update_data" rows="10" placeholder="Update data with json format"></textarea>
            </div>
            
        </form>
    </div>

    <div class="request-api hint">
        <h3>Request url should be:</h3>
        <ul>
            <li>{{url()->current()}}/data/?id=1</li>
            <li>{{url()->current()}}/data/?timestamp=1649322569</li>          
            <li>{{url()->current()}}/data/2</li>
            <li>{{url()->current()}}/data/get_all_records</li>
        </ul>
        <p>Json Format</p>
        <pre>
            {
                "name": "v.0.2",
                "timestamp": "2022-03-18 10:24:07"
            }
        </pre>
    </div>
@include('footer')