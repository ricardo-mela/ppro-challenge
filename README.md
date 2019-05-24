# ppro-challenge

## Build instructions

Current build process consists on building new Docker images using the provided Dockerfiles provided in the `container-definitions` folder using

`docker build ./container-definitions/$CONTAINERNAME`

And then tagging and pushing the new builds to ECR:

`sudo docker tag 836a8b4633e9 313368690603.dkr.ecr.eu-west-1.amazonaws.com/$IMAGE_NAME:$TAG`
`sudo docker push 313368690603.dkr.ecr.eu-west-1.amazonaws.com/$IMAGE_NAME` 

Then, tag numbers have to be incremented on the service YAML files.

### Deploy instructions

Deployment will be done by running

`kubectl apply -f`

on all the files in the `k8s` folder.

Rollback will be executed by getting the previous revision from `kubectl rollout history deployment`

### Useful commands

`sudo docker build . | tail -n 1 | cut -d' ' -f3 | xargs sudo docker run -p 80:80` to build and run my containers for testing purposes

`sudo docker exec -it $(sudo docker container ls | tail -n 1 | awk ' { print $NF } ') /bin/bash` to log into my container

`eksctl` is great to set up EKS :)
