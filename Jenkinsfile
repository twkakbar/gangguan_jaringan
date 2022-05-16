def secret = 'Github'
def server = 'ubuntu@52.38.17.146'
def directory = '/opt/lampp/htdocs/gangguan_jaringan'
def branch = 'main'

pipeline{
    agent any
    stages{
        stage ('git pull'){
            steps{
                sshagent([secret]) {
                    sh """ssh -o StrictHostKeyChecking=no ${server} << EOF
                    cd ${directory}
                    git pull origin ${branch}
                    exit
                    EOF"""
                }
            }
        }
    }
}
