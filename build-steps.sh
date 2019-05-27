#!/bin/bash

# Get ECR login
sudo $(aws ecr get-login --region eu-west-1 --no-include-email)
# build image
IMAGE=`sudo docker build container-definitions/wordpress | tail -n 1 | cut -d' ' -f3 `
# tag and push
sudo docker tag $IMAGE 313368690603.dkr.ecr.eu-west-1.amazonaws.com/wordpress:$BUILD_NUMBER
sudo docker push 313368690603.dkr.ecr.eu-west-1.amazonaws.com/wordpress
# modify the k8s deployment with the latest image
kubectl set image deployment/wordpress-deployment wordpress=313368690603.dkr.ecr.eu-west-1.amazonaws.com/wordpress:$BUILD_NUMBER
# get latest deployment config as a file, modify current setup
kubectl get deployment wordpress-deployment -o yaml > k8s/service.yaml
git config user.email "jenkins@example.org"
git config user.name "Jenkins"
# Add and commit
git add k8s/service.yaml
git commit -m "Updating service definition with build $BUILD_NUMBER"
