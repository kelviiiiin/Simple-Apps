all: example arcfour

example: example.o
	gcc example.o -o example -O2 -Wall

example.o: example.c
	gcc -c -O2 -Wall example.c

arcfour: arcfour.o
	gcc arcfour.o -o arcfour.so -O2 -Wall -fPIC -shared -ldl -D_GNU_SOURCE

arcfour.o: arcfour.c
	gcc -c arcfour.c -o arcfour.o

clean:
	rm -f *.so *.o example