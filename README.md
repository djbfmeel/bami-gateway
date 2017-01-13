# bami-gateway
Gateway for ordering delicious bami disks

Local testing with NGROK
----------
To test the API AI callback locally, set up an NGROK tunnel with the following terminal command.

    ./bin/ngrok http bami-gateway.dennis.local:80 -region eu -host-header=rewrite
