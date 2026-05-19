/* toralize.h */
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <unistd.h>
#include <sys/socket.h>
#include <arpa/inet.h>
#include <netinet/in.h>
#include <dlfcn.h>

#define PROXY   "127.0.0.1"
#define PROXYPORT   9050
#define USERNAME	"toraliz" // 7 characters and a zero byte

typedef unsigned char int8;
typedef unsigned short int int16;
typedef unsigned int int32;

// Visualization of the request packet
/*
		+----+----+----+----+----+----+----+----+----+----+....+----+
		| VN | CD | DSTPORT |      DSTIP        | USERID       |NULL|
		+----+----+----+----+----+----+----+----+----+----+....+----+
#    	   1    1      2              4           variable       1
*/

// Create structure for the packet
struct proxy_request {
	int8 vn;
	int8 cd;
	int16 dstport;
	int32 dstip;
	unsigned char userid[8];
};

typedef struct proxy_request Req;

// Visualization of the reply packet
/*
		+----+----+----+----+----+----+----+----+
		| VN | CD | DSTPORT |      DSTIP        |
		+----+----+----+----+----+----+----+----+
 #  	   1    1      2              4
*/

struct proxy_response {
	int8 vn;
	int8 cd;
	int16 _; // the two are not important per the rfc
	int32 __;
};

typedef struct proxy_response Res;

#define reqsize sizeof(struct proxy_request)
#define ressize sizeof(struct proxy_response)

Req *request(struct sockaddr_in*);
int connect(int, const struct sockaddr*, socklen_t);