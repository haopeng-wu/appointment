<x-a-master>
    <main>
        <section>
            <h4>
                Details of this appointment
            </h4>

            <table>
                <thead>

                </thead>
                <tbody>
                @foreach($appointment as $key => $value)
                    <tr>
                        <td>
                            {{$key}}
                        </td>
                        <td>
                            {{$value}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </section>
    </main>
</x-a-master>
