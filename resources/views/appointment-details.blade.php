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
                @foreach($appointment->getAttributes() as $key => $value)
                    <tr>
                        <td>
                            {{$key}}
                        </td>
                        <td>
                            {{$value}}
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td>
                        {{$appointment->duration}}
                    </td>
                </tr>
                </tbody>
            </table>
        </section>
    </main>
</x-a-master>
