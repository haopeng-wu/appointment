<x-a-master>
    <main>
        <section class="appointment-details">
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
                            <div class="name">
                                {{$key}}
                            </div>

                        </td>
                        <td>
                            <div class="value">
                                {{$value}}
                            </div>

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
