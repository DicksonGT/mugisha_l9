
<li {!! (Request::is('admin/members*') ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="livicon" data-name="list-ul" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
        <span class="title">Members</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li {!! (Request::is('admin/members*') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/members') }}">
                <i class="fa fa-angle-double-right"></i>
                Members
            </a>
        </li>

        <li {!! (Request::is('admin/expenses*') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/expenses') }}">
                <i class="fa fa-angle-double-right"></i>
                Expenses
            </a>
        </li>
        <li {!! (Request::is('admin/orders*') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/orders') }}">
                <i class="fa fa-angle-double-right"></i>
                Orders
            </a>
        </li>
        
        <li {!! (Request::is('admin/order_items*') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/order_items') }}">
                <i class="fa fa-angle-double-right"></i>
                Order_items
            </a>
        </li>

    </ul>
</li>



<li {!! (Request::is('admin/mfi_products*') ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="livicon" data-name="list-ul" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
        <span class="title">Mfi_products</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">

        <li {!! (Request::is('admin/mfis*') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/mfis') }}">
                <i class="fa fa-angle-double-right"></i>
                Mfis
            </a>
        </li>

        <li {!! (Request::is('admin/mfi_products*') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/mfi_products') }}">
                <i class="fa fa-angle-double-right"></i>
                Mfi Products
            </a>
        </li>
    </ul>
</li>

<li {!! (Request::is('admin/loan_details*') ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="livicon" data-name="list-ul" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
        <span class="title">Loan_details</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li {!! (Request::is('admin/loan_details*') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/loan_details') }}">
                <i class="fa fa-angle-double-right"></i>
                Loan Details
            </a>
        </li>
    </ul>
</li>

<li {!! (Request::is('admin/business_types*') ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="livicon" data-name="list-ul" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
        <span class="title">Business_types</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li {!! (Request::is('admin/business_types*') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/business_types') }}">
                <i class="fa fa-angle-double-right"></i>
                Business Types
            </a>
        </li>
    </ul>
</li>


<li {!! (Request::is('admin/products*') ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="livicon" data-name="list-ul" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
        <span class="title">Products</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li {!! (Request::is('admin/products*') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/products') }}">
                <i class="fa fa-angle-double-right"></i>
                Products
            </a>
        </li>

        <li {!! (Request::is('admin/product_cats*') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/product_cats') }}">
                <i class="fa fa-angle-double-right"></i>
                Product Categories
            </a>
        </li>
    </ul>
</li>




<li {!! (Request::is('admin/locations*') || Request::is('admin/users*') || Request::is('admin/feedback*') || Request::is('admin/statuses*') ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="livicon" data-name="list-ul" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
        <span class="title">Settings</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">

        <li {!! (Request::is('admin/users*') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/users') }}">
                <i class="fa fa-angle-double-right"></i>
                Users
            </a>
        </li>

        <li {!! (Request::is('admin/regions*') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/regions') }}">
                <i class="fa fa-angle-double-right"></i>
                Regions
            </a>
        </li>

        <li {!! (Request::is('admin/districts*') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/districts') }}">
                <i class="fa fa-angle-double-right"></i>
                Districts
            </a>
        </li>

        <li {!! (Request::is('admin/services*') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/services') }}">
                <i class="fa fa-angle-double-right"></i>
                Services
            </a>
        </li>

        <li {!! (Request::is('admin/service_types*') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/service_types') }}">
                <i class="fa fa-angle-double-right"></i>
                Service Types
            </a>
        </li>

        <li {!! (Request::is('admin/statuses*') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/statuses') }}">
                <i class="fa fa-angle-double-right"></i>
                Statuses
            </a>
        </li>

        <li {!! (Request::is('admin/transactions*') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/transactions') }}">
                <i class="fa fa-angle-double-right"></i>
                Transactions
            </a>
        </li>

        <li {!! (Request::is('admin/feedback*') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/feedback') }}">
                <i class="fa fa-angle-double-right"></i>
                Feedback
            </a>
        </li>
        
        
    </ul>
</li>
