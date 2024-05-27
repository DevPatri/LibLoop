<div>
    <article class="card">
        <picture>
            <img src="{{ $foto_url }}" alt="">
        </picture>
        <div>
            <h3>{{ $titulo }}</h3>
            <p>{{ $autor }}</p>
        </div>
    </article>
    <style>
        .card{
            display: flex;
            flex-direction: column;
            font-size: 0.8rem;
            padding: 0;
            cursor: pointer;

            picture{
                width: 100%;
                height: 150px;
                overflow: hidden;
                border-radius: 10px 10px 0 0;
            }
            img{
                overflow: hidden;
                width: 100%;
                aspcect-ratio: 1/1;
                object-fit: cover;
                transition: all 250ms ease;
            }
            div{
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                h3{
                    text-align: left;
                    padding: 0 10px;
                }
                p{
                    text-align: left;
                    padding: 0 10px;
                }
            }
        }
        .card:hover img{
            scale: 1.1;
        }
    </style>
</div>
