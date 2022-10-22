<div class="paymentinfo">
    <small>

            <p> <b title="মেথড">মেথডঃ </b>{{ $citizenship->payment_method }}</p>
            @if($citizenship->payment_method == 'bankDraft')
            <p><b title="টাকার পরিমান">টাকার পরিমান # </b>{{ $citizenship->total_fee }} টাকা</p>

            <p> <b title="ব্যাঙ্ক ড্রাফট নং">ব্যাঙ্ক ড্রাফট নং # </b>{{ $citizenship->bank_draft_no }}</p>

            <p> <b title="ব্যাঙ্ক">ব্যাঙ্কঃ </b>{{ $citizenship->bank_name }} </p>

            <p> <b title="ব্রাঞ্চ">ব্রাঞ্চঃ </b>{{ $citizenship->branch_name }} </p>
        @elseif($citizenship->payment_method == 'nagad' || $citizenship->payment_method == 'bkash')
            <p>
                <b title="ইজারা মোবাইল">লেনদেনের মোবাইল নম্বরঃ </b>{{ $citizenship->mobile_banking_number }}
            </p>

            <p> <b title="ট্যাক্স আইডি ">ট্রানঃ আইডিঃ </b>{{ $citizenship->trx_id }}</p>
        @elseif($citizenship->payment_method == 'cash')
            <p> <b title="ট্যাক্স আইডি ">রশিদ নম্বরঃ </b>{{ $citizenship->rashid_no }}</p>
            <p> <b title="ট্যাক্স আইডি ">সিরিয়াল নংঃ </b>{{ $citizenship->serial_no }}</p>

            <p><b title="তারিখ">তারিখঃ </b>{{ getBanglaDateFormat($citizenship->date) }} </p>
        @endif
        </small>
</div>
